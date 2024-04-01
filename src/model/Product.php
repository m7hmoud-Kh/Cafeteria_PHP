<?php
class Product {
    public $con;
    function __construct(){
        $connection = new Connection();
        $this->con = $connection->con;    
    }
function addProducts($productName, $price,$quantity,$image,$category_id){
    $stmt=$this->con->prepare('insert into products(name,price,quantity,image,category_id)  values(?,?,?,?,?)');
    $stmt->execute(
        [$productName, $price, $quantity, $image,$category_id]);
}
function getProductForPagination($pageLimit,$offset){
    $data= $this->con->query("select* from products limit $pageLimit offset $offset");
    return $data->fetchAll(PDO::FETCH_ASSOC);
}
function getProduct($condition=1){
    $result=$this->con->query("select* from products where $condition");
return $result->fetch(PDO::FETCH_ASSOC);
}
function deleteProductById($id){
    $this->con->query("delete from products where id=$id");
}
function updateProduct($values,$id){
    $this->con->query("update products set $values where id=$id");
}
function getNumberOfProducts() {
    $result = $this->con->query("select count(id) from products");
    
    if ($result) {
        
        $count = $result->fetchColumn();
        return $count;
    } else {
        return false;
    }
}
}
?>
}
?>