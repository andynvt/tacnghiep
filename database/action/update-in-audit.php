<?php
require_once("../model/InAudit.php");
require_once("../model/InAuditLoader.php");

$ia_id = $_POST["edit-in-audit"];
$ia_desc = $_POST["inaudit-desc"];
$money = $_POST["inaudit-money"];
$date = $_POST["inaudit-date"];
$payer = $_POST["inaudit-payer"];
$emp_id = $_POST["inaudit-confirm"];

if (!empty($ia_id) && !empty($ia_desc) && !empty($money) && !empty($date) && !empty($payer) && !empty($emp_id)) {
    $inAudit = new InAudit();
    $rs = $inAudit->update($ia_id, $ia_desc, $money, $date, $payer, $emp_id);

    $inAuditLoader = new InAuditLoader();
    $tbody = $inAuditLoader->display($_GET["page"]);
    $pagination = $inAuditLoader->getPagination();

    $result = array("success" => $rs, "content" => $tbody);
    echo json_encode($result);
}
