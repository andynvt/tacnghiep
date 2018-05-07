<?php
include_once("../database/model/Employee.php");
$emp = new Employee();
$getEmp = $emp->getAll();
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($_POST["add-emp"])) {
                    $name = $_POST["name"];
                    $dob = $_POST["dob"];
                    $gender = $_POST["gender"];
                    $id_card = $_POST["id_card"];
                    $doi = $_POST["doi"];
                    $hometown = $_POST["hometown"];
                    $address = $_POST["address"];
                    $current_address = $_POST["current_address"];
                    $phone = $_POST["phone"];
                    $check = $emp->insert($name, $dob, $gender, $id_card, $doi, $hometown, $address, $current_address, $phone);
                    if($check){
                        echo "<script>alertAdd(true,'Đã thêm <b>".$name."</b> thành công!');</script>";
                    }
                    else{
                        echo "<script>alertAdd(false,'Thêm nhân viên thất bại!');</script>";
                    }
                }
                if (isset($_POST["update-emp"])) {
                    $id = $_POST["id"];
                    $name = $_POST["name"];
                    $dob = $_POST["dob"];
                    $gender = $_POST["gender"];
                    $id_card = $_POST["id_card"];
                    $doi = $_POST["doi"];
                    $hometown = $_POST["hometown"];
                    $address = $_POST["address"];
                    $current_address = $_POST["current_address"];
                    $phone = $_POST["phone"];

                    $check = $emp->update($id, $name, $dob, $gender, $id_card, $doi, $hometown, $address, $current_address, $phone);

                    if($check){
                        echo "<script>alertEdit(true,'Đã sửa <b>".$name."</b> thành công!');</script>";
                    }
                    else{
                        echo "<script>alertEdit(false,'Sửa thông tin nhân viên thất bại!');</script>";
                    }
                }
                if (isset($_POST["delete-emp"])) {
                    $id = $_POST["id"];
                    $check = $emp->delete($id);
                    if($check){
                        echo "<script>alertDelete(true,'Xoá <b>".$name."</b> thành công!');</script>";
                    }
                    else{
                        echo "<script>alertDelete(false,'Xoá nhân viên thất bại!');</script>";
                    }
                }

                ?>
                <button type="button" class="btn btn-secondary btn-lg" role="button" aria-disabled="true"
                        data-toggle="modal" data-target="#add-emp">
                    <i class="material-icons">add_circle_outline</i>
                    Thêm mới
                </button>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary"
                         style="background: linear-gradient(60deg, #ab47bc, #8e24aa)">
                        <h4 class="card-title ">Bảng quản lý nhân viên</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class=" text-primary">
                                <th>
                                    ID
                                </th>
                                <th>
                                    Tên
                                </th>
                                <th>
                                    Điện thoại
                                </th>
                                <th>
                                    Chức vụ
                                </th>
                                <th>
                                    Dạy lớp
                                </th>
                                <th class="text-center">
                                    Thao tác
                                </th>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($getEmp as $e) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $e["emp_id"] ?>
                                        </td>
                                        <td>
                                            <?= $e["emp_name"] ?>
                                        </td>
                                        <td class="text-primary">
                                            <a href="tel:<?= $e["phone"] ?>"><?= $e["phone"] ?></a>
                                        </td>
                                        <td class="text-primary">
                                            <a href="#">
                                                <?= $e["job_name"] ?>
                                            </a>
                                        </td>
                                        <td class="text-primary">
                                            <a href="#">
                                                <?= $e["class_name"] ?>
                                            </a>
                                        </td>
                                        <td class="td-actions text-center">
                                            <button type="button" rel="tooltip" title="Xem chi tiết" class="btn btn-info btn-simple"
                                                    data-toggle="modal"
                                                    data-target="#detail-emp-<?= $e["emp_id"] ?>">
                                                <i class="material-icons">remove_red_eye</i>
                                            </button>
                                            <button type="button" rel="tooltip" title="Sửa thông tin" class="btn btn-success btn-simple"
                                                    data-toggle="modal" data-target="#edit-emp-<?= $e["emp_id"] ?>">
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <button type="button" rel="tooltip" title="Xoá nhân viên" class="btn btn-danger btn-simple"
                                                    data-toggle="modal" data-target="#delete-emp-<?= $e["emp_id"] ?>">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add-emp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Thêm nhân viên mới</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <label class="bmd-label-floating">Họ tên nhân viên</label>
                            <input type="text" class="form-control" name="name" minlength="2" required>
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Ngày sinh</label>
                            <input type="date" class="form-control" name="dob" min="1900-01-01" max="2100-01-01" required>
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Giới tính</label>
                            <div class="form-check form-check-radio">
                                <label class="form-check-label col-lg-2">
                                    <input class="form-check-input" type="radio" name="gender" value="Nam" checked>
                                    Nam
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                                <label class="form-check-label col-lg-2">
                                    <input class="form-check-input" type="radio" name="gender" value="Nữ">
                                    Nữ
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Số CMND</label>
                            <input type="text" class="form-control" name="id_card" required>
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Ngày cấp</label>
                            <input type="date" class="form-control" name="doi" min="1900-01-01" max="2100-01-01" required>
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Quê quán</label>
                            <input type="text" class="form-control" name="hometown" required>
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Địa chỉ thường trú</label>
                            <input type="text" class="form-control" name="address" required>
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Địa chỉ hiện nay</label>
                            <input type="text" class="form-control" name="current_address" required>
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Số điện thoại</label>
                            <input type="text" class="form-control" name="phone" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                            <span></span>
                            <button type="submit" class="btn btn-primary" name="add-emp">LƯU LẠI</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    foreach ($getEmp as $e) {
        ?>
        <div class="modal fade" id="detail-emp-<?= $e["emp_id"] ?>" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Thông tin
                            <b><?= $e["emp_name"] ?></b>
                        </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label class="bmd-label-floating">Họ tên</label>
                                <input class="form-control disable-modal" type="text"
                                       value="<?= $e["emp_name"] ?>" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Ngày sinh</label>
                                <input class="form-control" type="text" value="<?= $e["dob"] ?>"
                                       readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Giới tính</label>
                                <input class="form-control" type="text" value="<?= $e["gender"] ?>"
                                       readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Quê quán</label>
                                <input class="form-control" type="text" value="<?= $e["hometown"] ?>"
                                       readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Số CMND</label>
                                <input class="form-control" type="text" value="<?= $e["id_card"] ?>"
                                       readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Ngày cấp</label>
                                <input class="form-control" type="text" value="<?= $e["doi"] ?>"
                                       readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Địa chỉ thường trú</label>
                                <input class="form-control" type="text" value="<?= $e["address"] ?>"
                                       readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Địa chỉ hiện nay</label>
                                <input class="form-control" type="text" value="<?= $e["current_address"] ?>"
                                       readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Số điện thoại</label>
                                <input class="form-control" type="text" value="<?= $e["phone"] ?>"
                                       readonly="readonly">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">ĐÓNG</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="edit-emp-<?= $e["emp_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Sửa thông tin <b><?= $e["emp_name"] ?></b></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?= $e["emp_id"] ?>">
                                <label class="bmd-label-floating">Họ tên</label>
                                <input class="form-control" type="text" name="name" value="<?= $e["emp_name"] ?>">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Ngày sinh</label>
                                <input class="form-control" type="date" name="dob" min="1900-01-01" max="2100-01-01" value="<?= $e["dob"] ?>">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Giới tính</label>
                                <div class="form-check form-check-radio">
                                    <?php if($e["gender"] == "Nam"){ ?>
                                        <label class="form-check-label col-lg-2">
                                            <input class="form-check-input" type="radio" name="gender" value="Nam" checked>
                                            Nam
                                            <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                        </label>
                                        <label class="form-check-label col-lg-2">
                                            <input class="form-check-input" type="radio" name="gender" value="Nữ">
                                            Nữ
                                            <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                        </label>
                                    <?php }else{ ?>
                                        <label class="form-check-label col-lg-2">
                                            <input class="form-check-input" type="radio" name="gender" value="Nam" >
                                            Nam
                                            <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                        </label>
                                        <label class="form-check-label col-lg-2">
                                            <input class="form-check-input" type="radio" name="gender" value="Nữ" checked>
                                            Nữ
                                            <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                        </label>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Số CMND</label>
                                <input class="form-control" type="text" name="id_card" value="<?= $e["id_card"] ?>">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Ngày cấp</label>
                                <input class="form-control" type="date" name="doi" min="1900-01-01" max="2100-01-01" value="<?= $e["doi"] ?>">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Quê quán</label>
                                <input class="form-control" type="text" name="hometown" value="<?= $e["hometown"] ?>">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Địa chỉ thường trú</label>
                                <input class="form-control" type="text" name="address" value="<?= $e["address"] ?>">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Địa chỉ hiện nay</label>
                                <input class="form-control" type="text" name="current_address" value="<?= $e["current_address"] ?>">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Số điện thoại</label>
                                <input class="form-control" type="text" name="phone" value="<?= $e["phone"] ?>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                                <span></span>
                                <button type="submit" class="btn btn-primary" name="update-emp">CẬP NHẬT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="delete-emp-<?= $e["emp_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Xác nhận xoá <b><?= $e["emp_name"] ?></b></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Thao tác này sẽ làm mất dữ liệu !<br>Bạn chắc chắn muốn xóa nhân viên <b><?= $e["emp_name"] ?></b> ?</p>
                    </div>
                    <div class="modal-footer">
                        <form method="post">
                            <input type="hidden" name="id" value="<?= $e["emp_id"] ?>">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                            <span></span>
                            <button type="submit" class="btn btn-primary" name="delete-emp">CHẤP NHẬN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Bạn có muốn đăng xuất?</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                    <span></span>
                    <button type="button" class="btn btn-primary">CHẤP NHẬN</button>
                </div>
            </div>
        </div>
    </div>
</div>