<?php
include_once '../../model/User.php';
include_once '../../model/Product.php';
include_once '../../model/Room.php';
include_once '../../model/Order.php';
include_once '../../model/OrderProduct.php';


require_once '../../model/Connection.php';

class ManualOrder{
    public $userModel;
    public $productModel;
    public $roomModel;
    public $orderModel;
    public $orderProductModel;
    public const PROCESSING = 1;
    public const OUT_OF_DELIVERY = 2;
    public const DONE = 3;
    public function __construct()
    {
        $this->userModel = new User();
        $this->productModel = new Product();
        $this->roomModel = new Room();

        $this->orderModel = new Order();
        $this->orderProductModel = new OrderProduct();
    }
    public function getAllUser(){
        return $this->userModel->getAllUserToMakeOrderByAdmin();
    }

    public function getAllProduct(){
        return $this->productModel->getAllProduct();
    }

    public function getAllRoom(){
        return $this->roomModel->getAllRoom();
    }

    public function storeInfoCartInSession($data)
    {
        $productAlreadyExist = false;

        if($_SESSION['cart']){
        $productAlreadyExist = key_exists($data['product_id'],$_SESSION['cart'][$data['user_id']]);
        }
        if(!$productAlreadyExist){
            $_SESSION['cart'][$data['user_id']][$data['product_id']] = [
                'quantity' => $data['quantity'],
                'totalPerProduct' => $data['product_total']
            ];
        }else{
            $_SESSION['cart'][$data['user_id']][$data['product_id']]['quantity'] = $data['quantity'];
            $_SESSION['cart'][$data['user_id']][$data['product_id']]['totalPerProduct'] = $data['product_total'];
        }
    }

    public function getProductById($productId)
    {
        return $this->productModel->getProductById($productId);
    }

    public function storeOrder($data){
        return $this->orderModel->storeOrder($data);
    }

    public function insertProductOrder($data)
    {
        return $this->orderProductModel->insertProductOrder($data);
    }

}