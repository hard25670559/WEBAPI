<?php
class Connection
{
    public static function Getconnection()
    {
        require_once ('config.php');
        return new mysqli(Db_Host,Db_User,Db_PassWord,Db_Name);

    }
}

/**
 * Created by PhpStorm.
 * User: toro
 * Date: 2016/7/14
 * Time: 下午 01:11
 */