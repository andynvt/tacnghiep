<?php
class Class{
    private $conn;
    private $table_name = "class";
    
    private $id;
    private $name;
    private $year;
    
   public function __construct($db){
        $this->conn = $db;
   }
    
   function loadAll(){
        //select all data
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY c_name";  
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>
