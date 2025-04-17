<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>記事投稿</title>
    <link rel="stylesheet" href="style.css"> <!-- 必要ならCSSも -->
</head>
<body>
    <h1>記事投稿フォーム</h1>

    <form action="../Controllers/posting.php" method="POST">
        <textarea name="content" rows="5" cols="50" placeholder="投稿内容を入力してください（1000文字以内）" required></textarea><br>
        <button type="submit">投稿する</button>
    </form>
</body>
</html>
