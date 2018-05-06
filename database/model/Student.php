<?php
include_once("Database.php");

class Student extends Database {
    private $table = "student";
    private $student_id = "student_id";

    public function getAll(){
        $data = array();
        $sql = "SELECT * FROM $this->table LEFT JOIN class_student on class_student.student_id = student.student_id LEFT JOIN class on class.class_id = class_student.class_id";
        $q = $this->conn->query($sql) or die("failed!");
        while ($row = $q->fetch_assoc()) {
            array_push($data, $row);
        }
        return $data;
    }

    public function insert($student_name, $dob, $gender, $hometown, $address, $current_address, $father_name, $father_job, $father_phone, $mother_name, $mother_job, $mother_phone){
        $student_id = $this->makeStudentId();
        $query = "INSERT INTO $this->table VALUES ($student_id, '$student_name', '$dob','$gender', '$hometown', '$address', '$current_address', '$father_name', '$father_job', '$father_phone', '$mother_name', '$mother_job', '$mother_phone')";
        $stmt = $this->conn->query($query);
        if ($stmt == false){
            echo "<script>alert('Insert failed')</script>";
            return false;
        }
        else
            return true;
    }

    public function makeStudentId()
    {
        return parent::getMaxId($this->student_id, $this->table) + 1;
    }
}
?>
