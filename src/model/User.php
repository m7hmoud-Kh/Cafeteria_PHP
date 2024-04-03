<?php
require_once 'Connection.php';


class User{
    private $id;
    private $username;
    private $email;
    private $password;
    private $is_admin;
    private $image;
    private $created_at;
    private $con;
    private $data;
    function __construct()
    {
        $connObj=new Connection();
        $this->con=$connObj->getConnection();
    }
    function __set($key,$value)
    {
        $this->$key=$value;
    }
    function  getUserData($cond=1)
    {
        try{

            $stm=$this->con->query("select * from users where $cond");
            $this->data=$stm->fetch(PDO::FETCH_ASSOC);
            // $stm->execute([$cond]);
            return $this->data;
        }catch(PDOException $e)
        {
            echo "Error retrieving user data: ".$e->getMessage();

        }
        
    }
    
    function UpdateUserData($values,$email)
    {
       try{
         $sql=  "UPDATE users SET token = ? WHERE email=?";
        //$sql="INSERT INTO users (token) VALUES ('{$values}')  WHERE $cond";
         $stm = $this->con->prepare($sql);
         $stm->execute([$values,$email]);
       }catch(PDOException $e)
       {
        echo "Error updating user data: " . $e->getMessage();
       }
    }
    function reset_pass($value,$token)
    {

       try{
         $sql="update users set password= ? where token=?";
        $stm = $this->con->prepare($sql);
        $stm->execute([$value,$token]);
        header("Location:../../view/login.php");
       }catch(PDOException $e)
       {
        echo "Error resetting password: " . $e->getMessage();
       }
    }
    function reset_token($token)
    {
        try{
            $sql="update users set token='' where token =?";
           $stm = $this->con->prepare($sql);
           $stm->execute([$token]);
           
          }catch(PDOException $e)
          {
           echo "Error resetting token: " . $e->getMessage();
          }
    }


}



?>