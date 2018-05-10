<?php
require_once("../model/Assignment.php");
require_once("../model/AssignmentLoader.php");

$class_id = $_POST["class-id"];
$emp_id = $_POST["emp-id"];
$assign_id = $_POST["student-id"];

if (!empty($assign_id) && !empty($class_id) && !empty($emp_id)) {
    $assign = new Assignment();
    $rs = $assign->update($assign_id, $emp_id, $class_id);

    $ass = new AssignmentLoader();
    $tbody = $ass->display();

    $result = array("success" => $rs, "content" => $tbody);
    echo json_encode($result);
}
