<?php

class Connection
{

    private $databaseType = "mysql";
    private $dbname = "cafephp";
    private $host = "localhost";
    private $userName = "root";
    private $password = "";

    private $connection = "";

    function __construct()
    {
        $this->connection = new PDO(
            "$this->databaseType:
            host=$this->host;dbname=$this->dbname",
            $this->userName,
            $this->password
        );
    }
    public function getConnection()
    {
        return $this->connection;
    }
}

try {


    // $connection = new Connection();
    // $connection = $connection->getConnection();
    // $data = $connection->query("select * from products");
    // $data = $data->fetch(PDO::FETCH_ASSOC);
    // echo $data['image'];
    // echo "<img src='./../../gallery/{$data['image']}' width='80px'>";




} catch (PDOException $e) {
    echo $e->getMessage();
}
?>