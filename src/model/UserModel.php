<?php
class User {
    private $host="localhost";
    private $dbname="cofephp";
    private $user="root";
    private $password="";
    private $connection;
      function __construct(){
        $this->connection=new pdo("mysql:host=$this->host;dbname=$this->dbname",$this->user,$this->password);
    }

function get_connection()
{
    return $this->connection;
}
function add_user($cols,$values){
    $this->connection->query("insert into users($cols)  values($values)");
    

}
function get_users(){
    return $this->connection->query("select* from users  ");
}
function get_user($condition=1){
    return $this->connection->query("select* from users where $condition");
}

function delete_user($id){
    $this->connection->query("delete from users where id=$id");
}
function updateUser($values,$id){
    $this->connection->query("update users set $values where id=$id");
}

function getNumberOfRow() {
    $result = $this->connection->query("SELECT COUNT(id) FROM users");
    
    if ($result) {
        // Fetch the count value
        $count = $result->fetchColumn();
        return $count;
    } else {
        // Handle query failure
        return false;
    }
}
}

?>