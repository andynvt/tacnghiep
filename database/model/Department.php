<?php
include_once("Database.php");

class Department extends Database
{
    private $table = "department";

    public function getAll(){
        $data = array();
        $query = "SELECT * FROM $this->table";
        $stmt = $this->conn->query($query) or die("failed!!!!!!");
        while ($r = $stmt->fetch_assoc()) {
            array_push($data, $r);
        }
        return $data;
    }
    public function getDepByEmp($emp_id){
        $query = "SELECT $this->table.* FROM $this->table WHERE $this->table.dep_id in " .
            "(SELECT department_employee.dep_id FROM department_employee WHERE department_employee.emp_id = $emp_id)";
        $stmt = $this->conn->query($query) or die("failed!");
        $data = $stmt->fetch_assoc();
        return $data;
    }
}

?>
