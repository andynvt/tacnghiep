<?php
require_once("../model/Student.php");
require_once("../model/StudentLoader.php");
require_once("../model/Teacher.php");
require_once("../model/ChangeClass.php");

$class_id = $_POST["class-id"];
$student_id = $_POST["student-id"];
$emp_id = $_POST["emp-id"];
$old_class_id = $_POST["class-old-id"];

if (!empty($student_id) && !empty($class_id)) {
    $student = new Student();
    $changeClass = new ChangeClass();
    $rs = $student->chuyenLop($student_id, $class_id);
    $rs2 = $changeClass->insert($emp_id, $student_id, $old_class_id, $class_id);

    $student = new Student();
    $getStudent = $student->getStudent($emp_id);
    $teacher = new Teacher();
    $class = $teacher->getClass($emp_id)[0];

    $ass = new StudentLoader();
    $tbody = $ass->displayAll($getStudent, $class);

    $result = array("success" => $rs, "log" => $rs2, "content" => $tbody);
    echo json_encode($result);
}
