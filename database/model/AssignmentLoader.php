<?php
include_once("Assignment.php");
include_once("PreClass.php");
include_once("Employee.php");

class AssignmentLoader
{
    private $assignment;
    private $assign_array;
    private $pagination;
    private $employee;
    private $lop;
    private $class_arr;
    private $emp_arr;

    public function __construct()
    {
        $this->assignment = new Assignment();
        $this->lop = new PreClass();
        $this->employee = new Employee();
        $this->class_arr = $this->lop->getAll();
        $this->emp_arr = $this->employee->getAll();
    }

    public function display($page)
    {
        $i = 0;
        $this->assign_array = $this->assignment->pagination(10, $page);
        $this->pagination = $this->assign_array->showPagination();
        $html = '';
        foreach ($this->assign_array->getResult() as $value) {
            $html .= '<tr>';
            $html .= '<td>' . ++$i . '</td>';
            $html .= '<td>' . $value["year"] . '</td>';
            $html .= '<td >' . $value["class_name"] . '</td>';
            $html .= '<td >' . $value["emp_name"] . '</td>';
            $html .= '<td class="td-actions text-center">';
            $html .= '<button type="button" rel="tooltip"  role="button" aria-disabled="true"
                data-toggle="modal" data-target="#addModal" class="btn btn-info"><i class="material-icons">person</i></button>';
            $html .= '<button data-target="#editModal"  role="button" aria-disabled="true"
                data-toggle="modal" value="' . $value["assign_id"] . '" type="button" rel="tooltip" class="btn btn-success"><i class="material-icons">edit</i></button>';
            $html .= '<button data-target="#deleteModal"  role="button" aria-disabled="true"
                data-toggle="modal" value="' . $value["assign_id"] . '" type="button" rel="tooltip" class="btn btn-danger"><i class="material-icons">close</i></button>';
            $html .= '</td>';
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

}