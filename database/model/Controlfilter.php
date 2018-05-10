<?php
include_once("Database.php");


class Controlfilter extends Database {
	private $student = "student";
	private $inaudit = "in_audit";
	private $outaudit = "out_audit";

	public function filterStudent($emp, $input){
        $data = array();
        $sql = "SELECT $this->student.*, DATEDIFF(CURDATE(),dob) AS grade FROM student where student_id in (SELECT student_id FROM class_student WHERE class_id in (SELECT class_id FROM class WHERE class_id in (SELECT class_id FROM class_employee WHERE emp_id = $emp))) AND student_name LIKE '%$input%'";
        $q = $this->conn->query($sql) or die("failed!");
        while ($r = $q->fetch_assoc()) {
            array_push($data, $r);
        }
        return $data;
    }

	public function filterInAudit($input){
        $data = array();
        $sql = "SELECT * FROM " . $this->inaudit . " WHERE (ia_desc LIKE '%$input%' OR payer LIKE '%$input%') ORDER BY ia_id";
        $q = $this->conn->query($sql) or die("failed!");
        while ($row = $q->fetch_assoc()) {
            array_push($data, $row);
        }
        return $data;
    }

    public function filterOutAudit($input){
        $data = array();
        $sql = "SELECT * FROM " . $this->outaudit . " WHERE oa_desc LIKE '%$input%' ORDER BY oa_id";  
        $q = $this->conn->query($sql) or die("failed!");
        while ($row = $q->fetch_assoc()) {
            array_push($data, $row);
        }
        return $data;
    }
}
?>

