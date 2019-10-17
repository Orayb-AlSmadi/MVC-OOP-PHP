<?php


class DB
{
private $servername = "localhost";
private $dbname = "store";
private $username = "root";
private $password = "123456@Mysql";

function connect (){
    try {
        $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        var_dump($conn);
//        echo "Connected successfully";
        return $conn;
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
}
}