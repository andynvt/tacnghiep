<?php
include_once("Database.php");

class PreClass extends Database
{
    private $table_name = "class";

//    private $class_id;
//    private $class_name;
//    private $year;

    function getAll()
    {
        $query = "SELECT class_id, class_name, grade_name, year FROM " . $this->table_name . " INNER JOIN grade ON class.grade_id = grade.grade_id";
        $stmt = $this->conn->query($query) or die("failed!");
        while ($r = $stmt->fetch_assoc()) {
            $data[] = $r;
        }
        return $data;
    }

    function getNameById($class_id)
    {
        $query = 'SELECT class_name FROM $table_name WHERE class_id=:class_id';
        $stmt = $this->conn->query($query) or die("failed!");
        $data = $stmt->fetch_assoc();
        return $data;
    }
}

?>
