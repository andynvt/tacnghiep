<?php
include_once("../database/model/Employee.php");
include_once("../database/model/DepartmentEmployee.php");
include_once("../database/model/Job.php");
include_once("../database/model/Department.php");
$page = (isset($_GET['page'])) ? $_GET['page'] : 1;

$emp = new Employee();
$job = new Job();
$dep = new Department();
$dep_emp = new DepartmentEmployee();
$getEmp = $emp->getAll();
$getJob = $job->getAll();
$getDep = $dep->getAll();
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
                    if ($check) {
                        echo "<script>alertAdd(true,'Đã thêm <b>" . $name . "</b> thành công!');</script>";
                        echo("<meta http-equiv='refresh' content='3.5'>");
                    } else {
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

                    if ($check) {
                        echo "<script>alertEdit(true,'Đã sửa <b>" . $name . "</b> thành công!');</script>";
                        echo("<meta http-equiv='refresh' content='3.5'>");
                    } else {
                        echo "<script>alertEdit(false,'Sửa thông tin nhân viên thất bại!');</script>";
                    }
                }
                if (isset($_POST["delete-emp"])) {
                    $id = $_POST["id"];
                    $name = $_POST["name"];
                    $check = $emp->delete($id);
                    if ($check) {
                        echo "<script>alertDelete(true,'Xoá <b>" . $name . "</b> thành công!');</script>";
                        echo("<meta http-equiv='refresh' content='3.5'>");
                    } else {
                        echo "<script>alertDelete(false,'Xoá nhân viên thất bại!');</script>";
                    }
                }

                if (isset($_POST["job-emp"])) {
                    $emp_id = $_POST["id"];
                    $job_id = $_POST["job_id"];
                    $dep_id = $_POST["dep_id"];
                    $old_job = $_POST["old_job"];
                    $name = $_POST["name"];

                    $no = $job->countJobByEmp($emp_id);
                    if ($no != 0) {
                        $old_dep_emp = $dep_emp->findDepEmpByEJ($emp_id, $old_job);
                        $dep_emp_id = $old_dep_emp[0]["dep_emp_id"];

                        $check = $dep_emp->update_de($dep_emp_id, $dep_id, $job_id);
                        if ($check) {
                            echo "<script>alertEdit(true,'Cập nhật chức vụ của <b>" . $name . "</b> thành công!');</script>";
                            echo("<meta http-equiv='refresh' content='3.5'>");
                        } else {
                            echo "<script>alertEdit(false,'Cập nhật chức vụ thất bại!');</script>";
                        }
                    } else {
                        $check = $dep_emp->insert_de($dep_id, $emp_id, $job_id);
                        if ($check) {
                            echo "<script>alertAdd(true,'Thêm chức vụ của <b>" . $name . "</b> thành công!');</script>";
                            echo("<meta http-equiv='refresh' content='3.5'>");
                        } else {
                            echo "<script>alertAdd(false,'Thêm chức vụ thất bại!');</script>";
                        }
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
                            <table class="table table-hover" id="filter_tbl">
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
                                            <button type="button" rel="tooltip" title="Chức vụ"
                                                    class="btn btn-warning btn-simple"
                                                    data-toggle="modal"
                                                    data-target="#job-emp-<?= $e["emp_id"] ?>">
                                                <i class="material-icons">card_travel</i>
                                            </button>
                                            <button type="button" rel="tooltip" title="Xem chi tiết"
                                                    class="btn btn-info btn-simple"
                                                    data-toggle="modal"
                                                    data-target="#detail-emp-<?= $e["emp_id"] ?>">
                                                <i class="material-icons">remove_red_eye</i>
                                            </button>
                                            <button type="button" rel="tooltip" title="Sửa thông tin"
                                                    class="btn btn-success btn-simple"
                                                    data-toggle="modal" data-target="#edit-emp-<?= $e["emp_id"] ?>">
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <button type="button" rel="tooltip" title="Xoá nhân viên"
                                                    class="btn btn-danger btn-simple"
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
                            <input type="date" class="form-control" name="dob" min="1900-01-01" max="2100-01-01"
                                   required>
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
                            <input type="date" class="form-control" name="doi" min="1900-01-01" max="2100-01-01"
                                   required>
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
        $getDepByEmp = $dep->getDepByEmp($e["emp_id"]);
        $getJobByEmp = $job->getJobByEmp($e["emp_id"]);
        ?>
        <div class="modal fade" id="job-emp-<?= $e["emp_id"] ?>" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Sửa chức vụ của <b><?= $e["emp_name"] ?></b></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?= $e["emp_id"] ?>">
                                <input type="hidden" name="name" value="<?= $e["emp_name"] ?>">
                                <input type="hidden" name="old_job" value="<?= $getJobByEmp["job_id"] ?>">
                                <label class="bmd-label-floating">Chọn chức vụ</label>
                                <select class="form-control" name="job_id">
                                    <option> --- Chọn chức vụ ---</option>
                                    <?php
                                    foreach ($getJob as $j) {
                                        if ($j["job_id"] == $getJobByEmp["job_id"]) {
                                            ?>
                                            <option value="<?= $getJobByEmp["job_id"] ?>"
                                                    selected><?= $getJobByEmp["job_name"] ?></option>
                                            <?php
                                        } else {
                                            ?>
                                            <option value="<?= $j["job_id"] ?>"><?= $j["job_name"] ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Chọn tổ</label>
                                <select class="form-control" name="dep_id">
                                    <option> --- Chọn tổ ---</option>
                                    <?php
                                    foreach ($getDep as $d) {
                                        if ($d["dep_id"] == $getDepByEmp["dep_id"]) {
                                            ?>
                                            <option value="<?= $getDepByEmp["dep_id"] ?>"
                                                    selected><?= $getDepByEmp["dep_name"] ?></option>
                                            <?php
                                        } else {
                                            ?>
                                            <option value="<?= $d["dep_id"] ?>"><?= $d["dep_name"] ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                                <span></span>
                                <button type="submit" class="btn btn-primary" name="job-emp">CẬP NHẬT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
                                <input type="hidden" name="name" value="<?= $e["emp_name"] ?>">
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
        <div class="modal fade" id="edit-emp-<?= $e["emp_id"] ?>" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel"
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
                                <input type="hidden" name="name" value="<?= $e["emp_name"] ?>">
                                <label class="bmd-label-floating">Họ tên</label>
                                <input class="form-control" type="text" name="name" value="<?= $e["emp_name"] ?>">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Ngày sinh</label>
                                <input class="form-control" type="date" name="dob" min="1900-01-01" max="2100-01-01"
                                       value="<?= $e["dob"] ?>">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Giới tính</label>
                                <div class="form-check form-check-radio">
                                    <?php if ($e["gender"] == "Nam") { ?>
                                        <label class="form-check-label col-lg-2">
                                            <input class="form-check-input" type="radio" name="gender" value="Nam"
                                                   checked>
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
                                    <?php } else { ?>
                                        <label class="form-check-label col-lg-2">
                                            <input class="form-check-input" type="radio" name="gender" value="Nam">
                                            Nam
                                            <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                        </label>
                                        <label class="form-check-label col-lg-2">
                                            <input class="form-check-input" type="radio" name="gender" value="Nữ"
                                                   checked>
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
                                <input class="form-control" type="date" name="doi" min="1900-01-01" max="2100-01-01"
                                       value="<?= $e["doi"] ?>">
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
                                <input class="form-control" type="text" name="current_address"
                                       value="<?= $e["current_address"] ?>">
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

        <div class="modal fade" id="delete-emp-<?= $e["emp_id"] ?>" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel"
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
                        <p>Thao tác này sẽ làm mất dữ liệu !<br>Bạn chắc chắn muốn xóa nhân viên
                            <b><?= $e["emp_name"] ?></b> ?</p>
                    </div>
                    <div class="modal-footer">
                        <form method="post">
                            <input type="hidden" name="id" value="<?= $e["emp_id"] ?>">
                            <input type="hidden" name="name" value="<?= $e["emp_name"] ?>">
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
</div>