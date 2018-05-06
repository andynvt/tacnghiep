<?php
include_once("Database.php");

class Permission extends Database
{
    private $table = "permission";
    private $per_id;
    private $per_name;
    private $description;

    public function getAll()
    {
        $data = array();
        $sql = "SELECT * FROM $this->table";
        $q = $this->conn->query($sql) or die("failed!");
        while ($r = $q->fetch_assoc()) {
            array_push($data, $r);
        }
        return $data;
    }

    public function getOne($per_id)
    {
        $sql = "SELECT * FROM $this->table WHERE per_id = $per_id";
        $q = $this->conn->query($sql) or die("failed!");
        $data = $q->fetch_assoc();
        return $data;
    }

    public function delete($per_id)
    {
        $query = "DELETE FROM $this->table WHERE per_id = $per_id";
        $stmt = $this->conn->query($query);
        if ($stmt == false) echo "<script>alert('Delete failed')</script>";
        return $stmt == true;
    }

    public function insert($per_name, $description)
    {
        $per_id = $this->makePerID();
        $query = "INSERT INTO $this->table (`per_id`, `per_name`, `description`) VALUES ($per_id, $per_name, $description)";
        $stmt = $this->conn->query($query);
        if ($stmt == false) echo "<script>alert('Insert failed')</script>";
        return $stmt == true;
    }

    public function update($per_id, $per_name, $description)
    {
        $query = "UPDATE $this->table SET `per_name`= $per_name, `description` = $description WHERE `per_id` = $per_id";
        $stmt = $this->conn->query($query);
        return $stmt == true;
    }

    public function makePerID()
    {
        return parent::getMaxId($this->per_id, $this->table) + 1;
    }


}

?>
