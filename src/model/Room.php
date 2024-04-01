<?php
class Room{

    public $con;
    private $connection = "";

    public function __construct()
    {
        $connection = new Connection();
        $this->con = $connection->con;
        $this->connection = $connection->con;

    }

    public function getAllRoom(){
        $stmt = $this->con->prepare('SELECT * FROM rooms');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getRoom($name)
    {
        $stmt = $this->connection->prepare("SELECT id FROM rooms WHERE name = ?");
        $stmt->execute([$name]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    public function getAll_Room($cond = 1)
    {
        $this->connection = $this->connection->query("select * from rooms where $cond");
        return $this->connection->fetchAll(PDO::FETCH_ASSOC);
    }



}
