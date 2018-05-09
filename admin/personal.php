<?php
    $user = $_SESSION['user'];
?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary" style="background: linear-gradient(60deg, #ab47bc, #8e24aa)">
                            <h4 class="card-title ">Thông tin cá nhân</h4>
                            <!--                                    <p class="card-category"> Here is a subtitle for this table</p>-->
                        </div>
                        <div class="card-body">
                            <div class="col-12 col-sm-10 offset-sm-1">
                                <!-- Personal pane START -->

                                <form style="width: 45%; float: left" method="post">

                                    <div class="form-group">
                                        <label class="col-form-label">Họ Tên</label>
                                        <input class="form-control" type="text" value="<?php echo $user['emp_name']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Năm Sinh</label>
                                        <input class="form-control" type="text" value="<?php echo $user['dob']; ?>" readonly>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Giới Tính</label>
                                        <input class="form-control" type="text" value="<?php echo $user['gender']; ?>" readonly/>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">CMND</label>
                                        <input class="form-control" type="text" name="idcard" value="<?php echo $user[ 'id_card']; ?>" readonly>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Ngày Vào</label>
                                        <input class="form-control" type="text" name="doi" value="<?php echo $user['doi']; ?>" readonly>

                                    </div>

                                </form>
                                <form style=" width: 45%; float: right;">


                                    <div class="form-group">
                                        <label class="col-form-label">Quê Quán</label>
                                        <input class="form-control" type="text" name="hometown" value="<?php echo $user['hometown']; ?>" readonly>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Địa Chỉ</label>
                                        <input class="form-control" type="text" name="address" value="<?php echo $user['address']; ?>" readonly>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Địa Chỉ Hiện Tại</label>
                                        <input class="form-control" type="text" name="currAddress" value="<?php echo $user['current_address']; ?>" readonly>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Điện Thoại</label>
                                        <input class="form-control" type="text" name="phone" value="<?php echo $user['phone']; ?>" readonly>

                                    </div>

                                </form>
                                <form style="width: 100%; float:left; padding-left: 15%;">
                                    <div class="form-group row">
                                        <div class="offset-xs-0 offset-sm-3 col-12 col-sm-9 mt-3">
                                            <input id="btnupdate" name="" data-action="open" type="button" class="btn btn-primary" data-toggle="modal" data-target="#changePersonal" value="Cập Nhật">
                                            <input id="close" data-action="open" type="button" class="btn btn-primary" value="Thoát">
                                        </div>

                                    </div>
                                </form>


                            </div>

                            <!-- Profile tabs END -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    $host = "localhost";
    $db_name = "preschool";
    $username = "root";
    $password = "";
    $table_name = "employee";
    $conn = new mysqli($host, $username, $password, $db_name);
    if ($conn->connect_error) {
        die($conn->connect_error());
    }
    mysqli_set_charset($conn, 'utf8');

    if (isset($_POST["update"])) {
        $id = $user['emp_id'];
        $emp_name = $_POST["empName"];
        $dob = $_POST["dob"];
        $gender = $_POST["gender"];
        $id_card = $_POST["id_card"];
        $doi = $_POST["doi"];
        $hometown = $_POST["hometown"];
        $address = $_POST["address"];
        $current_address = $_POST["current_address"];
        $phone = $_POST["phone"];

        $query = "UPDATE employee SET `emp_name`='$emp_name', `dob`='$dob', `gender`='$gender',`id_card`='$id_card', `doi`='$doi', `hometown`='$hometown', `address`='$address',`current_address`='$current_address', `phone`='$phone' WHERE `emp_id` = $id";
        if ($conn->query($query)===true) {
                echo "<script>alertEdit(true,'Đã sửa <b>" . $emp_name . "</b> thành công!');</script>";
            }
            else {
            echo "<script>alertEdit(false,'Sửa thông tin nhân viên thất bại!');</script>";
        }
    }

?>
    <div class="modal fade" id="changePersonal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Cập nhật thông tin</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="personal">
                        <div class="form-group">
                            <label class="col-form-label">Họ Tên</label>
                            <input class="form-control" name="empName" type="text" value="<?php echo $user['emp_name']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Năm Sinh</label>
                            <input class="form-control" type="date" name="dob" value="<?php echo $user['dob']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Giới Tính</label>
                            <br>
                            <?php
                                if($user['gender']=='Nam'){
                                    echo '<input type="radio" name="gender" value="Nam" checked/>Nam
                                     <span class="circle">
                                        <span class="check"></span>
                                    </span>';
                                    echo '<input style="margin-left:60px;" type="radio" name="gender" value="Nữ" />
                                    Nữ
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>';
                                }
                                else {
                                    echo '<input type="radio" name="gender" value="Nam"/>Nam
                                     <span class="circle">
                                        <span class="check"></span>
                                    </span>';
                                    echo '<input style="margin-left:60px;" type="radio" name="gender" value="Nữ" checked/>
                                    Nữ
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>';
                                }
                                ?>

                        </div>
                        <div class="form-group">
                            <label class="col-form-label">CMND</label>
                            <input class="form-control" type="text" name="id_card" value="<?php echo $user['id_card']; ?>">

                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Ngày Vào</label>
                            <input class="form-control" type="date" name="doi" value="<?php echo $user['doi']; ?>">

                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Quê Quán</label>
                            <select class="form-control" name=" hometown">
                                 <option><?php echo $user[ 'hometown']; ?></option>
                                  <option>Bến Tre</option>
                                  <option>Trà Vinh</option>
                                  <option>Kiên Giang</option>
                                  <option>Vĩnh Long</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Địa Chỉ</label>
                            <select class="form-control" name=" address">
                                 <option><?php echo $user[ 'address']; ?></option>
                                  <option>Bến Tre</option>
                                  <option>Trà Vinh</option>
                                  <option>Kiên Giang</option>
                                  <option>Vĩnh Long</option>
                                </select>

                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Địa Chỉ Hiện Tại</label>
                            <select class="form-control" name="current_address">
                                    <option>
                                        <?php echo $user['current_address']; ?>
                                    </option>
                                    <option>Bến Tre</option>
                                    <option>Trà Vinh</option>
                                    <option>Kiên Giang</option>
                                    <option>Vĩnh Long</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Điện Thoại</label>
                            <input class="form-control" type="text" name="phone" value="<?php echo $user['phone']; ?>">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                            <span></span>
                            <button type="submit" class="btn btn-primary" id="update" name="update">CẬP NHẬT</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Đổi mật khẩu</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Mật khẩu cũ</label>
                            <input type="password" class="form-control" id="exampleInput1" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Mật khẩu mới</label>
                            <input type="password" class="form-control" id="exampleInput1" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" id="exampleInput1" required>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                            <span></span>
                            <button type="button" class="btn btn-primary">Lưu Lại</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
