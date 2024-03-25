<?php

class User{


    public $con;
    public function __construct()
    {
        $connection = new Connection();
        $this->con = $connection->con;
    }

    public function getAllUserToMakeOrderByAdmin()
    {
        $stmt = $this->con->prepare('SELECT id,username FROM users WHERE is_admin = ?');
        $stmt->execute([false]);
        return  $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($userId){
        $stmt = $this->con->prepare('SELECT * FROM users where id = ?');
        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}