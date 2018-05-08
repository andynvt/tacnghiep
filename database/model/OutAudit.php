<?php
include_once("Pagination.php");

class OutAudit extends Pagination
{
    private $table = "out_audit";

    public function loadAll()
    {
        $data = array();
        $sql = "SELECT * FROM " . $this->table . " ORDER BY oa_id";
        $q = $this->conn->query($sql) or die("failed!");
        while ($row = $q->fetch_assoc()) {
            array_push($data, $row);
        }
        return $data;
    }

    public function insert($oa_desc, $money, $date, $emp_id)
    {
        $query = "INSERT INTO $this->table (`oa_id`, `oa_desc`, `money`, `date`, `emp_id`) VALUES (NULL, '$oa_desc', '$money', '$date', $emp_id)";
        $stmt = $this->conn->query($query);
        return $stmt == true;
    }

    public function update($oa_id, $oa_desc, $money, $date, $emp_id)
    {
        $query = "UPDATE $this->table SET `oa_desc` = '$oa_desc', `money` = '$money', `date` = '$date', `emp_id` = $emp_id WHERE `oa_id` = '$oa_id'";
        $stmt = $this->conn->query($query);
        return $stmt == true;
    }

    public function delete($oa_id)
    {
        $query = "DELETE FROM $this->table WHERE oa_id = '$oa_id'";
        $stmt = $this->conn->query($query);
        return $stmt == true;
    }

    public function pagination($limit = 10, $current_page = 1)
    {
        $sql = "SELECT * FROM $this->table";
        return parent::makePagination($sql, $limit, $current_page);
    }
}