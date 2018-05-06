<?php
include_once("Database.php");

class Assignment extends Database
{
    private $table = "class_employee";

    private $assign_id = "assign_id";
//    private $class_id;
//    private $emp_id;

    public function getAll()
    {
        $data = array();
        $sql = "SELECT assign_id, class.class_name,class.year,employee.emp_name FROM $this->table " .
            "INNER JOIN class ON class_employee.class_id = class.class_id " .
            "INNER JOIN employee ON class_employee.emp_id=employee.emp_id";
        $q = $this->conn->query($sql) or die("failed!");
        while ($r = $q->fetch_assoc()) {
            array_push($data, $r);
        }
        return $data;
    }

    public function getOne($assign_id)
    {
        $sql = "SELECT assign_id, class.class_name, class.year, employee.emp_name FROM $this->table " .
            "INNER JOIN class ON class_employee.class_id = class.class_id " .
            "INNER JOIN employee ON class_employee.emp_id=employee.emp_id " .
            "WHERE assign_id = $assign_id";
        $stmt = $this->conn->query($sql) or die("failed!");
        $data = $stmt->fetch_assoc();
        return $data;
    }

    public function delete($assign_id)
    {
        $query = "DELETE FROM $this->table WHERE assign_id = $assign_id";
        $stmt = $this->conn->query($query);
        if ($stmt == false) echo "<script>alert('Delete failed')</script>";
        return $stmt == true;
    }

    public function insert($emp_id, $class_id)
    {
        $assign_id = $this->makeAssignId();
        $query = "INSERT INTO $this->table (`assign_id`, `class_id`, `emp_id`) VALUES ($assign_id, $emp_id, $class_id)";
        $stmt = $this->conn->query($query);
        if ($stmt == false) echo "<script>alert('Insert failed')</script>";
        return $stmt == true;
    }

    public function update($assign_id, $emp_id, $class_id)
    {
        $query = "UPDATE $this->table SET  `emp_id`= $emp_id, `class_id`= $class_id WHERE `assign_id` = $assign_id";
        $stmt = $this->conn->query($query);
        return $stmt == true;
    }

    public function makeAssignId()
    {
        return parent::getMaxId($this->assign_id, $this->table) + 1;
    }

}

?>