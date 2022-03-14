<?php
require_once('db_connect.php');
require_once('function.php');
check_user_logged_in();

if (!empty($_POST)) {
    if (empty($_POST['title'])) {
        echo 'タイトルが入力されていません<br>';
    }
    if (empty($_POST['date'])){
        echo '発売日が入力されていません<br>';
    }
    if (empty($_POST['stock'])) {
        echo '在庫数が選択されていません';
    }
    if (!empty($_POST['title']) && !empty($_POST['date']) && !empty($_POST['stock'])) {
        $title = htmlspecialchars($_POST['title'], ENT_QUOTES);
        $date = $_POST['date'];
        $stock = $_POST['stock'];
        $pdo = db_connect();
        try {
            $sql = "INSERT INTO books (title, date, stock) VALUES (:title, :date, :stock)";
            $stmt = $pdo -> prepare($sql);
            $stmt -> bindValue(':title', $title);
            $stmt -> bindValue(':date', $date);
            $stmt -> bindValue(':stock', $stock);
            $stmt -> execute();
            header('Location: stockList.php');
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
        <title>本登録</title>
    </head>
    <body>
        <h1>本 登録画面</h1>
        <form method="POST" action="">
            <input type="text" name="title" placeholder="タイトル" class="textBox"><br>
            <input type="date" name="date" placeholder="日付" class="textBox"><br>
            在庫数<br>
            <select name="stock" class="stockBox">
                <option disabled selected>選択してください</option>
                <?php for ($i = 0; $i <= 100; $i++) { ?>
                    <option value="<?php echo $i; ?>">
                        <?php echo $i; ?>
                    </option>
                <?php } ?>
            </select><br>
            <input type="submit" value="登録" class="registerButton">
        </form>
    </body>
</html>