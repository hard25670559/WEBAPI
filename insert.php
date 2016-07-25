<?php
date_default_timezone_set("Asia/Taipei"); //將時間寫入變數

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');

$dsn = "mysql:host=localhost;dbname=test";
$pdo = new PDO($dsn, 'userdb', '123456');
//$dsn = "mysql:host=localhost;dbname=damin";
//$pdo = new PDO($dsn, 'root', 'Ms25680117');

$function =$_POST['controller'];
$account = $_POST['account'];   //抓取前端相對應變數值
$password = $_POST['password'];
//查詢是否有相同的資料名稱
$sql = "select * from Account_Data where Account_Number = '$account'";
//        echo $sql;
$result = $pdo->query($sql);
if ($isCus = $result->rowCount() > 0)
{
    //若查詢結果大於零，代表有相同帳號
    echo'此帳號重複' ;
}else//若無相同之值則繼續
{   //新增資料
    $time = date('Y-m-d  H:i:s') ;
    $count1  = $pdo->exec("insert into Account_Data(Account_Number,Account_Password,Account_Create,Account_Status) values('$account', '$password','$time','0')");
    $take = "select * from Account_Data where Account_Number = '$account'";//確認資料是否新增成功
//            echo $take;
    $result = $pdo->query($take);//若成功查詢資料筆數會會大於零
    if ($take = $result->rowCount() > 0){
        while ($row = $result->fetch()) {
            echo json_encode($row)."\n";//將資料打包成.js格是傳出
        }
        echo $account.'新增資料成功';
    }

}
/**
 * Created by PhpStorm.
 * User: toro
 * Date: 2016/7/20
 * Time: 上午 11:07
 */