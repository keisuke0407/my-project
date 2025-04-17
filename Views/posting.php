<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>記事投稿</title>
  <link rel="stylesheet" href="../Public/style.css">
</head>
<body>
  <h1>記事を投稿する</h1>
  <form action="../Controllers/posting.php" method="POST">
    <textarea name="content" rows="5" cols="40" placeholder="ここに記事内容を入力してください" required></textarea><br><br>
    <input type="submit" value="投稿">
  </form>
</body>
</html>
