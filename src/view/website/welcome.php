<?php 
session_start();
//test page to hash password to save it in data base for testing and 
//see if login hasnot problem it will replace by home 
$pass="123456789aas";
// if(!isset($_SESSION['user_id']))
//          {
//             header("Location:login.php");
//          }
$hashedpass=password_hash($pass,PASSWORD_DEFAULT);
echo "<pre>";
var_dump($hashedpass);
var_dump(password_verify($pass,$hashedpass));

// var_dump($_SESSION);
echo "</pre>";

?>