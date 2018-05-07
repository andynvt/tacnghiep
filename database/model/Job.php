<?php

class Job extends Database
{
    private $table = "job";

    public function getAll(){
        $data = array();
        $query = "SELECT * FROM $this->table";
        $stmt = $this->conn->query($query) or die("failed!");
        while ($r = $stmt->fetch_assoc()) {
            $data[] = $r;
        }
        return $data;
    }

    public function getNameById($job_id){
        $query = 'SELECT job_name FROM $table WHERE job_id=$job_id';
        $stmt = $this->conn->query($query) or die("failed!");
        $data = $stmt->fetch_assoc();
        return $data;
    }

    public function getJobByEmp($emp_id){
        $query = "SELECT $this->table.* FROM $this->table WHERE $this->table.job_id in " .
            "(SELECT department_employee.job_id FROM department_employee WHERE department_employee.emp_id = $emp_id)";
        $stmt = $this->conn->query($query) or die("failed!");
        $data = $stmt->fetch_assoc();
        return $data;
    }
}

?>
