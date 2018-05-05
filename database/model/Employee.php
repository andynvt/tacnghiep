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
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY e_name";  
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    function loadOne($name){
        $query = "SELECT * FROM " . $this->table_name . " WHERE e_name = "+$name;  
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    function insert(){
        $query = "INSERT INTO " . $this->table_name . " VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ?)";  
        
        $stmt->bind_param("sssssssss", $name, $dob, $gender, $card, $doi, $hometown, $address, $current_address, $telephone);
        
        $stmt = $this->conn->prepare($query);

        if($stmt->execute()){
            return  true;
        }
        return false;
    }
}
?>
