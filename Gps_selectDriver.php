<?php

date_default_timezone_set("Asia/Taipei"); //將時間寫入

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');

$dsn = "mysql:host=localhost;dbname=test";
$pdo = new PDO($dsn, 'userdb', '123456');
//$dsn = "mysql:host=localhost;dbname=damin";
//$pdo = new PDO($dsn, 'root', 'Ms25680117');
$take = "select sluice from GPS_Point where GPS_Id = 0 and sluice = 1";
$result = $pdo->query($take);
if ($result->rowCount() ==  1){
    $take1 = "select Driver_Id,x,y,sluice from GPS_Point where GPS_Id <> 0";
    $result1 = $pdo->query($take1);
    if ($result1->rowCount() ==  1){
        while ($row = $result1->fetch()) {
            echo json_encode($row[0])."\n"; //將資料打包成.js格是傳出
        }
    }

}



/**
 * Created by PhpStorm.
 * User: toro
 * Date: 2016/7/25
 * Time: 下午 02:32
 */