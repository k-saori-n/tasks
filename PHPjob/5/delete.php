<?php
require_once('db_connect.php');
require_once('function.php');
check_user_logged_in();

$id = $_GET['id'];
if (empty($id)) {
    header('Location: stockList.php');
    exit();
}

$pdo = db_connect();
try {
    $sql = "DELETE FROM books WHERE id = :id";
    $stmt = $pdo -> prepare($sql);
    $stmt -> bindValue(':id', $id);
    $stmt -> execute();
    header('Location: stockList.php');
    exit();
} catch (PDOException $e) {
    echo 'Error: '.$e -> getMessage();
    die();
}
?>