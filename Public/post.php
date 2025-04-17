<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

$_SESSION['user_id'] = 1; // テスト用ログインID

echo "OK";

include('../Views/post_form.php');
