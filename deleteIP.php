<?php

date_default_timezone_set("Asia/Taipei"); //將時間寫入變數

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');

$dsn = "mysql:host=localhost;dbname=test";
$pdo = new PDO($dsn, 'userdb', '123456');
//$dsn = "mysql:host=localhost;dbname=damin";
//$pdo = new PDO($dsn, 'root', 'Ms25680117');

$ip = $_SERVER['REMOTE_ADDR'];
$time = date('Y-m-d  H:i:s') ;

$opentime = "select BanIP_OpenTime from BanIP where BanIP_Ip = '$ip' ";
$iptimes = $pdo->query($opentime);
while ($showrow = $iptimes->fetch()) {
    $shtime = $showrow[0];
    echo  $shtime;
}
if( strtotime($time)> strtotime($shtime)) {
    $count = $pdo->exec("DELETE FROM BanIP WHERE BanIP_Ip ='$ip'");
        echo "Y,可以重新嘗試登入";
    }

else{
        echo "N，時間尚未開啟";
}
/**
 * Created by PhpStorm.
 * User: toro
 * Date: 2016/7/22
 * Time: 下午 03:13
 */