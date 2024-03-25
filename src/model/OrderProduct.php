<?php
class OrderProduct{

    public $con;
    public function __construct()
    {
        $connection = new Connection();
        $this->con = $connection->con;
    }

    public function insertProductOrder($data){
        $stmt = $this->con->prepare('INSERT INTO order_products (order_id,product_id,quantity,total) VALUES (?,?,?,?)');
        $stmt->execute([
            $data['order_id'],
            $data['product_id'],
            $data['quantity'],
            $data['total_per_product']
        ]);
    }

    public function getAllProductOfSpecificOrder($orderId){
        $stmt = $this->con->prepare('SELECT * FROM order_products where order_id = ?');
        $stmt->execute([$orderId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}