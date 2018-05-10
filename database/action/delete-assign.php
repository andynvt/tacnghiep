<?php

require_once("../model/Assignment.php");
require_once("../model/AssignmentLoader.php");

$assign_id = $_POST["assign-id"];

if (!empty($assign_id)) {
    $assign = new Assignment();
    $rs = $assign->delete($assign_id);

    $ass = new AssignmentLoader();
    $tbody = $ass->display();

    $result = array("success" => $rs, "content" => $tbody);
    echo json_encode($result);
}
