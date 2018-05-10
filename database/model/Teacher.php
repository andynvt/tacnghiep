<?php
include_once("Database.php");
include_once("Student.php");

class Teacher extends Database
{
    public function getClass($emp)
    {
        $sql = "SELECT * FROM class " .
            "INNER JOIN grade ON class.grade_id = grade.grade_id " .
            "WHERE class_id in (select class_id FROM class_employee " .
            "WHERE emp_id in (select emp_id FROM employee WHERE emp_id = $emp))";
        $q = $this->conn->query($sql) or die("failed!");
        $class = array();
        while ($row = $q->fetch_assoc()) {
            array_push($class, $row);
        }
        return $class;
    }
}
