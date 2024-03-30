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
function add_user($username, $email, $passwordHash, $image){
    $stmt=$this->connection->prepare('insert into users(username,email,password,image)  values(?,?,?,?)');
    $stmt->execute(
        [$username, $email, $passwordHash, $image]);

}

function add_room($cols,$values){
    $this->connection->query("insert into rooms($cols)  values($values)");
    

}
function getUsersForPagination($pageLimit,$offset){
     $data= $this->connection->query("select* from users limit $pageLimit offset $offset");
     return $data->fetchAll(PDO::FETCH_ASSOC);
}
function get_user($condition=1){
    $result=$this->connection->query("select* from users where $condition");
   return $result->fetch(PDO::FETCH_ASSOC);
}
function delete_user($id){
    $this->connection->query("delete from users where id=$id");
}
function updateUser($values,$id){
    $this->connection->query("update users set $values where id=$id");
}

function getNumberOfUsers() {
    $result = $this->connection->query("select count(id) from users");
    
    if ($result) {
        
        $count = $result->fetchColumn();
        return $count;
    } else {
        
        return false;
    }
}
}

?>