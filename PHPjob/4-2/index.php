<?php
require_once('pdo.php');
require_once('getData.php');

$getData = new getData();
$userData = $getData -> getUserData();
$postData = $getData -> getPostData();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Y&I Group Inc.</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <div class="left">
            <img class="logo" src="img/logo.png">
        </div>
        <div class="right">
            <div class="username">
                <p>ようこそ <?php echo $userData['first_name'].$userData['last_name']; ?> さん</p>
            </div>
            <div class="loginTime">
                <p>最終ログイン日：<?php echo $userData['last_login']; ?></p>
            </div>
        </div>
    </header>
    <div class="main">
        <table>
            <tr>
                <th>記事ID</th>
                <th>タイトル</th>
                <th>カテゴリ</th>
                <th>本文</th>
                <th>投稿日</th>
            </tr>
            <?php while ($contents = $postData -> fetch(PDO::FETCH_ASSOC)) {; ?>
                <tr>
                    <td><?php echo $contents['id']; ?></td>
                    <td><?php echo $contents['title']; ?></td>
                    <td><?php echo $contents['category_no']; ?></td>
                    <td><?php echo $contents['comment']; ?></td>
                    <td><?php echo $contents['created']; ?></td>
                <?php }; ?>
                </tr>       
        </table>
    </div>
    <footer>
        <p>Y&I group.inc</p>
    </footer>
</body>
</html>