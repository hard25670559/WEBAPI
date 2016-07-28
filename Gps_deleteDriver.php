<?php

date_default_timezone_set("Asia/Taipei"); //將時間寫入

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');



$dsn = "mysql:host=localhost;dbname=test";
$pdo = new PDO($dsn, 'userdb', '123456');
//$dsn = "mysql:host=localhost;dbname=damin";
//$pdo = new PDO($dsn, 'root', 'Ms25680117');
$take = "select sluice from GPS_Point where GPS_Id = 0 and sluice = 0";
$result = $pdo->query($take);
if ($result->rowCount() ==  1){
    $count = $pdo->exec("DELETE FROM GPS_Point WHERE GPS_Id <> 0");
}


/**
 * Created by PhpStorm.
 * User: toro
 * Date: 2016/7/25
 * Time: 下午 02:43
 */