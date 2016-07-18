<?php

class Connection {
    private $user;
    private $password;
    private $host;
    private $dbname;

    private $info;
    private $PDO;

    function __construct($user, $password, $host, $dbname)
    {
        $this->user = $user;
        $this->password = $password;
        $this->host = $host;
        $this->dbname = $dbname;

        $this->info = 'mysql:host='.$this->host.';dbname='.$this->dbname;
        $this->PDO = new PDO($this->info, $this->user, $this->password);
    }
    
    public function getPDO()
    {
        return $this->PDO;
    }

}