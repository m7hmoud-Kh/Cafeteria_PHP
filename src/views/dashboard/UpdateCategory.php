<?php
require ("../../model/Category.php");
require("../../model/Connection.php");

var_dump($_POST);

$categories=new Category;
$id=$_POST['id'];

$categories->updateCategory("
name='{$_POST['name']}'

",$id);
header("location:../../views/dashboard/AllCategory.php");

