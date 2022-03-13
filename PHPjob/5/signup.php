<?php
require_once('db_connect.php');

if (!empty($_POST)) {
    if (empty($_POST['name'])) {
        echo '名前が入力されていません</br>';
    }
    if (empty($_POST['password'])) {
        echo 'パスワードが入力されていません';
    }
    if (!empty($_POST['name']) && !empty($_POST['password'])) {
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
        $password = htmlspecialchars($_POST['password'], ENT_QUOTES);
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $pdo = db_connect();
        try {
            $sql = "INSERT INTO users (name, password) VALUES (:name, :password)";
            $stmt = $pdo -> prepare($sql);
            $stmt -> bindValue(':name', $name);
            $stmt -> bindValue(':password', $password_hash);
            $stmt -> execute();
            header('Location: signup_done.php');
            exit();
        } catch (PDOException $e) {
            echo 'Error: '.$e -> getMessage();
            die();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel='stylesheet' href='style.css'>
        <title>ユーザー登録</title>
    </head>
    <body>
        <h1>ユーザー登録画面</h1>
        <form method="POST" action="">
            <input type="text" name="name" placeholder="ユーザー名" class="textBox"><br>
            <input type="password" name="password" placeholder="パスワード" class="textBox"><br>
            <input type="submit" value="新規登録" class="registerButton">
        </form>
    </body>
</html>