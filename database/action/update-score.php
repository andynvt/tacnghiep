<?php
require_once("../model/Student.php");

$class_id = $_POST["class-id"];
$date = $_POST['time-score'];
$split = explode("-", $date);

$score = true;
$long = $split[1] . "-" . $split[0] . "-01";
$student = new Student();
foreach ($_POST["id"] as $value) {
    $split = explode(" - ", $value);
    $rs = $student->addScore($split[0], $long, $split[1], $class_id);
}
$result = array("success" => $rs);
echo json_encode($result);