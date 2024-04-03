<?php
class Room{

    public $con;
    public function __construct()
    {
        $connection = new Connection();
        $this->con = $connection->con;
    }
    public function getRoomsPagination($pageLimit,$offset){
        $data= $this->con->query("select* from rooms limit $pageLimit offset $offset");
        return $data->fetchAll(PDO::FETCH_ASSOC);
    }
public  function getRoomById($id)
{
    $cat = $this->con->query("select* from rooms where id= $id");
    return $cat->fetchAll(PDO::FETCH_ASSOC);
}
    public function getAllRooms($con=1){
        $stmt = $this->con->prepare("select * from rooms where $con");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addRoom($room){
        $cat=$this->con->prepare('insert into rooms(name)  values(?)');
        $cat->execute([$room]);
    
    }
    function deleteRoomById($id){
    
        $this->con->query("delete from rooms where id=$id");
    
}
public function updateRoom($values,$id){
    $this->con->query("update rooms set $values where  id= $id");


}

 public function getNumberOfRooms() {
    $result = $this->con->query("select count(id) from rooms");
    
    if ($result) {
        
        $count = $result->fetchColumn();
        return $count;
    } else {
        return false;
    }
}
}
// public function getRoomByName($name){
//     $this->con->query("select* from rooms where name= $name");
// }

