<?php
include_once("Database.php");

class Teacher extends Database {
	public function getClass($emp){
		$sql = "SELECT class_name FROM class WHERE class_id in (select class_id FROM class_employee WHERE emp_id in (select emp_id FROM employee WHERE emp_id = $emp))";
		$q = $this->conn->query($sql) or die("failed!");
		while ($row = $q->fetch_assoc()) {
            $classname = $row["class_name"];
        }
        return $classname;
	}
}
?>