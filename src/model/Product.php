<?php

class Product {

    public $con;
    public function __construct()
    {
        $connection = new Connection();
        $this->con = $connection->con;
    }

    public function getAllProduct()
    {
        $stmt = $this->con->prepare("SELECT * FROM products WHERE quantity > 0");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($id)
    {
        $stmt = $this->con->prepare('SELECT * FROM products WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function decrementOfQuantity($data){
        $stmt = $this->con->prepare('UPDATE products set quantity = ? where id = ?');
        $stmt->execute([$data['quantity'],$data['product_id']]);

    }

}