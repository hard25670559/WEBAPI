<?php
date_default_timezone_set("Asia/Taipei"); //將時間寫入變數

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');

$dsn = "mysql:host=localhost;dbname=test";
$pdo = new PDO($dsn, 'userdb', '123456');
//$dsn = "mysql:host=localhost;dbname=damin";
//$pdo = new PDO($dsn, 'root', 'Ms25680117');
$sluice = $_POST['account'];   //抓取前端相對應變數值

$take = "select sluice from GPS_Point where GPS_Id = 0";
$result = $pdo->query($take);
if ($result->rowCount() ==  1){

    $count = $pdo->exec("update GPS_Point set sluice ='$sluice' where GPS_Id = 0");

    $take2 = "select * from GPS_Point where GPS_Id = 0";
    $result2 = $pdo->query($take2);
    if ($result2->rowCount() >  0)
    {
        while ($row = $result2->fetch())
        {
            echo json_encode($row)."\n"; //將資料打包成.js格是傳出
        }
    }
}
/**
 * Created by PhpStorm.
 * User: toro
 * Date: 2016/7/25
 * Time: 下午 01:54
 */