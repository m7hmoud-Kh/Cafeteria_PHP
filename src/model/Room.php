<?php
class Room{

    public $con;
    public function __construct()
    {
        $connection = new Connection();
        $this->con = $connection->con;
    }

    public function getAllRoom(){
        $stmt = $this->con->prepare('SELECT * FROM rooms');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



}