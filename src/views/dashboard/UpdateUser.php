<?php
require ("../../model/UserModel.php");



$users=new User;
$id=$_POST['id'];
$users->updateUser("
username='{$_POST['username']}',
email='{$_POST['email']}',
password='{$_POST['password']}'
image='
",$id);
