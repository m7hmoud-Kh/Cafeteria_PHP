<?php 
//test page to hash password to save it in data base for testing and 
//see if login hasnot problem it will replace by home 
$pass="test123";
$hashedpass=password_hash($pass,PASSWORD_DEFAULT);
echo $hashedpass;
?>