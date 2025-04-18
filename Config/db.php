<?php
// データベースに接続
function dbConnect() {
    try {
        // PDO（PHP Data Objects）を使ってMySQLデータベースに接続
        // 'mysql:host=localhost;dbname=keijiban_app;charset=utf8' は接続情報
        // ・host=localhost → ローカルのデータベースサーバーに接続
        // ・dbname=keijiban_app → 使用するデータベース名
        // ・charset=utf8 → 文字コードをUTF-8に設定
        // 'root' はユーザー名、'' はパスワード（今回は未設定）
        $pdo = new PDO('mysql:host=localhost;dbname=keijiban_app;charset=utf8', 'root', '');

        // エラーモードを「例外（Exception）」に設定
        // エラーが発生したときに catch ブロックで処理できるようになる
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // 接続に成功した場合は PDO オブジェクトを返す
        return $pdo;
    } catch (PDOException $e) {
        // 接続に失敗した場合はエラーメッセージを表示して終了
        echo 'DB接続エラー: ' . $e->getMessage();
        exit;
    }
}
