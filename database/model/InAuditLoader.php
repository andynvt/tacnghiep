<?php
include_once "InAudit.php";
include_once "Employee.php";

class InAuditLoader
{

    private $inAudit;
    private $inAudit_array;
    private $emp;
    private $emp_name_arr;
    private $pagination;

    public function __construct()
    {
        $this->inAudit = new InAudit();
        $this->emp = new Employee();
        $this->emp_name_arr = $this->emp->getAll();
    }

    public function display($page)
    {
        $i = 0;
        $this->inAudit_array = $this->inAudit->pagination(10, $page);
        $this->pagination = $this->inAudit_array->showPagination();
        $html = '';
        foreach ($this->inAudit_array->getResult() as $value) {
            $class_round = $i % 2 == 1 ? "btn-round" : "";
            $html .= '<tr>';
            $html .= '<td>' . ++$i . '</td>';
            $html .= '<td>' . $value["ia_desc"] . '</td>';
            $html .= '<td >' . $value["money"] . '</td>';
            $html .= '<td >' . $value["date"] . '</td>';
            $html .= '<td class="text-primary">' . $value["payer"] . '</td>';
            $html .= '<td class="text-primary">' . $this->emp->loadNameByID($value["emp_id"]) . '</td>';
            $html .= '<td class="td-actions text-center">';
            $html .= '<button type="button" rel="tooltip" class="btn btn-info"
                        data-toggle="modal" data-target="#detailInAuditModal">
                    <i class="material-icons">remove_red_eye</i>
                </button> ';
            $html .= ' <button type="button" value=" ' . $value["ia_id"] . '" rel="tooltip"
                        class="btn btn-success" data-toggle="modal"
                        data-target="#editInAuditModal">
                    <i class="material-icons">edit</i>
                </button> ';
            $html .= '<button type="button" value=" ' . $value["ia_id"] . '" rel="tooltip"
                        class="btn btn-danger" data-toggle="modal"
                        data-target="#deleteInAuditModal">
                    <i class="material-icons">close</i>
                </button>';
            $html .= '</td>';
            $html .= '</tr>';
        }
        return $html;
    }

    public function viewOnly($page)
    {
        $i = 0;
        $this->inAudit_array = $this->inAudit->pagination(10, $page);
        $this->pagination = $this->inAudit_array->showPagination();
        $html = '';
        foreach ($this->inAudit_array->getResult() as $value) {
            $class_round = $i % 2 == 1 ? "btn-round" : "";
            $html .= '<tr>';
            $html .= '<td>' . ++$i . '</td>';
            $html .= '<td>' . $value["ia_desc"] . '</td>';
            $html .= '<td >' . $value["money"] . '</td>';
            $html .= '<td >' . $value["date"] . '</td>';
            $html .= '<td class="text-primary">' . $value["payer"] . '</td>';
            $html .= '<td class="text-primary">' . $this->emp->loadNameByID($value["emp_id"]) . '</td>';
            $html .= '<td class="td-actions text-center">';
            $html .= '<button type="button" rel="tooltip" class="btn btn-info"
                        data-toggle="modal" data-target="#detailInAuditModal">
                    <i class="material-icons">remove_red_eye</i>
                </button> ';
            $html .= '</td>';
            $html .= '</tr>';
        }
        return $html;
    }

    public function getPagination()
    {
        return $this->pagination;
    }

    public function loadInAuditDesc()
    {
        foreach ($this->class_arr as $value) {
            echo '<input type="text" value="' . $value["ia_desc"] . '">';
        }

    }

    public function loadInAuditMoney()
    {
        foreach ($this->class_arr as $value) {
            echo '<input type="text" value="' . $value["money"] . '">';
        }

    }

    public function loadInAuditDate()
    {
        foreach ($this->class_arr as $value) {
            echo '<input type="text" value="' . $value["date"] . '">';
        }

    }

    public function loadInAuditPayer()
    {
        foreach ($this->class_arr as $value) {
            echo '<input type="text" value="' . $value["payer"] . '">';
        }

    }

    public function loadEmpName()
    {
        foreach ($this->emp_name_arr as $value) {
            echo '<option value="' . $value["emp_id"] . '">' . $value["emp_name"] . '</option>';
        }
    }
}