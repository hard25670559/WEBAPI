<?php
require_once 'Connection.php';

$test = $_POST['controller'];
require_once $test.'.php';

new ReflectionClass($test);

$user = 'userdb';
$password = '123456';
$host = 'localhost';
$dbname = 'test';

//$pdo = new Connection($user, $password, $host, $dbname);
//$result = $pdo->getPDO()->query('select * from user');
//while ($row = $result->fetch()) {
//    echo json_encode($row);
    function select (){
        $db=new PDO("mysql:host=".$host.";
                    dbname=".$dbname, $user, $password,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        //PDO::MYSQL_ATTR_INIT_COMMAND 設定編碼

        //echo '連線成功';
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //錯誤訊息提醒

        //Query SQL
        $sql="Select * from user where user_id = 'A003'";
        $result=$db->query($sql);
        while($row=$result->fetch(PDO::FETCH_OBJ)){
        //PDO::FETCH_OBJ 指定取出資料的型態
        echo json_encode($row->user_id."\n");
        echo json_encode($row->name."\n");
    }
}
    function inster(){
        $db=new PDO("mysql:host=".$host.";
                    dbname=".$dbname, $user, $password,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        //PDO::MYSQL_ATTR_INIT_COMMAND 設定編碼

        //echo '連線成功';
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //錯誤訊息提醒
        $count=$db->exec("insert into user(user_id,name) values('A007', 'troyt1')");
        echo json_encode($count."\n");
}
    function update(){
        $db=new PDO("mysql:host=".$host.";
                    dbname=".$dbname, $user, $password,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        //PDO::MYSQL_ATTR_INIT_COMMAND 設定編碼

        //echo '連線成功';
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //錯誤訊息提醒
        //Update

        $count =$db->exec("update user set name='toyo' where user_id='A001'");

        $db=null; //結束與資料庫連線
    }
//}
?>