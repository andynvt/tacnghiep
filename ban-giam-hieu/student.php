<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
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
                                $getst = $conn->query($student);
                                if ($getst->num_rows > 0) {
                                    while ($row = $getst->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $row['student_id'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['student_name'] ?>
                                            </td>
                                            <td class="text-primary">
                                                <a href="#">
                                                    <?php echo $row['class_name'] ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?php echo $row['dob'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['gender'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['current_address'] ?>
                                            </td>
                                            <td class="td-actions text-center">
                                                <button type="button" rel="tooltip" class="btn btn-info btn-simple"
                                                        data-toggle="modal"
                                                        data-target="#detail-student-<?php echo $row['student_id'] ?>">
                                                    <i class="material-icons">remove_red_eye</i>
                                                </button>
                                                <button type="button" rel="tooltip" class="btn btn-success btn-simple"
                                                        data-toggle="modal" data-target="#edit-student">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" rel="tooltip" class="btn btn-danger btn-simple"
                                                        data-toggle="modal" data-target="#delete-student">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
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
    <div class="modal fade" id="add-student" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Thêm học sinh mới</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label class="bmd-label-floating">Tên học sinh</label>
                            <input type="text" class="form-control" name="student">
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Ngày sinh</label>
                            <input type="date" class="form-control" name="dob" placeholder="">
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
                                    <input class="form-check-input" type="radio" name="gender" value="Nữ" >
                                    Nữ
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Quê quán</label>
                            <input type="text" class="form-control" name="hometown">
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Địa chỉ thường trú</label>
                            <input type="text" class="form-control" name="address">
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Địa chỉ hiện nay</label>
                            <input type="text" class="form-control" name="current_address">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Họ tên cha</label>
                                    <input type="text" class="form-control" name="father_name">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nghề nghiệp cha</label>
                                    <input type="text" class="form-control" name="father_job">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Số điện thoại cha</label>
                                    <input type="text" class="form-control" name="father_phone">
                                </div>
                            </div>
                            <div class="col-lg-6" style="border-left: 1px solid #b3b3b3">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Họ tên mẹ</label>
                                    <input type="text" class="form-control" name="mother_name">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nghề nghiệp mẹ</label>
                                    <input type="text" class="form-control" name="mother_job">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Số điện thoại mẹ</label>
                                    <input type="text" class="form-control" name="mother_phone">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                            <span></span>
                            <button type="button" class="btn btn-primary">LƯU LẠI</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    $getst = $conn->query($student);
    if($getst->num_rows > 0){
        while($row = $getst->fetch_assoc()){
            ?>
            <div class="modal fade" id="detail-student-<?php echo $row['student_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Chi tiết học sinh
                                <?php echo $row['student_name']?>
                            </h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Họ tên</label>
                                    <input class="form-control disable-modal" type="text" value="<?php echo $row['student_name']?>" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Ngày sinh</label>
                                    <input class="form-control" type="text" value="<?php echo $row['dob']?>" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Giới tính</label>
                                    <input class="form-control" type="text" value="<?php echo $row['gender']?>" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Quê quán</label>
                                    <input class="form-control" type="text" value="<?php echo $row['hometown']?>" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Địa chỉ thường trú</label>
                                    <input class="form-control" type="text" value="<?php echo $row['address']?>" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Địa chỉ hiện nay</label>
                                    <input class="form-control" type="text" value="<?php echo $row['current_address']?>" readonly="readonly">
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Họ tên cha</label>
                                            <input type="text" class="form-control" value="<?php echo $row['farther_name']?>" readonly="readonly">
                                        </div>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Nghề nghiệp cha</label>
                                            <input type="text" class="form-control" value="<?php echo $row['farther_job']?>" readonly="readonly">
                                        </div>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Số điện thoại cha</label>
                                            <input type="text" class="form-control" value="<?php echo $row['farther_phone']?>" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="col-lg-6" style="border-left: 1px solid #b3b3b3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Họ tên mẹ</label>
                                            <input type="text" class="form-control" value="<?php echo $row['morther_name']?>" readonly="readonly">
                                        </div>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Nghề nghiệp mẹ</label>
                                            <input type="text" class="form-control" value="<?php echo $row['morther_job']?>" readonly="readonly">
                                        </div>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Số điện thoại mẹ</label>
                                            <input type="text" class="form-control" value="<?php echo $row['morther_phone']?>" readonly="readonly">
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
            <?php
        }
    }
    ?>
    <div class="modal fade" id="edit-student" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Sửa thông tin học sinh XXX</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label class="bmd-label-floating">Họ tên</label>
                            <input class="form-control" type="text" name="name" value="Nguyễn Văn Tài">
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Ngày sinh</label>
                            <input class="form-control" type="date" name="dob" value="1996-10-22">
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
                                    <input class="form-check-input" type="radio" name="gender" value="Nữ" >
                                    Nữ
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Quê quán</label>
                            <input class="form-control" type="text" name="hometown" value="Sóc Trăng">
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Địa chỉ thường trú</label>
                            <input class="form-control" type="text" name="address" value="Sóc Trăng">
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Địa chỉ hiện nay</label>
                            <input class="form-control" type="text" name="current_address" value="Cần Thơ">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Họ tên cha</label>
                                    <input type="text" class="form-control" name="father_name" value="A">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nghề nghiệp cha</label>
                                    <input type="text" class="form-control" name="father_job" value="A">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Số điện thoại cha</label>
                                    <input type="text" class="form-control" name="father_phone" value="A">
                                </div>
                            </div>
                            <div class="col-lg-6" style="border-left: 1px solid #b3b3b3">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Họ tên mẹ</label>
                                    <input type="text" class="form-control" name="mother_name" value="A">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nghề nghiệp mẹ</label>
                                    <input type="text" class="form-control" name="mother_job" value="A">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Số điện thoại mẹ</label>
                                    <input type="text" class="form-control" name="mother_phone" value="A">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                            <span></span>
                            <button type="button" class="btn btn-primary">CẬP NHẬT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-student" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Xác nhận xoá học sinh XXX</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Thao tác này sẽ làm mất dữ liệu !<br>Bạn chắc chắn muốn xóa học sinh XXX ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                    <span></span>
                    <button type="button" class="btn btn-primary">CHẤP NHẬN</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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



