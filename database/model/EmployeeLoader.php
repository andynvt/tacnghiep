<?php
include_once("Employee.php");

class EmployeeLoader
{
    private $emp;

    public function __construct()
    {
        $this->emp = new Employee();
    }

    public function display($user)
    {
        $html = "";
        $html .= '<form style="width: 45%; float: left" method="post">';
        $html .= '<div class="form-group">';
        $html .= '<label class="col-form-label">Họ Tên</label>';
        $html .= '<input class="form-control" type="text" value="' . $user['emp_name'] . '" readonly>';
        $html .= '</div>';
        $html .= '<div class="form-group">';
        $html .= '<label class="col-form-label">Năm Sinh</label>';
        $html .= '<input class="form-control" type="text" value="' . $user['dob'] . '" readonly>';
        $html .= '</div>';
        $html .= '<div class="form-group">';
        $html .= ' <label class="col-form-label">Giới Tính</label>';
        $html .= '<input class="form-control" type="text" value="' . $user['gender'] . '" readonly/>';
        $html .= '</div>';
        $html .= '<div class="form-group">';
        $html .= '<label class="col-form-label">CMND</label>';
        $html .= '<input class="form-control" type="text" name="idcard" value="' . $user['id_card'] . '" readonly>';
        $html .= '</div>';
        $html .= '<div class="form-group">';
        $html .= '<label class="col-form-label">Ngày Vào</label>';
        $html .= '<input class="form-control" type="text" name="doi" value="' . $user['doi'] . '"/>';
        $html .= '</div>';
        $html .= '</form>';
        $html .= '<form style=" width: 45%; float: right;">';
        $html .= '<div class="form-group">';
        $html .= '<label class="col-form-label">Quê Quán</label>';
        $html .= '<input class="form-control" type="text" name="hometown" value="' . $user['hometown'] . '" readonly>';
        $html .= '</div>';
        $html .= '<div class="form-group">';
        $html .= '<label class="col-form-label">Địa Chỉ</label>';
        $html .= '<input class="form-control" type="text" name="address" value="' . $user['address'] . '" readonly>';
        $html .= '</div>';
        $html .= '<div class="form-group">';
        $html .= ' <label class="col-form-label">Địa Chỉ Hiện Tại</label>';
        $html .= '<input class="form-control" type="text" name="currAddress" value="' . $user['current_address'] . '" readonly>';
        $html .= '</div>';
        $html .= '<div class="form-group">';
        $html .= '<label class="col-form-label">Điện Thoại</label>';
        $html .= '<input class="form-control" type="text" name="phone" value="' . $user['phone'] . '" readonly>';
        $html .= '</div>';
        $html .= '</form>';
        $html .= '<form style="width: 100%; float:left; padding-left: 15%;">';
        $html .= '<div class="form-group row">';
        $html .= '<div class="offset-xs-0 offset-sm-3 col-12 col-sm-9 mt-3">';
        $html .= '<input id="btnupdate" name="" data-action="open" type="button" class="btn btn-primary" data-toggle="modal" data-target="#changePersonal" value="Cập Nhật">';
        $html .= '<input id="close" data-action="open" type="button" class="btn btn-primary" value="Thoát">';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</form>';
        return $html;
    }


}