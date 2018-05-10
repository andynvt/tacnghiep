<?php
include_once("Database.php");


class Account extends Database
{
    private $table = "account";
    private $username;
    private $pwd;
    private $emp_id;
    private $per_name;

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
        $data[] = $q->fetch_assoc();
        return $data;
    }

    public function getAccountDetail()
    {
        $data = array();
            $sql = "SELECT employee.emp_id, employee.emp_name, username, permission.per_name, `password`, permission.per_id 
            FROM employee
            JOIN account ON employee.emp_id = account.emp_id
            JOIN permission ON account.per_id = permission.per_id
            ORDER BY permission.per_id;";
        $q = $this->conn->query($sql) or die ("failed!");
        while ($r = $q->fetch_assoc()) {
                array_push($data, $r);
            }
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

    public function delete($emp_id)
    {
        $query = "DELETE FROM $this->table WHERE `emp_id` = '$emp_id'";
        $stmt = $this->conn->query($query);
        if ($stmt == false) echo "<script>alert('Delete failed')</script>";
        return $stmt == true;
    }

    public function insert($username, $password, $emp_id, $per_id)
    {
        $query = "INSERT INTO `account` (`username`, `password`, `emp_id`, `per_id`) VALUES ('$username', '$password', '$emp_id', '$per_id')";
        $stmt = $this->conn->query($query);
        echo "<script>alert('". $query . " " . $stmt ."')</script>";
        if ($stmt === false) echo "<script>alert('Insert failed')</script>";
        return $stmt === true;
    }

    public function update($emp_id, $username, $password, $per_id)
    {
        $query = "UPDATE $this->table SET  `username`= '$username', `password`= '$password', `per_id` = '$per_id' WHERE `emp_id` = '$emp_id'";
        $stmt = $this->conn->query($query);
        return $stmt == true;
    }
    public function getEmpList(){
        $data = array();
        $sql = "SELECT `emp_id`, `emp_name` FROM `employee`  WHERE emp_id NOT IN (SELECT `emp_id` FROM `account`)";
        $q = $this->conn->query($sql) or die("failed");
        while ($r = $q->fetch_assoc()) {
           array_push($data,$r);
        }
        return $data;
    }
    public function getEmp($emp_id){
        $sql = "SELECT * FROM `employee` WHERE emp_id = $emp_id";
        $q = $this->conn->query($sql) or die("failed!");
        $data[] = $q->fetch_assoc();
        return $data;
    }
    public function changePassword($password, $username)
    {
        $query = "UPDATE $this->table SET  `username`= $username_new, `password`= $password, `per_id` = $per_id WHERE `username` = $username_old";
        $stmt = $this->conn->query($query);
        return $stmt == true;
    }
}

?>
