<?php

include_once("Pagination.php");

class Class_per extends Pagination
{
    private $table_name = "class_employee";

    private $table = "student";

   

    function getAll(){
        $data = array();
        $sql = "SELECT class.class_id, class_employee.emp_id, class.class_name, class.year,employee.emp_name,employee.gender FROM class LEFT JOIN class_employee ON class_employee.class_id = class.class_id LEFT JOIN employee ON class_employee.emp_id = employee.emp_id GROUP BY class.class_id";
        $q = $this->conn->query($sql) or die("failed!");
        while ($r = $q->fetch_assoc()) {
            array_push($data, $r);
        }
        return $data;
    }
    public function pagination($limit = 10, $current_page = 1)
    {
        $sql = "SELECT class.class_id, class_employee.emp_id, class.class_name, class.year,employee.emp_name,employee.gender FROM class LEFT JOIN class_employee ON class_employee.class_id = class.class_id LEFT JOIN employee ON class_employee.emp_id = employee.emp_id GROUP BY class.class_id";
        return parent::makePagination($sql, $limit, $current_page);
    }

    function getClass(){
        $data = array();
        $sql = "SELECT * FROM class GROUP BY class_id";
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

    public function insert($idclass, $checkBox){
        $query = "INSERT INTO class_student(class_id, student_id) VALUES ('$idclass','$checkBox')";
        $stmt = $this->conn->query($query);
        if ($stmt == false) return false;
        else return true;
    }    

    public function delete($idclass_del, $checkBox_del){
        $query = "DELETE FROM class_student WHERE class_student.student_id = '$checkBox_del' and class_student.class_id = '$idclass_del' ";
        $stmt = $this->conn->query($query);
        if ($stmt == false) return false;
        else return true;
    }

   
    public function delete_class($idclass_delete){
        $query0 = "DELETE FROM class_employee WHERE class_employee.class_id = '$idclass_delete'";
        $query1 = "DELETE FROM class_student WHERE class_student.class_id = '$idclass_delete'";
        $query2 = "DELETE FROM class WHERE class.class_id = '$idclass_delete'";
        

        $que0 = $this->conn->query($query0);
        $que1 = $this->conn->query($query1);
        $que2 = $this->conn->query($query2);
        if ($que0 == false && $que1 == false && $que2 == false ) return false;
        else return true;
    }
        
}

?>
