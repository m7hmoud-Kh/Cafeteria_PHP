<?php
// start_session();
require '../../model/Order.php';
class OrderController{
    private $Model;
    function __construct()
    {
        $this->Model=new Order();
    }
    function fetch_data($user_id,$pageLimit,$offset)
    {
        $data=$this->Model->getOrderData($user_id,$pageLimit,$offset);
        return $data;
    }
    function getTotalCount($user_id)
    {
        $data=$this->Model->countOrder($user_id);
        
        return $data;
    }
    function cancelOrder($id)
    {
        
         $data=$this->Model->updateStatus($id);
         return $data;
    }
}
if(!empty($_GET['id']))
{

    if(isset($_GET['id']) ) {

    
        $order=new OrderController;
       $order->cancelOrder($_GET['id']);
       header("Location:../../view/website/myorder.php");
        
        
    } 
   
}
