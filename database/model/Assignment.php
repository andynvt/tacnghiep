<?php
include_once("Pagination.php");

class Assignment extends Pagination
{
    private $table = "class_employee";
    private $assign_id = "assign_id";

    public function getAll()
    {
        $data = array();
        $sql = "SELECT assign_id, class.class_name, grade.grade_name, class.year, employee.emp_name FROM $this->table " .
            "INNER JOIN class ON class_employee.class_id = class.class_id " .
            "INNER JOIN employee ON class_employee.emp_id = employee.emp_id " .
            "INNER JOIN grade ON class.grade_id = grade.grade_id";
        $q = $this->conn->query($sql) or die("failed!");
        while ($r = $q->fetch_assoc()) {
            array_push($data, $r);
        }
        return $data;
    }

    public function pagination($limit = 10, $current_page = 1)
    {
        $sql = "SELECT assign_id, class.class_name, grade.grade_name, class.year, employee.emp_name FROM $this->table " .
            "INNER JOIN class ON class_employee.class_id = class.class_id " .
            "INNER JOIN employee ON class_employee.emp_id = employee.emp_id " .
            "INNER JOIN grade ON class.grade_id = grade.grade_id";
        return parent::makePagination($sql, $limit, $current_page);
    }

    public function getOne($assign_id)
    {
        $sql = "SELECT assign_id, class.class_name, class.year, employee.emp_name FROM $this->table " .
            "INNER JOIN class ON class_employee.class_id = class.class_id " .
            "INNER JOIN employee ON class_employee.emp_id=employee.emp_id " .
            "WHERE assign_id = $assign_id";
        $stmt = $this->conn->query($sql) or die("failed!");
        $data = $stmt->fetch_assoc();
        return $data;
    }

    public function checkDuplicate($emp_id, $class_id)
    {
        $sql = "SELECT count(*)  FROM $this->table  WHERE emp_id = $emp_id AND class_id = $class_id";
        $stmt = $this->conn->query($sql) or die("failed!");
        $data = $stmt->fetch_assoc();
        return $data["count(*)"];
    }

    public function delete($assign_id)
    {
        $query = "DELETE FROM $this->table WHERE assign_id = $assign_id";
        $stmt = $this->conn->query($query);
        return $stmt == true;
    }

    public function insert($emp_id, $class_id)
    {
        $count = $this->checkDuplicate($emp_id, $class_id);
        if ($count == 0) {
            $assign_id = $this->makeAssignId();
            $query = "INSERT INTO $this->table (`assign_id`, `class_id`, `emp_id`) VALUES ($assign_id, $class_id, $emp_id)";
            $stmt = $this->conn->query($query);
            return $stmt == true;
        } else {
            return false;
        }
    }

    public function update($assign_id, $emp_id, $class_id)
    {
        $query = "UPDATE $this->table SET  `emp_id`= $emp_id, `class_id`= $class_id WHERE `assign_id` = $assign_id";
        $stmt = $this->conn->query($query);
        return $stmt == true;
    }

    public function makeAssignId()
    {
        return parent::getMaxId($this->assign_id, $this->table) + 1;
    }
}
