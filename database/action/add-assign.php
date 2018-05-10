<?php
require_once("../model/Assignment.php");
require_once("../model/AssignmentLoader.php");
$class_id = $_POST["class-id"];
$emp_id = $_POST["emp-id"];
if (!empty($class_id) && !empty($emp_id)) {
    $assign = new Assignment();
    $rs = $assign->insert($emp_id, $class_id);

    $ass = new AssignmentLoader();
    $tbody = $ass->display();

    $result = array("success" => $rs, "content" => $tbody);
    echo json_encode($result);
}
