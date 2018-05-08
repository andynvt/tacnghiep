<?php
require_once("../model/OutAudit.php");
require_once("../model/OutAuditLoader.php");

$oa_id = $_POST["delete-out-audit"];

if (!empty($oa_id)) {
    $outAudit = new OutAudit();
    $rs =  $outAudit->delete($oa_id);

    $outAuditLoader = new OutAuditLoader();
    $tbody = $outAuditLoader->display($_GET["page"]);
    $pagination = $outAuditLoader->getPagination();

    $result = array("success" => $rs, "content" => $tbody, "pagination" => $pagination);
    echo json_encode($result);
}
