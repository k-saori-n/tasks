<?php
session_start();
$_SESSION = array();
session_destroy();
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel='stylesheet' href='style.css'>
        <title>ログアウト</title>
    </head>
    <body>
        <h1>ログアウト画面</h1>
        <p>ログアウトしました</p>
        <a href="login.php" class="loginButton2">ログイン画面へ</a>
    </body>
</html>