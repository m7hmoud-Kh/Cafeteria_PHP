<?php
require "Connection.php";
class Product
{


    private $connection = "";

    function __construct()
    {
        $this->connection = new Connection();
        $this->connection = $this->connection->getConnection();
    }

    public function getProducts($cond = 1)
    {
        $this->connection = $this->connection->query("select * from products where $cond");
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

// $product = new Product();
// $data = $product->getProducts();
// var_dump($data);


?>