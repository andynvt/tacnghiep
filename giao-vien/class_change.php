<?php
include_once("../database/model/ChangeClass.php");
include_once("../common/staff.php");
$user = $_SESSION["user"];
$emp_id = $user["emp_id"];
$changeClass = new ChangeClass();
$class = $changeClass->getAll($emp_id);
?>
<?php
$account = $_SESSION['user'];
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Lịch sử chuyển lớp</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="filter_tbl">
                                <thead class=" text-primary">
                                <th>
                                    STT
                                </th>
                                <th>
                                    Tên học sinh
                                </th>
                                <th>
                                    Lớp cũ
                                </th>
                                <th>
                                    Lớp mới
                                </th>
                                <th>
                                    Giáo viên chuyển
                                </th>
                                <th>
                                    Ngày chuyển
                                </th>
                                <th class="text-center">
                                    Tác vụ
                                </th>
                                </thead>
                                <tbody id="table-body">
                                <?php echo $changeClass->displayAll($class) ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="infoModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="title"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmChuyenLop">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group" style="display: none">
                                <label for="exampleInput1" class="bmd-label-floating">Mã học sinh</label>
                                <input class="form-control" type="text" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInput2" class="bmd-label-floating">Tên học sinh</label>
                                <input class="form-control" type="text" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Ngày sinh</label>
                                <input class="form-control" type="date" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Giới tính</label>
                                <input class="form-control" type="text" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Quê quán</label>
                                <input class="form-control" type="text" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Địa chỉ</label>
                                <input class="form-control" type="text" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Địa chỉ thường trú</label>
                                <input class="form-control" type="text" value="" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Tên cha</label>
                                <input class="form-control" type="text" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Nghề của cha</label>
                                <input class="form-control" type="text" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Số điện thoại cha</label>
                                <input class="form-control" type="number" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Tên mẹ</label>
                                <input class="form-control" type="text" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Nghề của mẹ</label>
                                <input class="form-control" type="text" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Số điện thoại mẹ</label>
                                <input class="form-control" type="number" value="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ĐÓNG</button>
                        <span></span>
                        <button type="button" class="btn btn-warning " data-dismiss="modal">Chuyển lớp
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
