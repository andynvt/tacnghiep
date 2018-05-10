<?php
include_once("Pagination.php");


class Department extends Pagination
{
    private $table = "department";
    private $dep_id = "dep_id";
    private $pwd = "user";
    private $emp_id;
    private $per_name;

    public function getAll(){
        $data = array();
        $query = "SELECT * FROM $this->table";
        $stmt = $this->conn->query($query) or die("failed!!!!!!");
        while ($r = $stmt->fetch_assoc()) {
            array_push($data, $r);
        }
        return $data;
    }

    public function pagination($limit = 10, $current_page = 1)
    {
        $sql = "SELECT * FROM $this->table";
        return parent::makePagination($sql, $limit, $current_page);
    }
    public function getDepByEmp($emp_id){
        $query = "SELECT $this->table.* FROM $this->table WHERE $this->table.dep_id in " .
            "(SELECT department_employee.dep_id FROM department_employee WHERE department_employee.emp_id = $emp_id)";
        $stmt = $this->conn->query($query) or die("failed!");
        $data = $stmt->fetch_assoc();
        return $data;
    }

    public function getOne($dep_id)
    {

        $sql = "SELECT * FROM $this->table WHERE dep_id = $dep_id";
        $q = $this->conn->query($sql) or die("failed!");
        $data[] = $q->fetch_assoc();
        return $data;
    }

    public function getListMember($id)
    {
        $data = array();
        $sql = "SELECT employee.emp_id, employee.emp_name, employee.gender, employee.phone FROM department " .
            " INNER JOIN department_employee ON department_employee.dep_id = department.dep_id " .
            "INNER JOIN employee ON employee.emp_id = department_employee.emp_id " .
            "WHERE department.dep_id =$id";
        $q = $this->conn->query($sql) or die("failed!");
        while ($r = $q->fetch_assoc()) {
            array_push($data, $r);
        }
        return $data;
    }

    public function getDepartmentDetail()
    {
        $data = array();
        $sql = "SELECT department.dep_id, department.dep_name 
                FROM department
                LEFT JOIN account ON employee.emp_id = account.emp_id
                LEFT JOIN permission ON account.per_id = permission.per_id";
        $q = $this->conn->query($sql) or die ("failed!");
        while ($r = $q->fetch_assoc()) {
            if ($r['username'] === NULL) {
                array_push($data, $r['emp_id'], $r['emp_name'], "Chưa có", "Chưa có");
            } else {
                array_push($data, $r['emp_id'], $r['emp_name'], $r['username'], $r['per_name']);
            }

        }
        return $data;
    }
    public function delete($id){
        $query = "DELETE FROM $this->table WHERE dep_id = $id";
        $query2 = "DELETE FROM department_employee WHERE dep_id = $id";
        $stmt = $this->conn->query($query);
        $stmt2 = $this->conn->query($query2);

        if ($stmt == false || $stmt2 == false) return false;
        else return true;
    }

    public function insert($name){
        $dep_id = $this->makeDepId();
        $query = "INSERT INTO $this->table VALUES ($dep_id, '$name')";
        $stmt = $this->conn->query($query);
        if ($stmt == false) return false;
        else return true;
    }

    public function update($username_old, $username_new, $password, $per_id)
    {
        $query = "UPDATE $this->table SET  `username`= $username_new, `password`= $password, `per_id` = $per_id WHERE `username` = $username_old";
        $stmt = $this->conn->query($query);
        return $stmt == true;
    }

    public function getEmpList()
    {
        $data = array();
        $sql = "SELECT `emp_id`, `emp_name` FROM `employee` WHERE emp_id NOT IN (SELECT `emp_id` FROM `account`)";
        $q = $this->conn->query($sql) or die("failed");
        $data = $q->fetch_assoc();
        while ($r = $q->fetch_assoc()) {
            array_push($data, $r);

        }
        return $data;
    }

    public function getEmp($emp_id)
    {

        $sql = "SELECT * FROM `employee` WHERE emp_id = $emp_id";
        $q = $this->conn->query($sql) or die("failed!");
        $data[] = $q->fetch_assoc();
        return $data;
    }
    public function getDName($dep_id)
    {

        $sql = "SELECT department.dep_name FROM `department` WHERE dep_id = $dep_id";
        $q = $this->conn->query($sql) or die("failed!");
        $data[] = $q->fetch_assoc();
        return $data;
    }

    public function makeDepId(){
        return parent::getMaxId($this->dep_id, $this->table) + 1;
    }


}

?>
