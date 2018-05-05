<?php
class Employee{
    private $conn;
    private $table_name = "employee";
    
    private $id;
    private $name;
    private $dob;
    private $gender;  
    private $card;
    private $doi;
    private $hometown;
    private $address;
    private $current_address;
    private $telephone;
    
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
