<?php
require 'Connection.php';
class Order{
    private $user_id;
    private $total;
    private $id;
    private $status;
    private $notes;
    private $room_id;
    private $created_by;
    private $created_at;
    private $conn;
    function __construct()
    {
        $connObj=new Connection;
        $this->conn=$connObj->getConnection();
    }
    function getOrderData($user_id,$pageLimit,$offset)
    {
        try{

            $stm=$this->conn->prepare("select * from orders where user_id=? LIMIT ? OFFSET ?");
            $stm->bindParam(1,$user_id,PDO::PARAM_INT);
            $stm->bindParam(2,$pageLimit,PDO::PARAM_INT);
            $stm->bindParam(3,$offset,PDO::PARAM_INT);
            $stm->execute();
            $data=$stm->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }catch(PDOException $e)
        {
            echo "Error retrieving order data: ".$e->getMessage();
        }
    }
    function countOrder($user_id)
    {
        try {
            $stm = $this->conn->prepare("SELECT COUNT(id) AS totalOrders FROM orders WHERE user_id = ?");
            $stm->execute([$user_id]);
            $data = $stm->fetch(PDO::FETCH_ASSOC)['totalOrders'];
            return $data;
        } catch(PDOException $e) {
            echo "Error counting orders: ".$e->getMessage(); 
        }
    }
    function updateStatus($id)
    {
        try{
            $stm = $this->conn->prepare("SELECT status FROM orders WHERE id = ?");
        $stm->bindParam(1, $id, PDO::PARAM_INT);
        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        $status = $result['status'];
        if($status==1)
        {
            $stm2=$this->conn->prepare("UPDATE orders SET status=4 WHERE id=?");
            $stm2->bindParam(1, $id, PDO::PARAM_INT);
            $stm2->execute();
            //return $status; 
        } 
        else 
        {
            $state="You can't cancel order now ";
            return $state;
        }
        }catch(PDOException $e) 
        {
            echo "You can't cancel order";
        }
    }
    
}   