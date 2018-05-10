<?php
require_once("../model/InAudit.php");
require_once("../model/InAuditLoader.php");

$ia_id = $_POST["delete-in-audit"];

if (!empty($ia_id)) {
    $inAudit = new InAudit();
    $rs = $inAudit->delete($ia_id);

    $inAuditLoader = new InAuditLoader();
    $tbody = $inAuditLoader->display($_GET["page"]);
    $pagination = $inAuditLoader->getPagination();

    $result = array("success" => $rs, "content" => $tbody);
    echo json_encode($result);
}
