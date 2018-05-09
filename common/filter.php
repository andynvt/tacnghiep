<?php
include_once("../database/model/Student.php");
	session_start();
	if($_POST['request']){
		$perm = $_POST['perm'];
		$menu = $_POST['menu'];
		$val = $_POST['request'];
		// switch ($perm) {
		// 	case 0:
		// 		FilterAdmin($menu,$val);
		// 		break;
			
		// 	default:
		// 		# code...
		// 		break;
		// }
		FilterTeacher($menu,$val);
	}
	function FilterTeacher($menu,$val){
		switch ($menu) {
			case 1:
				$html = "";
			 	$class_name = $_SESSION['class'];
    			$idgv = $class_name['emp_id'];
				$student = new Student();
    			$filterStudent = $student->filterStudent($idgv, $val);
    			$html .= '<thead class=" text-primary">';
                $html .= '<th>Mã học sinh</th>';
                $html .= '<th>Tên học sinh</th>';
                $html .= '<th>Ngày sinh</th>';
                $html .= '<th>Giới tính</th>';
                $html .= '<th>Địa chỉ thường trú</th>';
                $html .= '<th class="text-center">Chuyển lớp</th>';
                $html .= '</thead>';
                $html .= '<tbody>';
                foreach ($filterStudent as $st) {
	                $html .= '<tr class="class-style" data-toggle="modal" data-target="#stu_'.$st["student_id"].'" style="cursor: pointer">';
	                $html .= '<td>'.$st["student_id"].'</td>';
	                $html .= '<td>'.$st["student_name"].'</td>';
	                $html .= '<td>'.$st["dob"].'</td>';
	                $html .= '<td>'.$st["gender"].'</td>';
	                $html .= '<td>'.$st["current_address"].'</td>';
	                $html .= '<td class="td-actions text-center">';
	                $html .= '<button type="submit" rel="tooltip" class="btn btn-success btn-simple" value="chuyển">';
	            	$html .= '<i class="material-icons">check</i>';
	                $html .= '</button>';
	                $html .= '</td>';
	                $html .= '</tr>';
	                $html .= '</tbody>';
            	}
				echo $html;
				break;
			
			default: break;
		}
	}
?>