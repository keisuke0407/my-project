<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
require_once('../Config/db.php');

$pdo = dbConnect();

// ユーザーID取得（ログイン済み前提）
$user_id = $_SESSION['user_id'] ?? null;

// POSTデータ取得
$post_id = $_POST['post_id'] ?? null;
$content = $_POST['content'] ?? '';

// デバッグ用出力（必要に応じて削除してOK）
echo "user_id: " . $user_id . "<br>";
echo "post_id: '" . $post_id . "'<br>";
echo "content: '" . $content . "'<br>";

// バリデーション
if (!$user_id || !$post_id || trim($content) === '') {
    echo "エラー: 入力が不正です。";
    exit;
}

// 対象の投稿が存在するかチェック
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = :post_id");
$stmt->bindValue(':post_id', $post_id, PDO::PARAM_INT);
$stmt->execute();
$post = $stmt->fetch();

if (!$post) {
    echo "エラー: 指定された投稿が存在しません。";
    exit;
}

// コメント保存処理
$sql = "INSERT INTO comments (user_id, post_id, content, created_at) 
        VALUES (:user_id, :post_id, :content, NOW())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindValue(':post_id', $post_id, PDO::PARAM_INT);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);

if ($stmt->execute()) {
    // 投稿詳細ページにリダイレクト（?id=〇〇 を付ける）
    header("Location: ../Public/post.php?id=" . $post_id);
    exit;
} else {
    echo "エラー: コメントの保存に失敗しました。";
}
