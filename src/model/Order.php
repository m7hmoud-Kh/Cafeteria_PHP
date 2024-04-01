<?php
class Order{

    public $con;
    private $connection = "";

    public const PROCESSING = 1;
    public const OUT_OF_DELIVERY = 2;
    public const DONE = 3;
    public function __construct()
    {
        $connection = new Connection();
        $this->con = $connection->con;
        $this->connection =  $connection->con;

    }

    public function storeOrder($data){
        $stmt = $this->con->prepare('INSERT INTO orders (user_id,total,`status`,notes,room_id,created_by) VALUES (?,?,?,?,?,?)');
        $stmt->execute([
            $data['user_id'],
            $data['total_per_order'],
            $data['status'],
            $data['notes'],
            $data['room_id'],
            $data['created_by']
        ]);
        return $this->con->lastInsertId();
    }

    public function getAllOrderLatest(){
        $stmt = $this->con->prepare('SELECT * FROM orders ORDER BY id DESC');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function updateStatusOfOrder($data){
        $stmt = $this->con->prepare('UPDATE orders set `status` = ? WHERE id = ?');
        $stmt->execute([$data['status'],$data['order_id']]);
    }

    public function getOrderById($orderId){
        $stmt = $this->con->prepare('SELECT * FROM orders WHERE id = ?');
        $stmt->execute([$orderId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function filterOrderbyDateAndUser($data){
        $stmt = $this->con->prepare("SELECT * FROM `orders` WHERE created_at BETWEEN ? AND ? AND user_id = ?");
        $stmt->execute([
            $data['dateFrom'],
            $data['dateTo'],
            $data['user_id']
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function filterOrderbyDate($data){
        $stmt = $this->con->prepare("SELECT * FROM `orders` WHERE created_at BETWEEN ? AND ?");
        $stmt->execute([
            $data['dateFrom'],
            $data['dateTo'],
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function filterOrderbyUser($data){
        $stmt = $this->con->prepare("SELECT * FROM `orders` WHERE  user_id = ?");
        $stmt->execute([
            $data['user_id']
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public function getOrderid($cond = 1)
    {
        $this->connection = $this->connection->query("select id from orders where $cond order BY id DESC LIMIT 1");
        return $this->connection->fetch(PDO::FETCH_ASSOC);
    }



    public function getRoom($cond = 1)
    {
        $this->connection = $this->connection->query("select room_id from orders where $cond");
        return $this->connection->fetch(PDO::FETCH_ASSOC);
    }





    public function insertOrder($user_id, $total, $status, $notes, $room_id)
    {
        $sql = "INSERT INTO orders (user_id, total,status, notes, room_id, created_by) VALUES (?, ?, ?, ?, ?, 'me')";
        $stmt = $this->connection->prepare($sql);

        $stmt->bindParam(1, $user_id, PDO::PARAM_INT);
        $stmt->bindParam(2, $total, PDO::PARAM_STR);
        $stmt->bindParam(3, $status, PDO::PARAM_STR);
        $stmt->bindParam(4, $notes, PDO::PARAM_STR);
        $stmt->bindParam(5, $room_id, PDO::PARAM_INT);
        return $stmt;
    }



}
