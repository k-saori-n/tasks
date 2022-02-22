<?php

/* 書き込み
$testFile = "test.txt";
$contents = "こんにちは";

if (is_writable($testFile)) {
    $fp = fopen($testFile, "w");
    fwrite($fp, $contents);
    fclose($fp);
    echo "finish writing";
} else {
    echo "not writable";
    exit;
}*/

//読み込み
$testFile = "test2.txt";

if (is_readable($testFile)) {
    $fp = fopen($testFile, "r");
    while ($line = fgets($fp)) {
        echo $line.'<br>';
    }
    fclose($fp);
} else {
    echo "not readable";
    exit;
}

?>