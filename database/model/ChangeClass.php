<?php
include_once("Database.php");
include_once("Class_per.php");

class ChangeClass extends Database
{

    public function getAll($emp_id)
    {
        $data = array();
        $sql = "SELECT class_change_log.*, student.student_name, employee.emp_name FROM class_change_log " .
            "INNER JOIN student ON student.student_id = class_change_log.student_id " .
            "INNER JOIN employee ON employee.emp_id = class_change_log.emp_id " .
            "WHERE class_change_log.emp_id= $emp_id";
        $q = $this->conn->query($sql) or die("failed!");
        while ($r = $q->fetch_assoc()) {
            array_push($data, $r);
        }
        return $data;

    }

    public function insert($emp_id, $student_id, $old_class_id, $new_class_id)
    {
        $sql = "INSERT INTO class_change_log VALUES (null,$student_id,$new_class_id, $old_class_id,$emp_id,CURRENT_TIMESTAMP)";
        $stmt = $this->conn->query($sql);
        return $stmt == true;
    }

    public function displayAll($array)
    {
        $i = 0;
        $class = new Class_per();
        $html = '';
        foreach ($array as $value) {
            $old_class = $class->getFullName($value["old_class_id"]);
            $new_class = $class->getFullName($value["new_class_id"]);
            $date = $value["change_date"];
            $html .= '<tr>';
            $html .= '<td>' . ++$i . '</td>';
            $html .= '<td>' . $value["student_name"] . '</td>';
            $html .= '<td>' . $old_class . '</td>';
            $html .= '<td>' . $new_class . '</td>';
            $html .= '<td>' . $value["student_name"] . '</td>';
            $html .= '<td>' . $date . '</td>';
            $html .= '<td class="td-actions text-center">';
            $html .= '<button type="button" rel="tooltip" title="Xem chi tiết" class="btn btn-info btn-simple "  data-toggle="modal" data-target="#detailModal">' .
                '<i class="material-icons">remove_red_eye</i>' .
                '</button> ';
            $html .= '</td>';
            $html .= '</tr>';
        }
        return $html;
    }
}
