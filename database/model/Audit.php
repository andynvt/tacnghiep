<?php
include_once("Database.php");

class InAudit extends Database {
    private $table = "in_audit";
    
    public function loadAll(){
        $data = array();
        $sql = "SELECT * FROM " . $this->table . " ORDER BY ia_id";  
        $q = $this->conn->query($sql) or die("failed!");
        while ($row = $q->fetch_assoc()) {
            array_push($data, $row);
        }
        return $data;
    }

    public function insert($ia_desc, $money, $date, $payer, $emp_id) {
        $query = "INSERT INTO $this->table (`ia_id`, `ia_desc`, `money`, `date`, `payer`, `emp_id`) VALUES (NULL, '$ia_desc', '$money', '$date', '$payer', $emp_id)";
        $stmt = $this->conn->query($query);
        if ($stmt == false) {
            echo "<script>alert('Thêm thất bại!')</script>";
        } else echo "<script>alert('Thêm thành công!')</script>";
        return $stmt == true;
    }

    public function update($ia_id, $ia_desc, $money, $date, $payer, $emp_id) {
        $query = "UPDATE $this->table SET `ia_desc` = '$ia_desc', `money` = '$money', `date` = '$date', `payer` = '$payer', `emp_id` = $emp_id WHERE `ia_id` = '$ia_id'";
        $stmt = $this->conn->query($query);
        if ($stmt == false) {
            echo "<script>alert('Sửa thông tin thất bại!')</script>";
        } else echo "<script>alert('Sửa thông tin thành công!')</script>";
        return $stmt == true;
    }
    
    public function delete($ia_id) {
        $query = "DELETE FROM $this->table WHERE ia_id = '$ia_id'";
        $stmt = $this->conn->query($query);
        if ($stmt == false) {
            echo "<script>alert('Xóa thất bại!')</script>";
        } else echo "<script>alert('Xóa thành công!')</script>";
        return $stmt == true;
    }
    
}

class OutAudit extends Database {
    private $table = "out_audit";
    
    public function loadAll(){
        $data = array();
        $sql = "SELECT * FROM " . $this->table . " ORDER BY oa_id";  
        $q = $this->conn->query($sql) or die("failed!");
        while ($row = $q->fetch_assoc()) {
            array_push($data, $row);
        }
        return $data;
    }
    
     public function insert($oa_desc, $money, $date, $emp_id) {
        $query = "INSERT INTO $this->table (`oa_id`, `oa_desc`, `money`, `date`, `emp_id`) VALUES (NULL, '$oa_desc', '$money', '$date', $emp_id)";
        $stmt = $this->conn->query($query);
        if ($stmt == false) {
            echo "<script>alert('Thêm thất bại!')</script>";
        } else echo "<script>alert('Thêm thành công!')</script>";
        return $stmt == true;
    }

    public function update($oa_id, $oa_desc, $money, $date, $emp_id) {
        $query = "UPDATE $this->table SET `oa_desc` = '$oa_desc', `money` = '$money', `date` = '$date', `emp_id` = $emp_id WHERE `oa_id` = '$oa_id'";
        $stmt = $this->conn->query($query);
        if ($stmt == false) {
            echo "<script>alert('Sửa thông tin thất bại!')</script>";
        } else echo "<script>alert('Sửa thông tin thành công!')</script>";
        return $stmt == true;
    }
    
    public function delete($oa_id) {
        $query = "DELETE FROM $this->table WHERE oa_id = '$oa_id'";
        $stmt = $this->conn->query($query);
        if ($stmt == false) {
            echo "<script>alert('Xóa thất bại!')</script>";
        } else echo "<script>alert('Xóa thành công!')</script>";
        return $stmt == true;
    }
}
?>