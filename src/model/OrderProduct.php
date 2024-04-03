<?php
require_once 'Connection.php';
class OrderProduct{
    private $con;
    function __construct()
    {
        $connObj=new Connection();
        $this->con=$connObj->getConnection();
    }
    function getOrderDetailes($id)
    {
        $stm=$this->con->prepare("SELECT pr.id,pr.name,pr.price,ord.quantity,pr.image FROM order_products as ord join products as pr on ord.product_id=pr.id and order_id =?");
        $stm->bindParam(1,$id,PDO::PARAM_INT);
        $stm->execute();
        $data=$stm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}


?>