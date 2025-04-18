<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
require_once '../Config/db.php'; 

$pdo = dbConnect(); 

// 仮ログイン
$_SESSION['user_id'] = 1;
$user_id = $_SESSION['user_id'];

// 投稿IDを取得
$post_id = $_GET['id'] ?? null;

// 投稿情報を取得
$sql = "SELECT posts.*, users.first_name, users.last_name FROM posts 
        JOIN users ON posts.user_id = users.id 
        WHERE posts.id = :post_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':post_id', $post_id, PDO::PARAM_INT);
$stmt->execute();
$post = $stmt->fetch();

// コメント一覧を取得
$sql = "SELECT comments.*, users.first_name, users.last_name FROM comments 
        JOIN users ON comments.user_id = users.id 
        WHERE comments.post_id = :post_id ORDER BY comments.created_at ASC";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':post_id', $post_id, PDO::PARAM_INT);
$stmt->execute();
$comments = $stmt->fetchAll();

// 投稿詳細＋コメント投稿フォームを表示
include('../Views/post_form.php');
