<?php
session_start();
require_once('../Config/db.php');

$pdo = dbConnect();
$sql = "SELECT posts.*, users.first_name, users.last_name FROM posts
        JOIN users ON posts.user_id = users.id
        ORDER BY posts.created_at DESC";
$stmt = $pdo->query($sql);
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>投稿一覧</title>
</head>
<body>
    <h1>投稿一覧</h1>
    <?php foreach ($posts as $post): ?>
        <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
            <p><strong><?= htmlspecialchars($post['first_name'] . ' ' . $post['last_name']) ?></strong> さんの投稿</p>
            <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
            <p><small><?= $post['created_at'] ?></small></p>
        </div>
    <?php endforeach; ?>
    <a href="post.php">新規投稿</a>
</body>
</html>
