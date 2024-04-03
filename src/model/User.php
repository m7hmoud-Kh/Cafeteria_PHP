<?php

class User {
 public 
    function __construct(){
        //$this->connection=new pdo("mysql:host=$this->host;dbname=$this->dbname",$this->user,$this->password);
        $connection = new Connection();
        $this->con = $connection->con;
    }


function add_user($username, $email,$room_id, $passwordHash, $image){
    $stmt=$this->con->prepare('insert into users(username,email,room_id,password,image)  values(?,?,?,?,?)');
    $stmt->execute(
        [$username, $email,$room_id, $passwordHash, $image]);

}


function getUsersForPagination($pageLimit,$offset){
    $data = $this->con->query("select id, username, email, is_admin, room_id, image, created_at from users limit $pageLimit offset $offset");
    if($data){
        return $data->fetchAll(PDO::FETCH_ASSOC);

     }
     else{
        return 0;
     }
}
function get_user($id){
    $result=$this->con->query("select* from users  where id=$id");
   return $result->fetch(PDO::FETCH_ASSOC);
}
function getUserByEmail($email){
    $result=$this->con->query("select* from users  where $email");
   return $result->fetch(PDO::FETCH_ASSOC);
}
function delete_user($id){
    $this->con->query("delete from users where id=$id");
}
function updateUser($values,$id){
    $this->con->query("update users set $values where id= $id");
}

function getNumberOfUsers() {
    $result = $this->con->query("select count(id) from users");
    
    if ($result) {
        
        $count = $result->fetchColumn();
        return $count;
    } 
    else {
        
        return false;
    }

}
}
?>