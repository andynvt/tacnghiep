<?php
include_once("Database.php");

class DepartmentEmployee extends Database
{
    private $table = "department_employee";
    private $dep_emp_id = "dep_emp_id";

    public function findDepEmpByEJ($emp_id, $job_id){
        $data = array();
        $query ="SELECT dep_emp_id, dep_id FROM $this->table WHERE (emp_id = $emp_id AND job_id = $job_id)";
        $stmt = $this->conn->query($query) or die("failed!!!!!");
        while ($r = $stmt->fetch_assoc()) {
            array_push($data, $r);
        }
        return $data;
    }

    public function update_de($dep_emp_id, $dep_id, $job_id){
        $query = "UPDATE $this->table SET `job_id` = $job_id, `dep_id` = $dep_id WHERE dep_emp_id = $dep_emp_id";
        $stmt = $this->conn->query($query);
        if ($stmt == false) return false;
        else return true;
    }

    public function insert_de($dep_id, $emp_id, $job_id){
        $dep_emp_id = $this->makeDeEmpId();
        $query = "INSERT INTO $this->table VALUES ($dep_emp_id, $dep_id, $emp_id, $job_id)";
        $stmt = $this->conn->query($query);
        if ($stmt == false) return false;
        else return true;
    }

    public function countEmpByDepId($dep_id){
        $query = "SELECT COUNT(emp_id) FROM $this->table WHERE dep_id = $dep_id";
        $stmt = $this->conn->query($query) or die("failed!!!!!");
        while ($r = $stmt->fetch_assoc()) {
            $data = $r["COUNT(emp_id)"];
        }
        return $data;
    }
    public function makeDeEmpId(){
        return parent::getMaxId($this->dep_emp_id, $this->table) + 1;
    }

}

?>
