<?php
include_once("../database/model/Employee.php");
$employee = new Employee();
$getOne_emp = $employee->getOne_emp();
$user = $_SESSION['user'];
//print_r($user);
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
                        <div class="col-12 col-sm-10 offset-sm-1" id="body-form">
                            <form style="width: 45%; float: left" method="post">
                                <?php
                                foreach($getOne_emp as $one){
                                if($one['emp_id']==$user['emp_id']){
                                ?>
                                <div class="form-group">
                                    <label class="col-form-label">Họ Tên</label>
                                    <input class="form-control" type="text" value="<?php echo $one['emp_name']; ?>"
                                           readonly>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Năm Sinh</label>
                                    <input class="form-control" type="text" value="<?php echo $one['dob']; ?>"
                                           readonly>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Giới Tính</label>
                                    <input class="form-control" type="text" value="<?php echo $one['gender']; ?>"
                                           readonly/>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">CMND</label>
                                    <input class="form-control" type="text" name="idcard"
                                           value="<?php echo $one['id_card']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Ngày Vào</label>
                                    <input class="form-control" type="text" name="doi"
                                           value="<?php echo $one['doi']; ?>" readonly/>
                                </div>
                            </form>
                            <form style=" width: 45%; float: right;">
                                <div class="form-group">
                                    <label class="col-form-label">Quê Quán</label>
                                    <input class="form-control" type="text" name="hometown"
                                           value="<?php echo $one['hometown']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Địa Chỉ</label>
                                    <input class="form-control" type="text" name="address"
                                           value="<?php echo $one['address']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Địa Chỉ Hiện Tại</label>
                                    <input class="form-control" type="text" name="currAddress"
                                           value="<?php echo $one['current_address']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Điện Thoại</label>
                                    <input class="form-control" type="text" name="phone"
                                           value="<?php echo $one['phone']; ?>" readonly>
                                </div>
                                <?php
                                }
                                }
                                ?>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_POST["update-emp"])) {
    $emp_id= $user['emp_id'];
    $emp_name = $_POST["empname"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $doi = $_POST["doi"];
    $id_card = $_POST["idcard"];
    $hometown = $_POST["hometown"];
    $address = $_POST["address"];
    $current_address = $_POST["currentaddress"];
    $phone = $_POST["phone"];


    $check = $employee->update($emp_id, $emp_name, $dob, $gender, $id_card, $doi, $hometown, $address, $current_address, $phone);

    if($check){
        header("refresh: 0;");
        echo "<script>alertEdit(true,'Đã sửa <b>".$emp_name."</b> thành công!');</script>";
        echo("<meta http-equiv='refresh' content='3.5'>");
    }
    else{
        print_r($check);
        echo "<script>alertEdit(false,'Sửa thông tin học sinh thất bại!');</script>";
    }
}

?>
<div class="modal fade" id="changePersonal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="">Cập nhật thông tin</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" >
                <?php
                foreach($getOne_emp as $one){
                    if($one['emp_id']==$user['emp_id']){
                        ?>
                        <div class="modal-body">
                            <input value="<?= $one['emp_id'] ?>" id="id" hidden name="empId">
                            <div class="form-group">
                                <label class="col-form-label">Họ Tên</label>
                                <input class="form-control" name="empname" type="text" value="<?= $one['emp_name'] ?>">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Năm Sinh</label>
                                <input class="form-control" type="date" name="dob" value="<?php echo $one['dob']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Giới Tính</label>
                                <br>
                                <?php
                                if ($one['gender'] == 'Nam') {
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
                                <input class="form-control" type="text" name="idcard" value="<?php echo $one['id_card']; ?>">

                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Ngày Vào</label>
                                <input class="form-control" type="date" name="doi" value="<?php echo $one['doi']; ?>">

                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Quê Quán</label>
                                <select class="form-control" name="hometown">
                                    <option selected><?php echo $one['hometown']; ?></option>
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
                                    <option selected><?php echo $one['address']; ?></option>
                                    <option>Bến Tre</option>
                                    <option>Cần Thơ</option>
                                    <option>Trà Vinh</option>
                                    <option>Kiên Giang</option>
                                    <option>Vĩnh Long</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Địa Chỉ Hiện Tại</label>
                                <select class="form-control" name="currentaddress">
                                    <option selected>
                                        <?php echo $one['current_address']; ?>
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
                                <input class="form-control" type="text" name="phone" value="<?php echo $one['phone']; ?>">
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                            <span></span>
                            <button type="submit" class="btn btn-primary"  name="update-emp">CẬP NHẬT
                            </button>
                        </div>
                        <?php
                    }}?>
            </form>
        </div>
    </div>
</div>
