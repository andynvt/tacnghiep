<?php
include_once("Database.php");



class Account extends Database
{
    private $table = "account";
    private $username = "user";
    private $pwd = "user";
    private $emp_id;
    private $per_name;
    public function getAll()
    {
        $data = array();
        $sql = "SELECT * FROM $this->table" ;
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
    public function getAccountDetail (){
        $data = array();
        $sql = "SELECT employee.emp_id, employee.emp_name, username, permission.per_name 
                FROM employee
                LEFT JOIN account ON employee.emp_id = account.emp_id
                LEFT JOIN permission ON account.per_id = permission.per_id";
        $q = $this->conn->query($sql) or die ("failed!");
        while ($r = $q->fetch_assoc()) {
            if($r['username'] === NULL)
            {
                array_push($data, $r['emp_id'], $r['emp_name'],"Chưa có", "Chưa có");
            }
            else{
                array_push($data, $r['emp_id'], $r['emp_name'],$r['username'],$r['per_name']);
            }
            
        }
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

    public function update($username_old, $username_new, $password,$per_id)
    {
        $query = "UPDATE $this->table SET  `username`= $username_new, `password`= $password, `per_id` = $per_id WHERE `username` = $username_old";
        $stmt = $this->conn->query($query);
        return $stmt == true;
    }

}
 
?>
