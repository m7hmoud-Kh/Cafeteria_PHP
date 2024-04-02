<?php
class Room{

    public $con;
    public function __construct()
    {
        $connection = new Connection();
        $this->con = $connection->con;
    }
public  function getRoomById($id)
{
    $cat = $this->con->query("select* from categories where id= $id");
    return $cat->fetchAll(PDO::FETCH_ASSOC);
}
    public function getAllRooms($con=1){
        $stmt = $this->con->prepare("select * from rooms where $con");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addRoom($room){
        $cat=$this->con->prepare('insert into categories(name)  values(?)');
        $cat->execute([$room]);
    
    }
    function deleteRoomById($id){
    
        $this->con->query("delete from rooms where id=$id");
    
}
public function updateRoom($values,$id){
    $this->con->query("update categories set $values where  id= $id");

}

}