<?php

require_once("../model/Assignment.php");
require_once("../model/AssignmentLoader.php");

$assign_id = $_POST["assign-id"];

if (!empty($assign_id)) {
    $assign = new Assignment();
    $rs = $assign->delete($assign_id);

    $ass = new AssignmentLoader();
    $tbody = $ass->display($_GET["page"]);
    $pagination = $ass->getPagination();

    $result = array("success" => $rs, "content" => $tbody, "pagination" => $pagination);
    echo json_encode($result);
}
