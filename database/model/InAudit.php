<?php
include_once("Pagination.php");

class InAudit extends Pagination
{
    private $table = "in_audit";

    public function loadAll()
    {
        $data = array();
        $sql = "SELECT * FROM " . $this->table . " ORDER BY ia_id";
        $q = $this->conn->query($sql) or die("failed!");
        while ($row = $q->fetch_assoc()) {
            array_push($data, $row);
        }
        return $data;
    }

    public function insert($ia_desc, $money, $date, $payer, $emp_id)
    {
        $query = "INSERT INTO $this->table (`ia_id`, `ia_desc`, `money`, `date`, `payer`, `emp_id`) VALUES (NULL, '$ia_desc', '$money', '$date', '$payer', $emp_id)";
        $stmt = $this->conn->query($query);
        return $stmt == true;
    }

    public function update($ia_id, $ia_desc, $money, $date, $payer, $emp_id)
    {
        $query = "UPDATE $this->table SET `ia_desc` = '$ia_desc', `money` = '$money', `date` = '$date', `payer` = '$payer', `emp_id` = $emp_id WHERE `ia_id` = '$ia_id'";
        $stmt = $this->conn->query($query);
        return $stmt == true;
    }

    public function delete($ia_id)
    {
        $query = "DELETE FROM $this->table WHERE ia_id = '$ia_id'";
        $stmt = $this->conn->query($query);
        return $stmt == true;
    }

    public function pagination($limit = 10, $current_page = 1)
    {
        $sql = "SELECT * FROM $this->table";
        return parent::makePagination($sql, $limit, $current_page);
    }

}

