<?php
require_once('db_connect.php');
session_start();

if (!empty($_POST)) {
    if (empty($_POST['name'])) {
        echo '名前が入力されていません<br>';
    }
    if (empty($_POST['password'])) {
        echo 'パスワードが入力されていません';
    }
    if (!empty($_POST['name']) && !empty($_POST['password'])) {
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
        $password = htmlspecialchars($_POST['password'], ENT_QUOTES);
        $pdo = db_connect();
        try {
            $sql = "SELECT * FROM users WHERE name = :name";
            $stmt = $pdo -> prepare($sql);
            $stmt -> bindValue(':name', $name);
            $stmt -> execute();
        } catch (PDOException $e) {
            echo 'Error: '.$e -> getMessage();
            die();
        }
        if ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['name'];
                header('Location: stockList.php');
                exit();
            } else {
                echo 'パスワードに誤りがあります';
            }
        } else {
            echo '該当するデータが登録されていません';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel='stylesheet' href='style.css'>
        <title>ログイン</title>
    </head>
    <body>
        <header class="loginHeader">
            <h1>ログイン画面</h1>
            <a href="signup.php" class="newUserButton">新規ユーザー登録</a>
        </header>
        <form method="POST" action="">
            <input type="text" name="name" placeholder="ユーザー名" class="textBox"><br>
            <input type="password" name="password" placeholder="パスワード" class="textBox"><br>
            <input type="submit" value="ログイン" class="loginButton">
        </form>
    </body>
</html>