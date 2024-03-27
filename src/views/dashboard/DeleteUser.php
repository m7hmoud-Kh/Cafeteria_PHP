<?php
require ("../../model/UserModel.php");


$users=new User;
var_dump($_POST);

$users->delete_user("id");