<?php
include_once("Database.php");

class Student extends Database {
    private $table = "student";
    private $student_id = "student_id";

    public function getAll(){
        $data = array();
        $sql = "SELECT $this->table.*, class.class_name FROM $this->table LEFT JOIN class_student on class_student.student_id = student.student_id LEFT JOIN class on class.class_id = class_student.class_id";
        $q = $this->conn->query($sql) or die("failed!");
        while ($row = $q->fetch_assoc()) {
            array_push($data, $row);
        }
        return $data;
    }

    function getStudent($emp){
        $data = array();
        $sql = "SELECT $this->table.*, DATEDIFF(CURDATE(),dob) AS grade FROM student where student_id in (SELECT student_id FROM class_student WHERE class_id in (SELECT class_id FROM class WHERE class_id in (SELECT class_id FROM class_employee WHERE emp_id = $emp)))";
        $q = $this->conn->query($sql) or die("failed!");
        while ($r = $q->fetch_assoc()) {
            array_push($data, $r);
        }
        return $data;
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

    public function makeStudentId(){
        return parent::getMaxId($this->student_id, $this->table) + 1;
    }
}
?>
