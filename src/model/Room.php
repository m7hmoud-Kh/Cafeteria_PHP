<?php
class Room{

    public $con;
    public function __construct()
    {
        $connection = new Connection();
        $this->con = $connection->con;
    }

    public function getAllRooms(){
        $stmt = $this->con->prepare('select * from rooms');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function add_room($cols,$values){
        $this->con->query("insert into rooms($cols)  values($values)");
        
    
    }

}