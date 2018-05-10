<?php

class Database
{
    private $host = "localhost";
    private $db_name = "preschool";
    private $username = "root";
    private $password = "";

    protected $conn;

    public function __construct()
    {
        $this->connect();
    }
    public function connect()
    {
        if (!isset($this->conn)) {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            mysqli_set_charset($this->conn, 'utf8');
            if (!$this->conn) {
                echo "Kết nối thất bại";
                exit;
            }
        }
        return $this->conn;
    }

    public function getMaxId($id_name, $table)
    {
        $query = "SELECT $id_name FROM  $table ORDER BY $id_name DESC";
        $stmt = $this->conn->query($query) or die("failed!");
        $data = $stmt->fetch_assoc();
        return $data[$id_name];
    }
}
