<?php 

$pass="test123";
$hashedpass=password_hash($pass,PASSWORD_DEFAULT);
echo $hashedpass;
?>