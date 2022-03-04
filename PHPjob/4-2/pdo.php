<?php
//DB名
define("DB_DATABASE", "checktest4");
//MySQLのユーザー名
define("DB_USERNAME", "root");
//MySQLのログインパスワード
define("DB_PASSWORD", "");
//DSN
define("POD_DSN", 'mysql:host=localhost;charset=utf8;dbname='.DB_DATABASE);

function connect() {
    try {
        $pdo = new PDO(POD_DSN, DB_USERNAME,DB_PASSWORD);
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo 'Error: '.$e -> getMessage();
        die();
    }
}