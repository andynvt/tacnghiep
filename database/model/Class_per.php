<?php

include_once("Database.php");

class Class_per extends Database
{
    private $table_name = "class_employee";

    function getAll()
    {
        $data = array();
        $sql = "SELECT assign_id, class.class_name,class.year,employee.emp_name,employee.gender FROM $this->table_name INNER JOIN class ON class_employee.class_id = class.class_id INNER JOIN employee ON class_employee.emp_id = employee.emp_id";
        $q = $this->conn->query($sql) or die("failed!");
        while ($r = $q->fetch_assoc()) {
            array_push($data, $r);
        }
        return $data;
    }

    function get()
    {
        $data = array();
        $sql = "SELECT assign_id, class.class_name,class.year,employee.emp_name,employee.gender FROM $this->table_name INNER JOIN class ON class_employee.class_id = class.class_id INNER JOIN employee ON class_employee.emp_id = employee.emp_id";
        $q = $this->conn->query($sql) or die("failed!");
        while ($r = $q->fetch_assoc()) {
            array_push($data, $r);
        }
        return $data;
    }
}

?>
