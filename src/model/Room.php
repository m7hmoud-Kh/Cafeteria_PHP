<?php

// require "Connection.php";

class Room
{


    private $connection = "";

    function __construct()
    {
        $this->connection = new Connection();
        $this->connection = $this->connection->getConnection();
    }
    public function getRoom($name)
    {
        $stmt = $this->connection->prepare("SELECT id FROM rooms WHERE name = ?");
        $stmt->execute([$name]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    public function getAllRoom($cond = 1)
    {
        $this->connection = $this->connection->query("select * from rooms where $cond");
        return $this->connection->fetchAll(PDO::FETCH_ASSOC);
    }




}




?>