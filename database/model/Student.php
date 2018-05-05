<?php
class Student{
    private $conn;
    private $table_name = "student";
    
    private $id;
    private $name;
    private $dob;
    private $gender;  
    private $hometown;
    private $address;
    private $current_address;
    private father_name; 
    private father_job;
    private father_phone;
    private mother_name; 
    private mother_job;
    private mother_phone;
    
   public function __construct($db){
        $this->conn = $db;
   }
    
   function loadAll(){
        //select all data
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY e_name";  
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>
