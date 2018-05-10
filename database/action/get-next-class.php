<?php
include_once("../model/StudentLoader.php");
include_once("../model/Student.php");
//$st = $_POST["student-id"];
$student = new Student();
$stden = $student->getOne(1);
$dob = $stden["dob"];
$std = new StudentLoader();
$next = $std->getNextClass($dob);
$result = array("success" => true, "next-class" => $next);
echo json_encode($result);
