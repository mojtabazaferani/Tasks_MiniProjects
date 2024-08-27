<?php

class Database 
{
    private $host = 'localhost';

    private $dataBase = '???';

    private $user = '???';

    private $password = '???';

    public $connect;

    public function Connect()
    {
        $this->connect = null;

        try
        {
            $this->connect = new PDO("mysql:host=$this->host;dbname=$this->dataBase", $this->user, $this->password);

            $this->connect->exec("set names utf8");
        }

        catch(PDOException $exception)
        {
            echo 'Database Could Not Be Connect: ' . $exception->getMessage();
        }

        return $this->connect;

    }
}

?>