<?php
require ("../../model/Product.php");
require("../../model/Connection.php");

var_dump($_POST);

$products=new Product;
$id=$_POST['id'];

$products->updateProduct("
name='{$_POST['productName']}',
price='{$_POST['price']}',
price='{$_POST['quantity']}',
price='{$_POST['category_id']}'

",$id);
header("location:../../views/dashboard/AllProduct.php");

