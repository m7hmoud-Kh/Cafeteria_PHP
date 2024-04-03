<?php
class Connection 
{
    private $dbname="cafephp";
    private $host="localhost";
    private $user="root";
    private $pass="";
    private $con;
    function __construct()
    {
        try{

            $this->con=new pdo("mysql:host=$this->host;dbname=$this->dbname;port=3307",$this->user,$this->pass);
        }catch(PDOException $e)
        {
            echo "connection failed".$e->getMessage();
            exit();
        }
    }
    

    function getConnection()
    {
        return $this->con;
    }
}


?>