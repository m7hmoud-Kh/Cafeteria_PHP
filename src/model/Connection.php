<?php
class Connection 
{
    private $dbname="cafephp";
    private $host="localhost";
    private $user="root";
    private $pass="";
    private $conn;
    function __construct()
    {
        try{

            $this->conn=new pdo("mysql:host=$this->host;dbname=$this->dbname;port=3307",$this->user,$this->pass);
        }catch(PDOException $e)
        {
            echo "connection failed".$e->getMessage();
            exit();
        }
    }
    

    function getConnection()
    {
        return $this->conn;
    }
}


?>