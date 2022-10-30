<?php
class Database
{
    //db params
    private $host = 'localhost';
    private $username = 'root';
    private $password = 'root';
    private $db_name = 'test';
    private $conn;

    //db connect
    public function connect()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection error: ' . $e->getMessage();
        }

        return $this->conn;
    }
}
