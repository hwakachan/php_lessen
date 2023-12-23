<?php

$host = 'mysql:dbname=test01;host=localhost;charset=utf8mb4';
$user = 'root';
$password = 'root';
try{
    $pdo = new PDO($host,$user,$password);
    echo '接続成功';
} catch(PDOException $e){
    echo '接続失敗' . $e->getMessage() . "\n";
    exit();
}


