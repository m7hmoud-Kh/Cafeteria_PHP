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
    function  getUserData($email)
    {
        $stm=$this->conn->prepare("select * from users where email=?");
        $stm->execute([$email]);
        $this->data=$stm->fetch(PDO::FETCH_ASSOC);
        return $this->data;
        // $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        // $stmt->execute([$email]);
        // $this->data = $stmt->fetch(PDO::FETCH_ASSOC);
        // return $this->data;
    }


}


// class User{
//   private $data;
//   private $conn;
//   function __construct( ) {
//     $connObj=new Connection;   
//     $this->conn=$connObj->getConnection();
// }

// function login($id)
// {
    
//     $stm=$this->conn->query("select * from users where id=$id");
//     $this->data=$stm->fetch(PDO::FETCH_ASSOC);
//     if($this->data)
//     {

//           var_dump($this->data);
//     }
//     else 
//     {
//         header("Location:login.php?error=1");
//     }
// }   


// }
//  $a=new User;
//  $a->login(2);


?>