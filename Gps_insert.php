<?php
date_default_timezone_set("Asia/Taipei"); //將時間寫入變數

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');

$dsn = "mysql:host=localhost;dbname=test";
$pdo = new PDO($dsn, 'userdb', '123456');
//$dsn = "mysql:host=localhost;dbname=damin";
//$pdo = new PDO($dsn, 'root', 'Ms25680117');
$Driver_Id = $_POST['Driver_Id'];   //抓取前端相對應變數值
$x = $_POST['x'];
$y = $_POST['y'];
$take = "select sluice from GPS_Point where GPS_Id = 0 and sluice = 1";
$result = $pdo->query($take);
if ($result->rowCount() ==  1){

    $count = $pdo->exec("insert into GPS_Point(Driver_Id,x,y,sluice) values('$Driver_Id', '$x','$y',1)");

    $take2 = "select * from GPS_Point where Driver_Id = '$Driver_Id'";
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
 * Time: 上午 09:27
 */