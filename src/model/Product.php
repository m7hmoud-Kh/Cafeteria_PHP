<?php

class Product
{

    public $con;
    private $connection = "";

    public function __construct()
    {
        $connect = new Connection();
        $this->con = $connect->con;
        $this->connection = $connect->con;


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

    public function decrementOfQuantity($data)
    {
        $stmt = $this->con->prepare('UPDATE products set quantity = ? where id = ?');
        $stmt->execute([$data['quantity'], $data['product_id']]);

    }

    public function getProducts($cond = 1)
    {
        $this->connection = $this->connection->query("SELECT * FROM products WHERE quantity > 0");
        return $this->connection->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectBasedCondetion($cond = '')
    {
        $statement = $this->connection->prepare("SELECT * FROM products WHERE $cond");
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getCategoryName($id)
    {
        $this->connection = $this->connection->query("select name from categories where id=$id");
        return $this->connection->fetch(PDO::FETCH_ASSOC);
    }


    public function search($word)
    {
        $this->connection = $this->connection->query("SELECT * FROM products WHERE name LIKE '%%$word%%'");
        return $this->connection->fetchAll(PDO::FETCH_ASSOC);
    }

   


}
