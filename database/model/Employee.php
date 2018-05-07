<?php
include_once("Database.php");

class Employee extends Database
{
    private $table = "employee";
    private $emp_id = "emp_id";

    function getAll(){
        $data = array();
        $query = "SELECT employee.*, class.class_name, job.job_name, job.job_id FROM employee " .
            "LEFT JOIN class_employee ON class_employee.emp_id = employee.emp_id " .
            "LEFT JOIN class ON class.class_id = class_employee.class_id " .
            "LEFT JOIN department_employee ON department_employee.emp_id = employee.emp_id " .
            "LEFT JOIN job ON job.job_id = department_employee.job_id";
        $stmt = $this->conn->query($query) or die("failed!");
        while ($r = $stmt->fetch_assoc()) {
            array_push($data, $r);
        }
        return $data;
    }

    public function insert($emp_name, $dob, $gender, $id_card, $doi, $hometown, $address, $current_address, $phone){
        $emp_id = $this->makeEmpId();
        $query = "INSERT INTO  $this->table VALUES($emp_id, '$emp_name', '$dob', '$gender', '$id_card', '$doi', " .
            " '$hometown', '$address', '$current_address', '$phone')";
        $stmt = $this->conn->query($query);
        if ($stmt == false) return false;
        else return true;
    }

    public function update($emp_id, $emp_name, $dob, $gender, $id_card, $doi, $hometown, $address, $current_address, $phone){
        $query = "UPDATE $this->table SET `emp_name`='$emp_name', `dob`='$dob', `gender`='$gender', " .
            " `id_card`='$id_card', `doi`='$doi', `hometown`='$hometown', `address`='$address', " .
            " `current_address`='$current_address', `phone`='$phone' WHERE `emp_id` = $emp_id";
        $stmt = $this->conn->query($query);
        if ($stmt == false) return false;
        else return true;
    }
    public function delete($emp_id){
        $qr = "DELETE FROM department_employee WHERE emp_id = $emp_id";
        $query = "DELETE FROM $this->table WHERE emp_id = $emp_id";
        $st = $this->conn->query($qr);
        $stmt = $this->conn->query($query);
        if ($stmt == false) return false;
        else return true;
    }

    public function update_jc($id, $job_id, $class_id){
        $update_job = "UPDATE job SET ";
    }

    function getOne($emp_id)
    {
        $query = "SELECT * FROM  $this->table WHERE emp_id = $emp_id";
        $stmt = $this->conn->query($query) or die("failed!");
        $data = $stmt->fetch_assoc();
        return $data;
    }
    
    function loadNameByID($id){
        $name = $this->getOne($id)["emp_name"];
        return $name;
    }


    public function makeEmpId(){
        return parent::getMaxId($this->emp_id, $this->table) + 1;
    }
}

?>
