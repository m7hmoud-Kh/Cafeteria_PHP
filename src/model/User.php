<?php
require 'Connection.php';

class User{
    private $id;
    private $username;
    private $email;
    private $password;
    private $is_admin;
    private $image;
    private $created_at;
    private $conn;
    private $data;
    function __construct()
    {
        $connObj=new Connection;
        $this->conn=$connObj->getConnection();
    }
    function __set($key,$value)
    {
        $this->$key=$value;
    }
    function  getUserData($cond=1)
    {
        $stm=$this->conn->query("select * from users where $cond");
        // $stm->execute([$cond]);
        $this->data=$stm->fetch(PDO::FETCH_ASSOC);
        return $this->data;
        
    }
    
    function UpdateUserData($values,$email)
    {
        $sql=  "UPDATE users SET token = ? WHERE email=?";
        //$sql="INSERT INTO users (token) VALUES ('{$values}')  WHERE $cond";
         $stm = $this->conn->prepare($sql);
         $stm->execute([$values,$email]);
        
    }
    function reset_pass($value,$token)
    {
        $sql="update users set password= ? where token=?";
        $stm = $this->conn->prepare($sql);
        $stm->execute([$value,$token]);
        header("Location:../../view/login.php");
    }


}



?>