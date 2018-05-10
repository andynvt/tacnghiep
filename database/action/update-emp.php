<?php
include_once('../model/Employee.php');
include_once("../model/EmployeeLoader.php");
$id = $_POST["empId"];
$empName = $_POST["empName"];
$dob = $_POST["dob"];
$gender = $_POST["gender"];
$doi = $_POST["doi"];
$hometown = $_POST["hometown"];
$address = $_POST["address"];
$current_address = $_POST["current_address"];
$phone = $_POST["phone"];
$id_card = $_POST["id_card"];
if (!empty($id) && !empty($empName) && !empty($dob) && !empty($gender) && !empty($doi) && !empty($hometown) && !empty($address) && !empty($current_address) && !empty($phone) && !empty($id_card)) {
    $employee = new Employee();
    $rs = $employee->update($id, $empName, $dob, $gender, $id_card, $doi, $hometown, $address, $current_address, $phone);

    $emp = new Employee();
    $up = $emp->getOne($id);
    $empLoader = new EmployeeLoader();
    $html = $empLoader->display($up);

    $result = array("success" => $rs, "data" => $empName, "html" => $html);
    echo json_encode($result);
}
