<?php
include_once("Department.php");
include_once("PreClass.php");
include_once("Employee.php");

class DepartmentLoader
{
    private $department;
    private $dep_array;
    private $pagination;
    private $employee;
    private $lop;
    private $class_arr;
    private $emp_arr;
    private $dep_arr;

    public function __construct()
    {

        $this->department = new Department();
        $this->lop = new PreClass();
        $this->employee = new Employee();
        $this->class_arr = $this->lop->getAll();
        $this->emp_arr = $this->employee->getAll();
        $this->dep_arr = $this->department->getAll();
    }

    public function display($page)
    {
        $i = 0;
        $this->dep_array = $this->department->pagination(10, $page);
        $this->pagination = $this->dep_array->showPagination();
        $html = '';
        foreach ($this->dep_array->getResult() as $value) {
            $html .= '<tr>';
            $html .= '<td>' . ++$i . '</td>';
            $html .= '<td >' . $value["dep_name"] . '</td>';
            $html .= '<td > 1</td>';
            $html .= '<td class="td-actions text-center">';
            $html .= '<button value="' . $value["dep_id"] . '"' .
                ' type="button" rel="tooltip" class="btn btn-info"  data-toggle="modal" data-target="#ViewListModal">'.
                '<i class="material-icons">remove_red_eye</i></button>';
            $html .= '</td>';
            $html .= '</tr>';
        }
        return $html;
    }

    public function displayList($valu)
    {
        $i = 0;
        $array = $this->department->getListMember($valu);
        $html = '';
        foreach ($array as $value) {
            $html .= '<tr>';
            $html .= '<td>' . ++$i . '</td>';
            $html .= '<td >' . $value["emp_id"] . '</td>';
            $html .= '<td >' . $value["emp_name"] . '</td>';
            $html .= '<td >' . $value["gender"] . '</td>';
            $html .= '<td >' . $value["phone"] . '</td>';
            $html .= '<td class="td-actions text-center">';
            $html .= '<button type="button" rel="tooltip" title="Xoá thành viên" class="btn btn-danger btn-simple"'.
                'data-toggle="modal" data-target="#delete-member">'.
                '<i class="material-icons">close</i></button>';
            $html .= '</td>';

            $html .= '</tr>';
        }
        return $html;
    }
    public function displayListMemByID($emp_id)
    {
        $i = 0;

        $dep_id = $this->department->getDepID($emp_id);
        $array = $this->department->getListMember($dep_id);
        $html = '';
        foreach ($array as $value) {
            $html .= '<tr>';
            $html .= '<td>' . ++$i . '</td>';
            $html .= '<td >' . $value["emp_id"] . '</td>';
            $html .= '<td >' . $value["emp_name"] . '</td>';
            $html .= '<td >' . $value["dob"] . '</td>';
            $html .= '<td >' . $value["gender"] . '</td>';
            $html .= '<td >' . $value["id_card"] . '</td>';
            $html .= '<td >' . $value["current_address"] . '</td>';
            $html .= '<td >' . $value["phone"] . '</td>';

            $html .= '</tr>';
        }
        return $html;
    }
    public function getPagination()
    {
        return $this->pagination;
    }

    public function loadClassYear()
    {
        foreach ($this->class_arr as $value) {
            echo '<option value="' . $value["class_id"] . '">' . $value["year"] . '</option>';
        }

    }

    public function loadClassName()
    {
        foreach ($this->class_arr as $value) {
            echo '<option value="' . $value["class_id"] . '">' . $value["class_name"] . '</option>';
        }

    }

    public function loadEmpName()
    {
        foreach ($this->emp_arr as $value) {
            echo '<option value="' . $value["emp_id"] . '">' . $value["emp_name"] . '</option>';
        }
    }
    public function loadDepName()
    {
        foreach ($this->dep_arr as $value) {
            echo '<option value="' . $value["dep_id"] . '">' . $value["dep_name"] . '</option>';
        }
    }
}