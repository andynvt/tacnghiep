<?php
  class Assignment
  {
    private $conn;
    private $table_name = "class_employee";

    private $year;
    private $class_name;
    private $emp_name;

    public function __construct($db)
    {
         $this->conn = $db;
    }

    function readAll()
    {
      $query = "SELECT class.class_name,class.year,employee.emp_name ".
      "FROM `class_employee`  INNER JOIN class ON class_employee.class_id = class.class_id INNER JOIN employee ON	 class_employee.emp_id=employee.emp_id";
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt;
    }
    function create()
    {

    }
    function deleteOne($assign_id)
    {

    }
    function updateOne($assign_id)
    {

    }
  }
?>
