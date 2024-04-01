<?php

// require "Connection.php";

class ProductOrder
{


    private $connection = "";

    function __construct()
    {
        $this->connection = new Connection();
        $this->connection = $this->connection->getConnection();
    }

    public function getOrderProduct($cond = 1)
    {
        $this->connection = $this->connection->query("select * from order_products where $cond");
        return $this->connection->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertProductOrder($orderid, $productid, $quantity, $total)
    {
       
        $sql = "INSERT INTO order_products (order_id, product_id, quantity, total) VALUES (?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
    
        $stmt->bindParam(1, $orderid, PDO::PARAM_INT);
        $stmt->bindParam(2, $productid, PDO::PARAM_INT);
        $stmt->bindParam(3, $quantity, PDO::PARAM_INT);
        $stmt->bindParam(4, $total, PDO::PARAM_STR);
    
        
        $stmt->execute();
    
        // Return the last inserted ID
    }

}




?>