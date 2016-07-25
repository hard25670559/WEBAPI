<?php
require_once ("connedciton.php");
date_default_timezone_set("Asia/Taipei"); //將時間寫入變數
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');

$dsn = "mysql:host=localhost;dbname=test";
$pdo = new PDO($dsn, 'userdb', '123456');
//$dsn = "mysql:host=localhost;dbname=damin";
//$pdo = new PDO($dsn, 'root', 'Ms25680117');

$function =$_POST['controller'];

$account = $_POST['account']; //抓取前端相對應變數值
$password = $_POST['password'];
$time = date('Y-m-d  H:i:s') ;
//查詢資料庫內是否有相對應的值
$sql = "select * from Account_Data where Account_Number = '$account' and Account_Password = '$password'";
$result = $pdo->query($sql);

$take = "select * from Account_Data where Account_Number = '$account' and Account_Status= '1'";
$result2 = $pdo->query($take);
if ($result2->rowCount() ==  1){
    while ($row = $result2->fetch()) {
        echo json_encode($row)."\n"; //將資料打包成.js格是傳出
    }
    echo $account.'帳戶已停用';
}else {

    if ($isCus = $result->rowCount() > 0) {   //若查詢結果等於1，代表有此帳號   //帳號在不重複的狀況下再加上密碼條件
        while ($row = $result->fetch()) {

            $count = $pdo->exec("update Account_Data set Account_Update= '$time' where Account_Number = '$account'"); //將登入時間更新作紀錄
            echo json_encode($row) . "\n";//將資料打包成.js格是傳出
            echo $account . '成功登入';//顯示使用者登入成功
        }
    } else {
        //登入錯誤，紀錄IP
        //若查詢結果為，表示資料庫內並沒有此帳號
        $ip = $_SERVER['REMOTE_ADDR'];   //存取登入的電腦IP
        $ipsql = "select BanIP_Times from BanIP where BanIP_Ip = '$ip' "; //查詢錯誤紀錄裡是否有重複IP
//            echo $ipsql;
        $ipsqls = "select BanIP_status from BanIP where BanIP_Ip = '$ip' ";
        $iptimes = $pdo->query($ipsql);
        $iptimess = $pdo->query($ipsqls);
        while ($row = $iptimes->fetch()) {
            $ipt = $row[0];
        };
        while ($rows = $iptimess->fetch()) {
            $ipts = $rows[0];
        };

        if ($IpCus = $ipt == 0) {  //若記錄裡沒有，新增一筆新的紀錄
            $bnaip = $pdo->exec("insert into BanIP(BanIP_Ip,BanIP_BanTime,BanIP_Times) values('$ip', '$time','2')");
            echo $bnaip . '次，帳號或密碼輸入錯誤';
        } else if ($IpCus = $ipt < 5) {
            //錯誤次數少於五次

            $bnadip = $pdo->exec("UPDATE BanIP SET BanIP_Times= '$ipt'+1 WHERE BanIP_Ip='$ip'");
            echo $ipt . '次，帳號或密碼輸入錯誤';

        } else if ($IpCus = $ipt == 5 && ($ipts == 0)) {
            $opentime = date('Y-m-d  H:i:s', strtotime("+30 seconds"));

            $bnadip = $pdo->exec("UPDATE BanIP SET BanIP_BanTime='$time',BanIP_OpenTime= '$opentime' ,BanIP_status = '1' where BanIP_Ip='$ip'");

            echo '登日次數已使用完畢請於' . $opentime . '後登入';

        } else if ($IpCus = ($ipt == 5) && ($ipts == 1)) {
            $showopentime = "select BanIP_OpenTime from BanIP where BanIP_Ip = '$ip' ";
            $iptimes = $pdo->query($showopentime);
            while ($showrow = $iptimes->fetch()) {
                $shtime = $showrow[0];
                echo '請於' . $shtime . '後再嘗試登入';
            }

        }

    }
}


/**
 * Created by PhpStorm.
 * User: toro
 * Date: 2016/7/14
 * Time: 下午 01:19
 */