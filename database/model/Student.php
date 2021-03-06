<?php
include_once("Pagination.php");

class Student extends Pagination
{
    private $table = "student";
    private $student_id = "student_id";

    public function getAll()
    {
        $data = array();
        $sql = "SELECT $this->table.*, class.class_name FROM $this->table LEFT JOIN class_student on class_student.student_id = student.student_id LEFT JOIN class on class.class_id = class_student.class_id";
        $q = $this->conn->query($sql) or die("failed!");
        while ($row = $q->fetch_assoc()) {
            array_push($data, $row);
        }
        return $data;
    }

    function getOne($std_id)
    {
        $query = "SELECT * FROM student WHERE student_id = $std_id";
        $stmt = $this->conn->query($query) or die("failed!");
        $data = $stmt->fetch_assoc();
        return $data;
    }

    public function pagination($limit = 10, $current_page = 1)
    {
        $sql = "SELECT $this->table.*, class.class_name FROM $this->table LEFT JOIN class_student on class_student.student_id = student.student_id LEFT JOIN class on class.class_id = class_student.class_id";
        return parent::makePagination($sql, $limit, $current_page);
    }

    function getStudent($emp_gv)
    {
        $data = array();
        $sql = "SELECT $this->table.*, DATEDIFF(CURDATE(),dob) AS grade FROM student where student_id in (SELECT student_id FROM class_student WHERE class_id in (SELECT class_id FROM class WHERE class_id in (SELECT class_id FROM class_employee WHERE emp_id = $emp_gv)))";
        $q = $this->conn->query($sql) or die("failed!");
        while ($r = $q->fetch_assoc()) {
            array_push($data, $r);
        }
        return $data;
    }

    public function insert($student_name, $dob, $gender, $hometown, $address, $current_address, $father_name, $father_job, $father_phone, $mother_name, $mother_job, $mother_phone)
    {
        $student_id = $this->makeStudentId();
        $query = "INSERT INTO $this->table VALUES ($student_id, '$student_name', '$dob','$gender', '$hometown', " .
            " '$address', '$current_address', '$father_name', '$father_job', '$father_phone', '$mother_name', " .
            " '$mother_job', '$mother_phone')";
        $stmt = $this->conn->query($query);
        if ($stmt == false) return false;
        else return true;
    }

    public function update($student_id, $student_name, $dob, $gender, $hometown, $address, $current_address, $father_name, $father_job, $father_phone, $mother_name, $mother_job, $mother_phone)
    {
        $query = "UPDATE $this->table SET `student_name`='$student_name', `dob`='$dob', `gender`='$gender', " .
            " `hometown`='$hometown', `address`='$address', `current_address`='$current_address', `father_name`='$father_name', " .
            " `father_job`='$father_job', `father_phone`='$father_phone', `mother_name`='$mother_name', " .
            " `mother_job`='$mother_job', `mother_phone`='$mother_phone' WHERE `student_id` = $student_id";
        $stmt = $this->conn->query($query);
        if ($stmt == false) return false;
        else return true;
    }

    public function chuyenLop($student_id, $class_id)
    {
        $query = "UPDATE `class_student` SET `class_id` = $class_id  WHERE `class_student`.`student_id` = $student_id";
        $stmt = $this->conn->query($query);
        if ($stmt == false) return false;
        else return true;
    }

    public function delete($student_id)
    {
        $qr = "DELETE FROM class_student WHERE student_id = $student_id";
        $query = "DELETE FROM $this->table WHERE student_id = $student_id";
        $st = $this->conn->query($qr);
        $stmt = $this->conn->query($query);
        if ($stmt == false) return false;
        else return true;
    }

    public function addScore($student_id, $date, $score, $class_id)
    {
        $sql = "INSERT INTO `score` VALUES (NULL, $student_id, '$date', $score, $class_id)";
        $stmt = $this->conn->query($sql);
        if ($stmt == false) return false;
        else return true;
    }

    public function updateScore($student_id, $date, $score, $class_id)
    {
        $sql = "UPDATE `score` SET score =  $score WHERE student_id = $student_id AND class_id = $class_id";
        $stmt = $this->conn->query($sql);
        if ($stmt == false) return false;
        else return true;
    }

    public function getScore($student_id, $class_id)
    {
        $query = "SELECT * FROM score WHERE student_id = $student_id AND class_id = $class_id";
        $stmt = $this->conn->query($query) or die("failed!");
        $data = $stmt->fetch_assoc();
        return $data["score"];
    }

    public function makeStudentId()
    {
        return parent::getMaxId($this->student_id, $this->table) + 1;
    }
}

//$assign = new Student();
//$rs = $assign->chuyenLop(1, 1);
//echo $rs;