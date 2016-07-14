<?php
header('Access-Control-Allow-Origin: *');

$dsn = "mysql:host=localhost;dbname=test";
$pdo = new PDO($dsn, 'dbuser', '123456');

//$account = $_GET['account'];
//$password = $_GET['password'];
$account = $_POST['account'];
$password = $_POST['password'];


$sql = "select * from user where account = '$account' and passwd = '$password'";

//echo $sql;

$result = $pdo->query($sql);

$isCus = $result->rowCount() > 0 ? true : false;

$data = array($isCus);



echo json_encode($data);

/**
 * Created by PhpStorm.
 * User: hardanonymou
 * Date: 2016/7/14
 * Time: 下午 03:53
 */