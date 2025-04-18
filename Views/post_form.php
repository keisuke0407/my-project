<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>投稿詳細</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <h2>投稿詳細</h2>
    <?php if ($post): ?>
        <div>
            <h3><?= htmlspecialchars($post['title']) ?></h3>
            <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
            <p>投稿者: <?= htmlspecialchars($post['first_name']) ?> <?= htmlspecialchars($post['last_name']) ?></p>
        </div>
    <?php else: ?>
        <p>投稿が見つかりません。</p>
    <?php endif; ?>

    <hr>

    <h3>コメントを投稿する</h3>
    <form action="../Controllers/comment.php" method="post">

        <input type="hidden" name="post_id" value="<?= htmlspecialchars($post['id']) ?>">
        <textarea name="content" rows="4" cols="50" required></textarea><br>
        <button type="submit">コメントする</button>
    </form>

    <hr>

    <?php if ($post): ?>
    <?php var_dump($post); ?>
    <?php endif; ?>

    <h3>コメント一覧</h3>
    <?php if (count($comments) > 0): ?>
        <?php foreach ($comments as $comment): ?>
            <div style="border: 1px solid #ccc; padding: 10px; margin: 5px 0;">
                <p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
                <small>by <?= htmlspecialchars($comment['first_name']) ?> <?= htmlspecialchars($comment['last_name']) ?> | <?= $comment['created_at'] ?></small>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>コメントはまだありません。</p>
    <?php endif; ?>
</body>
</html>
