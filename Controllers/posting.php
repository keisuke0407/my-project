<?php
session_start();
require_once('../Config/db.php');

// ログインチェック（ログインしていない場合はリダイレクト）
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

// POSTされた内容を取得
$content = $_POST['content'] ?? '';

// 空じゃないか、文字数が制限内かなど
if (empty($content) || mb_strlen($content) > 1000) {
    echo "<script>alert('投稿内容は必須です（最大1000文字）'); history.back();</script>";
    exit;
}

// DB接続
$pdo = dbConnect();

// SQL実行
$sql = "INSERT INTO posts (user_id, content, created_at) VALUES (:user_id, :content, NOW())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
$stmt->bindValue(':content', htmlspecialchars($content, ENT_QUOTES, 'UTF-8'), PDO::PARAM_STR);
$stmt->execute();

// 投稿完了後、投稿一覧ページにリダイレクト
header('Location: post_list.php');
exit;
