<?php
require ("../../model/User.php");
require("../../model/Connection.php");



$users=new User;
$id=$_POST['id'];
$password=$_POST['password'];
// $passwordHash = password_hash($password, PASSWORD_BCRYPT);
$users->updateUser("
username='{$_POST['username']}',
email='{$_POST['email']}',
password='$passwordHash'
",$id);
header("location:../../views/dashboard/AllUser.php");

