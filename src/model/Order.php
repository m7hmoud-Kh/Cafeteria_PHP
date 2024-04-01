<?php


// require "Connection.php";

class Order
{


    private $connection = "";

    function __construct()
    {
        $this->connection = new Connection();
        $this->connection = $this->connection->getConnection();
    }


    public function getOrderid($cond = 1)
    {
        $this->connection = $this->connection->query("select id from orders where $cond order BY id DESC LIMIT 1");
        return $this->connection->fetch(PDO::FETCH_ASSOC);
    }



    public function getRoom($cond = 1)
    {
        $this->connection = $this->connection->query("select room_id from orders where $cond");
        return $this->connection->fetch(PDO::FETCH_ASSOC);
    }





    public function insertOrder($user_id, $total, $status, $notes, $room_id)
    {
        $sql = "INSERT INTO orders (user_id, total,status, notes, room_id, created_by) VALUES (?, ?, ?, ?, ?, 'me')";
        $stmt = $this->connection->prepare($sql);

        $stmt->bindParam(1, $user_id, PDO::PARAM_INT);
        $stmt->bindParam(2, $total, PDO::PARAM_STR);
        $stmt->bindParam(3, $status, PDO::PARAM_STR);
        $stmt->bindParam(4, $notes, PDO::PARAM_STR);
        $stmt->bindParam(5, $room_id, PDO::PARAM_INT);
        return $stmt;
        // i return to can excute 

        
        // $stmt->execute();

    }

}











?>