<?php
require_once ("connedciton.php");
header("Access-Control-Allow-Origin: *");
$user = 'userdb';
$password = '123456';
$host = 'localhost';
$dbname = 'training';

$dsn = 'mysql:host='.$host.';dbname='.$dbname;
$pdo = new PDO($dsn, $user, $password);

$account = $_GET["account"];
$password = $_GET["password"];
//echo $_POST['account'];
//echo $_POST['password'];

$str ="select * from Driver where Driver_Account = '{$account}' and Driver_Password = '{$password}'";

$result = $pdo->query($str);

$data = array();
while ($row = $result->fetch()) {
    array_push($data, $row);
}

echo json_encode($data);


/**
 * Created by PhpStorm.
 * User: toro
 * Date: 2016/7/14
 * Time: 下午 01:19
 */