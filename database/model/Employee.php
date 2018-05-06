<?php
include_once("Database.php");

class Employee extends Database
{
    private $table_name = "employee";

//    private $emp_id;
//    private $emp_name;
//    private $dob;
//    private $gender;
//    private $id_card;
//    private $doi;
//    private $hometown;
//    private $address;
//    private $current_address;
//    private $phone;

    function getAll()
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY emp_name";
        $stmt = $this->conn->query($query) or die("failed!");
        while ($r = $stmt->fetch_assoc()) {
            $data[] = $r;
        }
        return $data;
    }

    function getOne($emp_id)
    {
        $query = "SELECT * FROM  $this->table_name WHERE e_name = $emp_id";
        $stmt = $this->conn->query($query) or die("failed!");
        $data = $stmt->fetch_assoc();
        return $data;
    }

    function insert($emp_name, $dob, $gender, $id_card, $doi, $hometown, $address, $current_address, $phone)
    {
        $query = "INSERT INTO  $this->table_name VALUES($emp_name, $dob,$gender, $id_card, $doi, $hometown,$address,$current_address, $phone)";
        return $this->conn->query($query) == true;
    }
}

?>
