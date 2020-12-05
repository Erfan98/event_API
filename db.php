<?php

class DB {
    protected $host='127.0.0.1';
    protected $dbname='event_api';
    protected $dbuser ='root';
    protected $pass='';

    public function dbconnect()
    {
        $connection = new mysqli($this->host,$this->dbuser,$this->pass,$this->dbname);
        if($connection->connect_error){
            die($connection->connect_error);
        }

        return $connection;
    }
}