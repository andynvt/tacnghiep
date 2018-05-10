<?php

use MongoDB\BSON\Timestamp;

/**
 * Created by PhpStorm.
 * User: chuna
 * Date: 10/05/2018
 * Time: 13:27
 */
class StudentLoader
{
    public function displayAll($data)
    {
        $html = "";
        foreach ($data as $st) {
            $html .= '<tr class="class-style" data-toggle="modal" data-target=\'#stu_<?= $st["student_id"]; ?>\' style="cursor: pointer">';
            $html .= '<td>' . $st["student_id"] . '</td>';
            $html .= '<td>' . $st["student_name"] . '</td>';
            $html .= '<td>' . $st["dob"] . '</td>';
            $html .= '<td>' . $st["gender"] . '</td>';
            $html .= '<td>' . $st["current_address"] . '</td>';
            $html .= '<td class="td-actions text-center">';
            $html .= '<button type="submit" rel="tooltip" class="btn btn-success btn-simple" value=""><i class="material-icons">check</i></button>';
            $html .= '</td>';
            $html .= '</tr>';
        }
        return $html;
    }

    public function checkDob($dob)
    {
        $current = strtotime("now");
        $emp = strtotime($dob);
        $rs = ($current - $emp);
        $date = date("Y-m-d", $rs);
        $year = date("Y", $rs) - 1970;
        $day = date("d", $rs);
        $month = date("m", $rs);
        $d = new DateTime();
        $d->setDate($year, $day, $month);
        $result = $d->format('Y-m-d H:i:s');
        echo $result;
        $html = "";
        $html .= '<button type="submit" rel="tooltip" class="btn btn-success btn-simple" value=""><i class="material-icons">check</i></button>';
        return $html;
    }
    function getAge($birthdate = '0000-00-00') {
        if ($birthdate == '0000-00-00') return 'Unknown';
        $bits = explode('-', $birthdate);
        $age = date('Y') - $bits[0] - 1;
        $arr[1] = 'm';
        $arr[2] = 'd';
        for ($i = 1; $arr[$i]; $i++) {
            $n = date($arr[$i]);
            if ($n < $bits[$i])
                break;
            if ($n > $bits[$i]) {
                ++$age;
                break;
            }
        }
        return $age;
    }
}

$student = new StudentLoader();
$dob = $student->getAge("2011-1-1");
echo $dob;