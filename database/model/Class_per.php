<?php

include_once("Database.php");

class Class_per extends Database
{
    private $table_name = "class_employee";

    function getAll()
    {
        $data = array();
        $sql = "SELECT assign_id,class_employee.class_id,class_employee.emp_id,class.class_name,class.year,employee.emp_name,employee.gender FROM $this->table_name INNER JOIN class ON class_employee.class_id = class.class_id INNER JOIN employee ON class_employee.emp_id = employee.emp_id GROUP BY class_employee.class_id";
        $q = $this->conn->query($sql) or die("failed!");
        while ($r = $q->fetch_assoc()) {
            array_push($data, $r);
        }
        return $data;
    }

    function getEMP_Name()
    {
        $data = array();
        $sql = "SELECT employee.emp_name,class_employee.class_id FROM $this->table_name INNER JOIN class ON class_employee.class_id = class.class_id INNER JOIN employee ON class_employee.emp_id = employee.emp_id ";
        $q = $this->conn->query($sql) or die("failed!");
        while ($r = $q->fetch_assoc()) {
            array_push($data, $r);
        }
        return $data;
    }
// COUNT(student.student_id),
    function countStudent_Name()
    {
        // WHERE class_employee.class_id = 1 and employee.emp_name = 'Admin'
        $data = array();
        $sql = "SELECT COUNT(student.student_id) FROM $this->table_name INNER JOIN class ON class_employee.class_id = class.class_id INNER JOIN employee ON class_employee.emp_id = employee.emp_id INNER JOIN class_student ON class_employee.class_id = class_student.class_id INNER JOIN student ON class_student.student_id = class_student.student_id";
        $q = $this->conn->query($sql) or die("failed!");
        while ($r = $q->fetch_assoc()) {
            array_push($data, $r);
        }
        return $data;
    }

    function getStudent_Name()
    {
        // WHERE class_employee.class_id = 1 and employee.emp_name = 'Admin'
        $data = array();
        $sql = "SELECT  employee.emp_name,class_employee.class_id,class_employee.emp_id,student.student_id,student.student_name,student.dob,student.gender,student.father_name,student.father_phone,student.current_address FROM $this->table_name INNER JOIN class ON class_employee.class_id = class.class_id INNER JOIN employee ON class_employee.emp_id = employee.emp_id INNER JOIN class_student ON class_employee.class_id = class_student.class_id INNER JOIN student ON class_student.student_id = class_student.student_id";
        $q = $this->conn->query($sql) or die("failed!");
        while ($r = $q->fetch_assoc()) {
            array_push($data, $r);
        }
        return $data;
    }
}

?>
