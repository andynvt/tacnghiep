<?php

include_once("Database.php");

class Class_per extends Database
{
    private $table_name = "class_employee";

    private $table = "student";

    private $student_id = "student_id";

    function getAll(){
        $data = array();
        $sql = "SELECT assign_id,class_employee.class_id,class_employee.emp_id,class.class_name,class.year,employee.emp_name,employee.gender FROM $this->table_name INNER JOIN class ON class_employee.class_id = class.class_id INNER JOIN employee ON class_employee.emp_id = employee.emp_id GROUP BY class_employee.class_id";
        $q = $this->conn->query($sql) or die("failed!");
        while ($r = $q->fetch_assoc()) {
            array_push($data, $r);
        }
        return $data;
    }

    function getEMP_Name(){
        $data = array();
        $sql = "SELECT employee.emp_name,class_employee.class_id FROM $this->table_name INNER JOIN class ON class_employee.class_id = class.class_id INNER JOIN employee ON class_employee.emp_id = employee.emp_id ";
        $q = $this->conn->query($sql) or die("failed!");
        while ($r = $q->fetch_assoc()) {
            array_push($data, $r);
        }
        return $data;
    }

    function getStudent_Name(){
        // WHERE class_student.class_id = 1
        $data = array();
        $sql = "SELECT * FROM student LEFT JOIN class_student ON class_student.student_id = student.student_id ";
        $q = $this->conn->query($sql) or die("failed!");
        while ($r = $q->fetch_assoc()) {
            array_push($data, $r);
        }
        return $data;
    }

    function getStudent_all(){
        $data = array();
        $sql = "SELECT * FROM $this->table WHERE student_id not in (select student_id from class_student)";
        $q = $this->conn->query($sql) or die("failed!");
        while ($r = $q->fetch_assoc()) {
            array_push($data, $r);
        }
        return $data;
    }

    function getCount_student($class_id){
        $sql = "SELECT COUNT(*) FROM class_student WHERE class_id = '$class_id'";
        $q = $this->conn->query($sql) or die("failed!");
        while ($r = $q->fetch_assoc()) {
            $count = $r["COUNT(*)"];
        }
        return $count;
    }

    public function insert($student_name, $dob, $gender, $hometown, $address, $current_address, $father_name, $father_job, $father_phone, $mother_name, $mother_job, $mother_phone){
        $student_id = $this->makeStudentId();
        $query = "INSERT INTO $this->table VALUES ($student_id, '$student_name', '$dob','$gender', '$hometown', " .
            " '$address', '$current_address', '$father_name', '$father_job', '$father_phone', '$mother_name', " .
            " '$mother_job', '$mother_phone')";
        $stmt = $this->conn->query($query);
        if ($stmt == false) return false;
        else return true;
    }

    public function update($student_id, $student_name, $dob, $gender, $hometown, $address, $current_address, $father_name, $father_job, $father_phone, $mother_name, $mother_job, $mother_phone){
        $query = "UPDATE $this->table SET `student_name`='$student_name', `dob`='$dob', `gender`='$gender', " .
            " `hometown`='$hometown', `address`='$address', `current_address`='$current_address', `father_name`='$father_name', " .
            " `father_job`='$father_job', `father_phone`='$father_phone', `mother_name`='$mother_name', " .
            " `mother_job`='$mother_job', `mother_phone`='$mother_phone' WHERE `student_id` = $student_id";
        $stmt = $this->conn->query($query);
        if ($stmt == false) return false;
        else return true;
    }

    public function delete($student_id){
        $qr = "DELETE FROM class_student WHERE student_id = $student_id";
        $query = "DELETE FROM $this->table WHERE student_id = $student_id";
        $st = $this->conn->query($qr);
        $stmt = $this->conn->query($query);
        if ($stmt == false) return false;
        else return true;
    }
}

?>
