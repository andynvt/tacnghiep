<?php
require_once("../model/Student.php");

$class_id = $_POST["class-id"];
$date = $_POST['time-score'];
$split = explode("-", $date);

$score = true;
$long = $split[1] . "-" . $split[0] . "-01";
$student = new Student();
foreach ($_POST["id"] as $value) {
    $rs = $student->addScore($value, $long, $score, $class_id);
}
$result = array("success" => $rs);
echo json_encode($result);