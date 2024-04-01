<?php
class Category {
    public $con;
    public function __construct(){
        $connection = new Connection();
        $this->con = $connection->con;
    }

    public function get_category($con=1){
        $cat = $this->con->query("select* from categories where $con");
        return $cat->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addCategory($categoryName){
        $cat=$this->con->prepare('insert into categories(name)  values(?)');
        $cat->execute([$categoryName]);
    
    }
    
    function add_room($cols,$values){
        $this->con->query("insert into rooms($cols)  values($values)");
        
    
    }

}

?>