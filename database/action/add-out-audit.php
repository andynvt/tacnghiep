<?php
require_once("../model/OutAudit.php");
require_once("../model/OutAuditLoader.php");

$oa_desc = $_POST["outaudit-desc"];
$money = $_POST["outaudit-money"];
$date = $_POST["outaudit-date"];
$emp_id = $_POST["outaudit-confirm"];

if (!empty($oa_desc) && !empty($money) && !empty($date) && !empty($emp_id)) {
    $outAudit = new OutAudit();
    $rs = $outAudit->insert($oa_desc, $money, $date, $emp_id);

    $outAuditLoader = new OutAuditLoader();
    $tbody = $outAuditLoader->display($_GET["page"]);
    $pagination = $outAuditLoader->getPagination();

    $result = array("success" => $rs, "content" => $tbody);
    echo json_encode($result);
}

