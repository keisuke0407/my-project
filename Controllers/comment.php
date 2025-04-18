<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
require_once('../config/db.php');

$pdo = dbConnect();

// 仮ログイン中のユーザーID
$user_id = $_SESSION['user_id'] ?? null;

// POSTデータの取得
$post_id = $_POST['post_id'] ?? null;
$content = $_POST['content'] ?? '';

// デバッグ用：受け取った値を確認（開発中のみ）
if (true) {
    echo "<pre>";
    echo "user_id: " . var_export($user_id, true) . "\n";
    echo "post_id: " . var_export($post_id, true) . "\n";
    echo "content: " . var_export($content, true) . "\n";
    echo "</pre>";
}

// バリデーション
if (!$user_id || !$post_id || trim($content) === '') {
    echo "不正な入力です。";
    exit;
}

// post_idがpostsテーブルに存在するか確認（外部キーエラー回避のため）
$sql_check = "SELECT COUNT(*) FROM posts WHERE id = :post_id";
$stmt_check = $pdo->prepare($sql_check);
$stmt_check->bindValue(':post_id', $post_id, PDO::PARAM_INT);
$stmt_check->execute();
$post_exists = $stmt_check->fetchColumn();

if (!$post_exists) {
    echo "エラー: 指定された投稿が存在しません。";
    exit;
}

// コメントの保存処理
$sql = "INSERT INTO comments (user_id, post_id, content, created_at) 
        VALUES (:user_id, :post_id, :content, NOW())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindValue(':post_id', $post_id, PDO::PARAM_INT);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);

if ($stmt->execute()) {
    // 成功時：投稿詳細ページにリダイレクト
    header("Location: post.php?id=" . $post_id);
    exit;
} else {
    echo "コメントの保存に失敗しました。";
}
