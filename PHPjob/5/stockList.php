<?php
require_once('db_connect.php');
require_once('function.php');
check_user_logged_in();

$pdo = db_connect();
try {
    $sql = "SELECT * FROM books";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute();
} catch (PDOException $e) {
    echo 'Error: '.$e -> getMessage();
    die();
}
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf8">
        <link rel='stylesheet' href='style.css'>
        <title>在庫一覧</title>
    </head>
    <body>
        <h1>在庫一覧画面</h1>
        <div class="buttonBox">
            <a href="bookRegister.php" class="registerButton2">新規登録</a>
            <a href="logout.php" class="logoutButton">ログアウト</a>
        </div>
        <table>
            <tr>
                <th>タイトル</th>
                <th>発売日</th>
                <th>在庫数</th>
                <th></th>
            </tr>
            <?php while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['stock']; ?></td>
                    <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="deleteButton">削除</td>
                </tr>
            <?php } ?>
                
        </table>
    </body>
</html>