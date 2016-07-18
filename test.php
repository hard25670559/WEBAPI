<?php session_start(); ?>
<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');

$dsn = "mysql:host=localhost;dbname=test";
$pdo = new PDO($dsn, 'userdb', '123456');


//$function =$_POST['controller'];
$function =$_POST['controller'];
//echo $function;
switch ($function)
{
    case 'login':
        $account = $_POST['account']; //抓取前端相對應變數值
        $password = $_POST['password'];
        //查詢資料庫內是否有相對應的值
        $sql = "select * from Account_Data where Account_Number = '$account' and Account_Password = '$password'";

        $result = $pdo->query($sql);
        if ($isCus = $result->rowCount() >0 )
        {   //若查詢結果等於1，代表有此帳號   //帳號在不重複的狀況下再加上密碼條件
            while ($row = $result->fetch()) {
                $time =date ("Y-m-d H:i:s" , mktime(date('H')+8, date('i'), date('s'), date('m'), date('d'), date('Y'))) ;; //將時間寫入變數
//                echo $time;
                $count = $pdo->exec("update Account_Data set Account_Update= '$time' where Account_Number = '$account'"); //將登入時間更新作紀錄
                $_SESSION['Account_Data'] = $account;
                echo json_encode($row)."\n";//將資料打包成.js格是傳出
                echo $account.'成功登入';//顯示使用者登入成功
            }
        }else {
            //若查詢結果為，表示資料庫內並沒有此帳號
            echo'帳號或密碼輸入錯誤';

        }

        break;
    case 'insert':
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
            $time =date ("Y-m-d H:i:s" , mktime(date('H')+8, date('i'), date('s'), date('m'), date('d'), date('Y'))) ;; //將時間寫入變數
            $count1  = $pdo->exec("insert into Account_Data(Account_Number,Account_Password,Account_Create) values('$account', '$password','$time')");
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
//        session_destroy();
        break;
    case 'update':
        $account = $_POST['account'];   //抓取前端相對應變數值
        $password = $_POST['password'];
        $name = $_POST['name'];
        //查詢是否有此帳號，以及確認密碼
        $sql = "select * from Account_Data where Account_Number = '$account' and Account_Password = '$password'";
        //echo $sql;
        $result = $pdo->query($sql); //若查詢結果筆數大於零，表示有此帳號以及認證成功，繼續修改資料的步驟
        if ($cat=$result->rowCount() > 0)
        {   //將要修改的欄位值帶入
            $time =date ("Y-m-d H:i:s" , mktime(date('H')+8, date('i'), date('s'), date('m'), date('d'), date('Y'))) ;; //將時間寫入變數
            $count = $pdo->exec("update Account_Data set Account_UserName='$name',Driver_Password = '$password',Account_Update ='$time' where Account_Number='$account'");

        }else
        { //若帳號或密碼錯誤則無法修改
            echo '帳號密碼輸入錯誤，無法進行更改';
        }
        $take = "select * from Account_Data where Account_Number = '$account'";
        $result2 = $pdo->query($take);
        if ($result2->rowCount() >  0){
            while ($row = $result2->fetch()) {
                echo json_encode($row)."\n"; //將資料打包成.js格是傳出
            }
            echo $account.'資料更新完成';
        }
        break;
    case 'Delete':
        $account = $_POST['account'];   //抓取前端相對應變數值
        $password = $_POST['password'];
        $sql = "select * from Account_Data where Account_Number = '$account' and Account_Password = '$password'";
        //echo $sql;
        $result = $pdo->query($sql); //若查詢結果筆數大於零，表示有此帳號以及認證成功，繼續修改資料的步驟
        if ($cat=$result->rowCount() > 0)
        {   //將要修改的欄位值帶入
            $count = $pdo->exec("DELETE FROM Account_Data WHERE Account_Number ='$account';
");
        }else
        { //若帳號或密碼錯誤則無法修改
            echo '帳號密碼輸入錯誤，無法進行刪除';
        }
        $take = "select * from Account_Data where Account_Number = '$account'";
        $result2 = $pdo->query($take);
        if ($result2->rowCount() ==  0){
            while ($row = $result2->fetch()) {
                echo json_encode($row)."\n"; //將資料打包成.js格是傳出
            }
            echo $account.'資料刪除完成';
        }
        break;
    default:
        break;
}

/**
 * Created by PhpStorm.
 * User: hardanonymou
 * Date: 2016/7/14
 * Time: 下午 03:53
 */