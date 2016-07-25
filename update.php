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
$name = $_POST['name'];
//查詢是否有此帳號，以及確認密碼
$sql = "select * from Account_Data where Account_Number = '$account' and Account_Password = '$password'";
//echo $sql;
$result = $pdo->query($sql); //若查詢結果筆數大於零，表示有此帳號以及認證成功，繼續修改資料的步驟
if ($cat=$result->rowCount() > 0)
{   //將要修改的欄位值帶入
    $time = date('Y-m-d  H:i:s') ;
    $count = $pdo->exec("update Account_Data set Account_UserName='$name',Account_Update ='$time' where Account_Number='$account'");

    $take = "select * from Account_Data where Account_Number = '$account'";
    $result2 = $pdo->query($take);
    if ($result2->rowCount() >  0)
    {
        while ($row = $result2->fetch())
        {
            echo json_encode($row)."\n"; //將資料打包成.js格是傳出
        }
        echo $account.'資料更新完成';
    }
}else if (($cat=$result->rowCount() == 0))
{ //若帳號或密碼錯誤則無法修改
    echo '帳號密碼輸入錯誤，無法進行更改';

}
/**
 * Created by PhpStorm.
 * User: toro
 * Date: 2016/7/20
 * Time: 上午 11:27
 */