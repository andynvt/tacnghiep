<?php
include_once("Database.php");

class Account extends Database
{
    private $table = "account";

    public function getAll()
    {
        $data = array();
        $sql = "SELECT * FROM $this->table";
        $q = $this->conn->query($sql) or die("failed!");
        while ($r = $q->fetch_assoc()) {
            array_push($data, $r);
        }
        return $data;
    }

    public function getOne($emp_id)
    {
        $sql = "SELECT * FROM $this->table WHERE emp_id = $emp_id";
        $q = $this->conn->query($sql) or die("failed!");
        $data = $q->fetch_assoc();
        return $data;
    }

    public function login($username, $password)
    {
        $sql = "SELECT employee.*, permission.* FROM `account` " .
            "INNER JOIN employee ON account.emp_id=employee.emp_id " .
            "INNER JOIN permission ON permission.per_id = account.per_id " .
            "WHERE username = '$username' AND password = '$password'";
        $q = $this->conn->query($sql) or die("failed!");
        $data = $q->fetch_assoc();
        return $data;
    }

    public function delete($username)
    {
        $query = "DELETE FROM $this->table WHERE username = $username";
        $stmt = $this->conn->query($query);
        if ($stmt == false) echo "<script>alert('Delete failed')</script>";
        return $stmt == true;
    }

    public function insert($username, $password, $emp_id, $per_id)
    {
        $query = "INSERT INTO $this->table (`username`, `password`, `emp_id`, `per_id`) VALUES ($username, $password, $emp_id, $per_id)";
        $stmt = $this->conn->query($query);
        if ($stmt == false) echo "<script>alert('Insert failed')</script>";
        return $stmt == true;
    }

    public function update($username_old, $username_new, $password, $per_id)
    {
        $query = "UPDATE $this->table SET  `username`= $username_new, `password`= $password, `per_id` = $per_id WHERE `username` = $username_old";
        $stmt = $this->conn->query($query);
        return $stmt == true;
    }


}


?>
