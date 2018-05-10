<?php
include_once("../database/model/EmployeeLoader.php");
$user = $_SESSION['user'];
$empLoader = new EmployeeLoader();
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary"
                         style="background: linear-gradient(60deg, #ab47bc, #8e24aa)">
                        <h4 class="card-title ">Thông tin cá nhân</h4>
                        <!--                                    <p class="card-category"> Here is a subtitle for this table</p>-->
                    </div>
                    <div class="card-body">
                        <div class="col-12 col-sm-10 offset-sm-1" id="body-form">
                            <?php echo $empLoader->display($user); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="changePersonal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
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
                    <input value="<?php echo $user['emp_id']; ?>" id="id" hidden name="empId">
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
                        if ($user['gender'] == 'Nam') {
                            echo '<input type="radio" name="gender" value="Nam" checked/>Nam
                                     <span class="circle">
                                        <span class="check"></span>
                                    </span>';
                            echo '<input style="margin-left:60px;" type="radio" name="gender" value="Nữ" />
                                    Nữ
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>';
                        } else {
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
                        <select class="form-control" name=" address">
                            <option><?php echo $user['hometown']; ?></option>
                            <option>Bến Tre</option>
                            <option>Cần Thơ</option>
                            <option>Trà Vinh</option>
                            <option>Kiên Giang</option>
                            <option>Vĩnh Long</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Địa Chỉ</label>
                        <select class="form-control" name=" address">
                            <option><?php echo $user['address']; ?></option>
                            <option>Bến Tre</option>
                            <option>Cần Thơ</option>
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
                            <option>Cần Thơ</option>
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
                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btn-update-info"
                                name="update">CẬP NHẬT
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
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
<script>
    $(window).on("load", function () {
        $("#btn-update-info").click(function () {
            var formData = $("#personal").serialize();
            var urlInsert = "../database/action/update-emp.php?menu=<?=$_GET['menu']?>";
            retrieve(formData, urlInsert, function (data) {
                if (data["success"]) {
                    alertEdit(true, "Đã cập nhật " + data["data"] + "thành công !");
                    var html = data["html"];
                    $("#body-form").html(html);
                }
                else {
                    alertEdit(true, "Cập nhật thất bại !");
                }
            })
        });
    })
</script>