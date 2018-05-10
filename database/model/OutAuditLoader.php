<?php
include_once "OutAudit.php";
include_once "Employee.php";

class OutAuditLoader
{

    private $outAudit;
    private $outAudit_array;
    private $emp;
    private $emp_name_arr;
    private $pagination;

    public function __construct()
    {
        $this->outAudit = new OutAudit();
        $this->emp = new Employee();
        $this->emp_name_arr = $this->emp->getAll();
    }

    public function display($page)
    {
        $i = 0;
        $this->outAudit_array = $this->outAudit->loadAll();
        $html = '';
        foreach ($this->outAudit_array as $value) {
            $html .= '<tr>';
            $html .= '<td>' . ++$i . '</td>';
            $html .= '<td>' . $value["oa_desc"] . '</td>';
            $html .= '<td >' . $value["money"] . '</td>';
            $html .= '<td >' . $value["date"] . '</td>';
            $html .= '<td class="text-primary">' . $this->emp->loadNameByID($value["emp_id"]) . '</td>';
            $html .= '<td class="td-actions text-center">';
            $html .= '<button type="button" rel="tooltip" class="btn btn-info"
                        data-toggle="modal" data-target="#detailOutAuditModal">
                    <i class="material-icons">remove_red_eye</i>
                </button> ';
            $html .= ' <button type="button" value=" ' . $value["oa_id"] . '" rel="tooltip"
                        class="btn btn-success" data-toggle="modal"
                        data-target="#editOutAuditModal">
                    <i class="material-icons">edit</i>
                </button> ';
            $html .= '<button type="button" value=" ' . $value["oa_id"] . '" rel="tooltip"
                        class="btn btn-danger" data-toggle="modal"
                        data-target="#deleteOutAuditModal">
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
        $this->outAudit_array = $this->outAudit->loadAll();
        $html = '';
        foreach ($this->outAudit_array as $value) {
            $html .= '<tr>';
            $html .= '<td>' . ++$i . '</td>';
            $html .= '<td>' . $value["oa_desc"] . '</td>';
            $html .= '<td >' . $value["money"] . '</td>';
            $html .= '<td >' . $value["date"] . '</td>';
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
            echo '<input type="text" value="' . $value["oa_desc"] . '">';
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

    public function loadEmpName()
    {
        foreach ($this->emp_name_arr as $value) {
            echo '<option value="' . $value["emp_id"] . '">' . $value["emp_name"] . '</option>';
        }
    }
}