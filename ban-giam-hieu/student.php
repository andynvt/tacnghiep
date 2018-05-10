<?php
include_once("../database/model/Student.php");
$student = new Student();
$getStudent = $student->pagination(10,$_GET['page']);
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($_POST["add-student"])) {
                    $name = $_POST["name"];
                    $dob = $_POST["dob"];
                    $gender = $_POST["gender"];
                    $hometown = $_POST["hometown"];
                    $address = $_POST["address"];
                    $current_address = $_POST["current_address"];
                    $father_name = $_POST["father_name"];
                    $father_job = $_POST["father_job"];
                    $father_phone = $_POST["father_phone"];
                    $mother_name = $_POST["mother_name"];
                    $mother_job = $_POST["mother_job"];
                    $mother_phone = $_POST["mother_phone"];

                    $check = $student->insert($name, $dob, $gender, $hometown, $address, $current_address, $father_name, $father_job, $father_phone, $mother_name, $mother_job, $mother_phone);
                    if($check){
                        echo "<script>alertAdd(true,'Đã thêm <b>".$name."</b> thành công!');</script>";
                        echo("<meta http-equiv='refresh' content='3.5'>");
                    }
                    else{
                        echo "<script>alertAdd(false,'Thêm học sinh thất bại!');</script>";
                    }
                }
                if (isset($_POST["update-student"])) {
                    $id = $_POST["id"];
                    $name = $_POST["name"];
                    $dob = $_POST["dob"];
                    $gender = $_POST["gender"];
                    $hometown = $_POST["hometown"];
                    $address = $_POST["address"];
                    $current_address = $_POST["current_address"];
                    $father_name = $_POST["father_name"];
                    $father_job = $_POST["father_job"];
                    $father_phone = $_POST["father_phone"];
                    $mother_name = $_POST["mother_name"];
                    $mother_job = $_POST["mother_job"];
                    $mother_phone = $_POST["mother_phone"];

                    $check = $student->update($id, $name, $dob, $gender, $hometown, $address, $current_address, $father_name, $father_job, $father_phone, $mother_name, $mother_job, $mother_phone);

                    if($check){
                        echo "<script>alertEdit(true,'Đã sửa <b>".$name."</b> thành công!');</script>";
                        echo("<meta http-equiv='refresh' content='3.5'>");
                    }
                    else{
                        echo "<script>alertEdit(false,'Sửa thông tin học sinh thất bại!');</script>";
                    }
                }
                if (isset($_POST["delete-student"])) {
                    $id = $_POST["id"];
                    $check = $student->delete($id);
                    $name = $_POST["name"];
                    if($check){
                        echo "<script>alertDelete(true,'Xoá <b>".$name."</b> thành công!');</script>";
                        echo("<meta http-equiv='refresh' content='3.5'>");
                    }
                    else{
                        echo "<script>alertDelete(false,'Xoá học sinh thất bại!');</script>";
                    }
                }

                ?>
                <button type="button" class="btn btn-secondary btn-lg" role="button" aria-disabled="true"
                        data-toggle="modal" data-target="#add-student">
                    <i class="material-icons">add_circle_outline</i>
                    Thêm mới
                </button>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary"
                         style="background: linear-gradient(60deg, #ab47bc, #8e24aa)">
                        <h4 class="card-title ">Bảng quản lý học sinh</h4>
                        <!--                                    <p class="card-category"> Here is a subtitle for this table</p>-->
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
                                    Lớp
                                </th>
                                <th>
                                    Ngày sinh
                                </th>
                                <th>
                                    Giới tính
                                </th>
                                <th class="text-center">
                                    Địa chỉ
                                </th>
                                <th class="text-center">
                                    Thao tác
                                </th>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($getStudent->getResult() as $st) {
                                ?>
                                <tr>
                                    <td>
                                        <?= $st["student_id"] ?>
                                    </td>
                                    <td>
                                        <?= $st["student_name"] ?>
                                    </td>
                                    <td class="text-primary">
                                        <a href="#">
                                            <?= $st["class_name"] ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?= $st["dob"] ?>
                                    </td>
                                    <td>
                                        <?= $st["gender"] ?>
                                    </td>
                                    <td>
                                        <?= $st["current_address"] ?>
                                    </td>
                                    <td class="td-actions text-center">
                                        <button type="button" rel="tooltip" title="Xem chi tiết" class="btn btn-info btn-simple"
                                                data-toggle="modal"
                                                data-target="#detail-student-<?= $st["student_id"] ?>">
                                            <i class="material-icons">remove_red_eye</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Sửa thông tin" class="btn btn-success btn-simple"
                                                data-toggle="modal" data-target="#edit-student-<?= $st["student_id"] ?>">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Xoá học sinh" class="btn btn-danger btn-simple"
                                                data-toggle="modal" data-target="#delete-student-<?= $st["student_id"] ?>">
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
                        <div id="pagination"><?= $getStudent->showPagination() ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add-student" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Thêm học sinh mới</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <label class="bmd-label-floating">Họ tên học sinh</label>
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
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Họ tên cha</label>
                                    <input type="text" class="form-control" name="father_name" minlength="2" required>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nghề nghiệp cha</label>
                                    <input type="text" class="form-control" name="father_job" required>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Số điện thoại cha</label>
                                    <input type="text" class="form-control" name="father_phone" required>
                                </div>
                            </div>
                            <div class="col-lg-6" style="border-left: 1px solid #b3b3b3">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Họ tên mẹ</label>
                                    <input type="text" class="form-control" name="mother_name" minlength="2" required>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nghề nghiệp mẹ</label>
                                    <input type="text" class="form-control" name="mother_job" required>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Số điện thoại mẹ</label>
                                    <input type="text" class="form-control" name="mother_phone" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                            <span></span>
                            <button type="submit" class="btn btn-primary" name="add-student">LƯU LẠI</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    foreach ($getStudent->getResult() as $st) {
    ?>
    <div class="modal fade" id="detail-student-<?= $st["student_id"] ?>" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Thông tin
                       <b><?= $st["student_name"] ?></b>
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
                                   value="<?= $st["student_name"] ?>" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Ngày sinh</label>
                            <input class="form-control" type="date" value="<?= $st["dob"] ?>"
                                   readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Giới tính</label>
                            <input class="form-control" type="text" value="<?= $st["gender"] ?>"
                                   readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Quê quán</label>
                            <input class="form-control" type="text" value="<?= $st["hometown"] ?>"
                                   readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Địa chỉ thường trú</label>
                            <input class="form-control" type="text" value="<?= $st["address"] ?>"
                                   readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Địa chỉ hiện nay</label>
                            <input class="form-control" type="text" value="<?= $st["current_address"] ?>"
                                   readonly="readonly">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Họ tên cha</label>
                                    <input type="text" class="form-control" value="<?= $st["father_name"] ?>"
                                           readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nghề nghiệp cha</label>
                                    <input type="text" class="form-control" value="<?= $st["father_job"] ?>"
                                           readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Số điện thoại cha</label>
                                    <input type="text" class="form-control" value="<?= $st["father_phone"] ?>"
                                           readonly="readonly">
                                </div>
                            </div>
                            <div class="col-lg-6" style="border-left: 1px solid #b3b3b3">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Họ tên mẹ</label>
                                    <input type="text" class="form-control" value="<?= $st["mother_name"] ?>"
                                           readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nghề nghiệp mẹ</label>
                                    <input type="text" class="form-control" value="<?= $st["mother_job"] ?>"
                                           readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Số điện thoại mẹ</label>
                                    <input type="text" class="form-control" value="<?= $st["mother_phone"] ?>"
                                           readonly="readonly">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">ĐÓNG</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit-student-<?= $st["student_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Sửa thông tin <b><?= $st["student_name"] ?></b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?= $st["student_id"] ?>">
                            <input type="hidden" name="name" value="<?= $st["student_name"] ?>">
                            <label class="bmd-label-floating">Họ tên</label>
                            <input class="form-control" type="text" name="name" value="<?= $st["student_name"] ?>">
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Ngày sinh</label>
                            <input class="form-control" type="date" name="dob" min="1900-01-01" max="2100-01-01" value="<?= $st["dob"] ?>">
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Giới tính</label>
                            <div class="form-check form-check-radio">
                                <?php if($st["gender"] == "Nam"){ ?>
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
                            <label class="bmd-label-floating">Quê quán</label>
                            <input class="form-control" type="text" name="hometown" value="<?= $st["hometown"] ?>">
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Địa chỉ thường trú</label>
                            <input class="form-control" type="text" name="address" value="<?= $st["address"] ?>">
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Địa chỉ hiện nay</label>
                            <input class="form-control" type="text" name="current_address" value="<?= $st["current_address"] ?>">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Họ tên cha</label>
                                    <input type="text" class="form-control" name="father_name" value="<?= $st["father_name"] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nghề nghiệp cha</label>
                                    <input type="text" class="form-control" name="father_job" value="<?= $st["father_job"] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Số điện thoại cha</label>
                                    <input type="text" class="form-control" name="father_phone" value="<?= $st["father_phone"] ?>">
                                </div>
                            </div>
                            <div class="col-lg-6" style="border-left: 1px solid #b3b3b3">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Họ tên mẹ</label>
                                    <input type="text" class="form-control" name="mother_name" value="<?= $st["mother_name"] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nghề nghiệp mẹ</label>
                                    <input type="text" class="form-control" name="mother_job" value="<?= $st["mother_job"] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Số điện thoại mẹ</label>
                                    <input type="text" class="form-control" name="mother_phone" value="<?= $st["mother_phone"] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                            <span></span>
                            <button type="submit" class="btn btn-primary" name="update-student">CẬP NHẬT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-student-<?= $st["student_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Xác nhận xoá <b><?= $st["student_name"] ?></b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Thao tác này sẽ làm mất dữ liệu !<br>Bạn chắc chắn muốn xóa học sinh <b><?= $st["student_name"] ?></b> ?</p>
                </div>
                <div class="modal-footer">
                    <form method="post">
                        <input type="hidden" name="id" value="<?= $st["student_id"] ?>">
                        <input type="hidden" name="name" value="<?= $st["student_name"] ?>">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                        <span></span>
                        <button type="submit" class="btn btn-primary" name="delete-student">CHẤP NHẬN</button>
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



