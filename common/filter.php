<?php
include_once("../database/model/Controlfilter.php");

// Audit
include_once("../database/model/InAuditLoader.php");


	session_start();
	if($_POST['request']){
		$perm = $_POST['perm'];
		$menu = $_POST['menu'];
		$page = $_POST['page'];
		$val = $_POST['request'];
		echo $page;
		
		switch ($perm) {
			case 3:
				$action = new InAuditLoader();
				FilterAudit($page, $menu,$val);
				break;
			// case 4:
			// 	FilterTeacher($menu,$val);
			// 	break;

			default: break;
		}
	}

	// function FilterTeacher($menu,$val){
	// 	switch ($menu) {
	// 		case 1:
	// 			$html = "";
	// 		 	$class_name = $_SESSION['class'];
 //    			$idgv = $class_name['emp_id'];
	// 			$student = new Controlfilter();
 //    			$filterStudent = $student->filterStudent($idgv, $val);
 //    			$html .= '<thead class=" text-primary">';
 //                $html .= '<th>Mã học sinh</th>';
 //                $html .= '<th>Tên học sinh</th>';
 //                $html .= '<th>Ngày sinh</th>';
 //                $html .= '<th>Giới tính</th>';
 //                $html .= '<th>Địa chỉ thường trú</th>';
 //                $html .= '<th class="text-center">Chuyển lớp</th>';
 //                $html .= '</thead>';
 //                $html .= '<tbody>';
 //                foreach ($filterStudent as $st) {
	//                 $html .= '<tr class="class-style" data-toggle="modal" data-target="#stu_'.$st["student_id"].'" style="cursor: pointer">';
	//                 $html .= '<td>'.$st["student_id"].'</td>';
	//                 $html .= '<td>'.$st["student_name"].'</td>';
	//                 $html .= '<td>'.$st["dob"].'</td>';
	//                 $html .= '<td>'.$st["gender"].'</td>';
	//                 $html .= '<td>'.$st["current_address"].'</td>';
	//                 $html .= '<td class="td-actions text-center">';
	//                 $html .= '<button type="submit" rel="tooltip" class="btn btn-success btn-simple" value="chuyển">';
	//             	$html .= '<i class="material-icons">check</i>';
	//                 $html .= '</button>';
	//                 $html .= '</td>';
	//                 $html .= '</tr>';
 //            	}
 //            	$html .= '</tbody>';
	// 			echo $html;
	// 			break;
			
	// 		default: break;
	// 	}
	// }

	function FilterAudit($page, $menu, $val){
		switch ($menu) {
			case 1:
				$html = "";
				$inaudit = new Controlfilter();
    			$filterInAudit = $inaudit->filterInAudit($val);

				$html .= '<thead class="text-primary">';
                $html .= '<th>Số thứ tự</th>';
                $html .= '<th>Mô tả</th>';
                $html .= '<th>Số tiền thu (VND)</th>';
                $html .= '<th>Ngày thu</th>';
                $html .= '<th>Người đóng tiền</th>';
                $html .= '<th>Người xác nhận</th>';
                $html .= '<th class="text-center">Thao tác</th>';
                $html .= '</thead>';
                $html .= '<tbody>';

                $html .= '<tbody id="table-body">'.$action->display($page).'</tbody>';

                // $i = 0;
	               //  foreach ($filterInAudit as $value) {
	               //      $html .= '<tr>';
	               //      $html .= '<td>' . ++$i . '</td>';
	                    // $html .= '<td>' .$value["ia_desc"]. '</td>';
	               //      $html .= '<td>' .$value["money"]. '</td>';
	               //      $html .= '<td>' .$value["date"]. '</td>';
	               //      $html .= '<td class="text-primary">' .$value["payer"]. '</td>';
	               //      $html .= '<td class="text-primary">' .$emp->loadNameByID($value["emp_id"]). '</td>';
	               //      $html .= '<td class="td-actions text-center">';
                //         $html .= '<button type="button" rel="tooltip" class="btn btn-info" data-toggle="modal" data-target="#detailInAuditModal">';
                //         $html .= '<i class="material-icons">remove_red_eye</i>';
                //         $html .= '</button>';
                //         $html .= '<button type="button" value="' .$value["ia_id"]. '" rel="tooltip" class="btn btn-success" data-toggle="modal" data-target="#editInAuditModal">';
                //         $html .= '<i class="material-icons">edit</i>';
                //         $html .= '</button>';
                //         $html .= '<button type="button" value="' .$value["ia_id"]. '" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target="#deleteInAuditModal">';
                //         $html .= '<i class="material-icons">close</i>';
                //         $html .= '</button>';
	               //      $html .= '</td>';
	               //      $html .= '</tr>';
	               //  }
                echo $html;
				break;

			// case 2:
			// 	$html = "";
			// 	$outAudit = new OutAudit();
			// 	$emp = new Employee();
			// 	$filterOutAudit = $outAudit->filterOutAudit($val);
			// 	$emp_name_arr = $emp->getAll();

			// 	$html .= '<thead class=" text-primary">';
   //              $html .= '<th>Số thứ tự</th>';
   //              $html .= '<th>Mô tả</th>';
   //              $html .= '<th>Số tiền chi (VND)</th>';
   //              $html .= '<th>Ngày chi</th>';
   //              $html .= '<th>Người xác nhận</th>';
   //              $html .= '<th class="text-center">Thao tác</th>';
   //              $html .= '</thead>';
   //              $html .= '<tbody>';
   //              $i = 0;
   //              foreach ($filterOutAudit as $value) {
   //                  $html .= "<tr>";
   //                  $html .= "<td>" .++$i. "</td>";
   //                  $html .= "<td>" .$value["oa_desc"]. "</td>";
   //                  $html .= "<td>" .$value["money"]. "</td>";
   //                  $html .= "<td>" .$value["date"]. "</td>";
   //                  $html .= "<td class='text-primary'>" .$emp->loadNameByID($value["emp_id"]). "</td>";
   //                  $html .= '<td class="td-actions text-center">';
   //                  $html .= '<button type="button" rel="tooltip" class="btn btn-info" data-toggle="modal" data-target="#detailOutAuditModal">';
   //                  $html .= '<i class="material-icons">remove_red_eye</i>';
   //                  $html .= '</button>';
   //                  $html .= '<button type="button" value="' .$value["oa_id"]. '" rel="tooltip" class="btn btn-success" data-toggle="modal" data-target="#editOutAuditModal">';
   //                  $html .= '<i class="material-icons">edit</i>';
   //                  $html .= '</button>';
   //                  $html .= '<button type="button" value="' .$value["oa_id"]. '" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target="#deleteOutAuditModal">';
   //                  $html .= '<i class="material-icons">close</i>';
   //                  $html .= '</button>';
   //                  $html .= '</td>';
   //                  $html .= "</tr>";
   //              }
   //              $html .= '</tbody>';
   //              echo $html;
			// 	break;
			default: break;
		}
	}
	
?>