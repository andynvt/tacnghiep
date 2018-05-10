<?php

include_once("Class_per.php");

/**
 * Created by PhpStorm.
 * User: chuna
 * Date: 10/05/2018
 * Time: 13:27
 */
class StudentLoader
{
    public function displayAll($data, $class)
    {
        $html = "";
        foreach ($data as $st) {
            $html .= '<tr class="class-style"  style="cursor: pointer">';
            $html .= '<td>' . $st["student_id"] . '</td>';
            $html .= '<td>' . $st["student_name"] . '</td>';
            $html .= '<td>' . $st["dob"] . '</td>';
            $html .= '<td>' . $st["gender"] . '</td>';
            $html .= '<td>' . $st["current_address"] . '</td>';
            $html .= '<td hidden>' . $st["address"] . '</td>';
            $html .= '<td hidden>' . $st["hometown"] . '</td>';
            $html .= '<td hidden>' . $st["father_name"] . '</td>';
            $html .= '<td hidden>' . $st["father_job"] . '</td>';
            $html .= '<td hidden>' . $st["father_phone"] . '</td>';
            $html .= '<td hidden>' . $st["mother_name"] . '</td>';
            $html .= '<td hidden>' . $st["mother_job"] . '</td>';
            $html .= '<td hidden>' . $st["mother_phone"] . '</td>';
            $html .= '<td class="td-actions text-center">';
            $html .= $this->moveClass($st["dob"], $class, $st["student_id"]);
            $html .= '</td>';
            $html .= '</tr>';
        }
        return $html;
    }

    public function displayThanhTich($data, $class)
    {
        $html = "";
        $i = 0;
        foreach ($data as $st) {
            $html .= '<tr class="class-style"  style="cursor: pointer">';
            $html .= '<td>' . ++$i . '</td>';
            $html .= '<td>' . $st["student_name"] . '</td>';
            $html .= '<td>' . $st["dob"] . '</td>';
            $html .= '<td>' . $st["gender"] . '</td>';
            $html .= '<td class="td-actions text-center">';
            $html .= '<div class="form-check form-check-inline">';
            $html .= '<label class="form-check-label ">';
            $html .= '<input class="form-check-input" type="checkbox">';
            $html .= '<span class="form-check-sign">';
            $html .= '<span class="check"></span>';
            $html .= '</span>';
            $html .= '</label>';
            $html .= '</div>';
            $html .= '</td>';
            $html .= '</tr>';
        }
        return $html;
    }

    public function makeNamhoc($year)
    {
        $bits = explode('-', $year);
        $begin = $bits[0];
        $end = $bits[1];
        $html = "";
        if (date("Y") >= $begin && date("Y") <= $end) {
            for ($i = 0; $i < 9; $i++) {
                if ($i <= 3) {
                    $m = ($i + 9) >=10 ? ($i + 9) : "0" . ($i + 9);
                    $html .= "<option value='$i'>" . $m . "/" . $begin . "</option>";
                } else {
                    $m = ($i - 3) > 10 ? ($i - 3) : "0" . ($i - 3);
                    $html .= "<option value='$i'>" . $m . "/" . $end . "</option>";
                }


            }
        }
        return $html;

    }

    public function moveClass($dob, $class, $student_id)
    {
        $grade = $this->checkDob($dob);
        $grade_id = $class["grade_id"];
        $html = "";
        if ($grade < 3) {
            if ($grade > $grade_id) {
                $html .= '<button type="button" rel="tooltip" data-toggle="modal"  data-target="#infoModal" class="btn btn-info btn-simple" value="1"><i class="material-icons">remove_red_eye</i> </button> ';
                $html .= '<button type="button" rel="tooltip" title="Có thể chuyển lớp" data-toggle="modal"  data-target="#editModal" class="btn btn-warning btn-simple btn-edit-tb" value="' . $student_id . '"><i class="material-icons">swap_horiz</i> </button>';
            } else {
                $html .= '<button type="button" rel="tooltip" data-toggle="modal"  data-target="#infoModal" class="btn btn-info btn-simple" value="0"><i class="material-icons">remove_red_eye</i> </button> ';
            }
        }
        return $html;
    }

    public function getNextClass($dob)
    {
        $grade = $this->checkDob($dob);
        if ($grade < 3) {
            $class = new Class_per();
            return $class->getGradeName($grade + 1);
        }
        return "";
    }

    public function checkDob($dob)
    {
        $grade = "";
        $month = $this->getAge($dob);
        if ($month > 15 && $month <= 24)
            $grade = 1;
        else if ($month > 24 && $month <= 36) {
            $grade = 2;
        } else if ($month > 36) {
            $grade = 3;
        }
        return $grade;
    }

    function getAge($birthdate = '0000-00-00')
    {
        if ($birthdate == '0000-00-00') return 'Unknown';
        $bits = explode('-', $birthdate);
        $y = date('Y') - $bits[0];
        $m = date('m') - $bits[1];
        $d = date('d') - $bits[2];
        $age = ($y * 12 + $m) * 30.4167 + $d;
        return round($age / 30.4167);
    }
}

//$m = new StudentLoader();
//$str = $m->makeNamhoc("2017-2018");
//echo $str;