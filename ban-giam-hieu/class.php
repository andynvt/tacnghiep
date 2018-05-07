<?php
    include_once("../database/model/Student.php");
    $student = new Student();
    $getStudent = $student->getAll();

    include_once("../database/model/Employee.php");
    $emp = new Employee();
    $getEmp = $emp->getAll();

    include_once("../database/model/Class_per.php");
    $class_per = new Class_per();    
    $getClass = $class_per->getAll();
    $getEmp_name = $class_per->getEMP_Name();
    $getStudent_Name = $class_per->getStudent_Name();
    $getStudent_all = $class_per->getStudent_all();


    
?>
<div class="content">
    <link rel="stylesheet" href="../ban-giam-hieu/css/modal.css">
    <div class="container-fluid">
        <div class="row">
            <!-- <div class="col-md-12">
                <button type="button" class="btn btn-secondary btn-lg" role="button" aria-disabled="true"
                        data-toggle="modal" data-target="#addModal-class">
                    <i class="material-icons">add_circle_outline</i>
                    Thêm lớp mới
                </button>
            </div> -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary"
                         style="background: linear-gradient(60deg, #ab47bc, #8e24aa)">
                        <h4 class="card-title ">Bảng quản lý lớp học</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class=" text-primary">
                                <th>
                                    ID
                                </th>

                                <th>
                                    Lớp
                                </th>
                                <th>
                                    Các giáo viên phụ trách
                                </th>
                                <th>
                                    Năm học
                                </th>
                                <th>
                                    Số lượng
                                </th>
                                
                                <!-- <th class="text-center">
                                    Phòng
                                </th> -->
                                <th class="text-center">
                                    Thao tác
                                </th>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($getClass as $st) {
                                    ?>
                                <tr>
                                    <td>
                                        <?= $st["class_id"] ?>
                                    </td>

                                    <td class="text-primary">
                                        <?= $st["class_name"] ?>
                                    </td>
                                    <td>
                                        <?php
                                        foreach ($getEmp_name as $emp) {
                                            if($emp["class_id"] == $st["class_id"]){
                                                $text = $emp["emp_name"]." <br>";
                                                echo $text;   
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td><?= $st["year"] ?></td>
                                    <td>
                                        <?php
                                        echo $class_per->getCount_student($st["class_id"]);
                                        ?>
                                    </td>
                                    
                                    <!-- <td class="text-center">
                                        12B1
                                    </td> -->
                                    <td class="td-actions text-center">
                                        <button type="button" rel="tooltip" title="Thêm học sinh" class="btn btn-success btn-simple"
                                                data-toggle="modal" data-target="#add-class">
                                            <i class="material-icons">add</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Xem chi tiết" class="btn btn-info btn-simple"
                                                data-toggle="modal" data-target="#detail-class-<?= $st["class_id"] ?>">
                                            <i class="material-icons">remove_red_eye</i>
                                        </button>
                                        <!-- <button type="button" rel="tooltip" class="btn btn-success btn-simple"
                                                data-toggle="modal" data-target="#edit-class-<?= $st["class_id"] ?>">
                                            <i class="material-icons">edit</i>
                                        </button> -->
                                        <button type="button" rel="tooltip" title="Xóa lớp" class="btn btn-danger btn-simple"
                                                data-toggle="modal" data-target="#delete-class-<?= $st["class_id"] ?>">
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
</div>
<!--    Modal-->

<div class="modal fade" id="addModal-class" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Thêm lớp học mới</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Lớp</label>
                        <input type="text" name="lop" class="form-control" id="exampleInput1">
                    </div>
                    
                    <div class="form-group ">
                      <label for="inputState">Tên giáo viên</label>
                      <select id="inputState" class="form-control">
                        <option selected>Chọn giáo viên</option>
                        <?php
                            foreach ($getEmp as $e) {
                        ?>
                        <option><?= $e["emp_name"] ?></option>
                        <?php
                                }
                                ?>
                      </select>
                    </div>
                    <!-- <div class="form-group">
                        <label for="exampleFormControlSelect1">Giới tính</label>
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="nam" >
                                        Nam
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="nu" checked>
                                        Nữ
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div> -->
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Năm học</label>
                        <input type="text" name="#" class="form-control" id="exampleInput1">
                    </div>
                   <!--  <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Số lượng học sinh</label>
                        <input type="number" name="#" class="form-control" id="exampleInput1">
                    </div>
 -->
                    <!-- <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Phòng</label>
                        <input type="text" name="#" class="form-control" id="exampleInput1">
                    </div> -->

                
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



<div class="modal fade" id="add-class" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Thêm học sinh</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Danh sách học sinh</label>
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Họ và Tên</th>
                                <th>Năm sinh</th>
                                <th>Giớ tính</th>
                                <th>Họ tên phụ huynh</th>
                                <th>SĐT phụ huynh</th>
                                <th>Địa chỉ</th>
                                <th class="td-actions text-cente check-add" style="padding: 0px 8px 21px 0px">
                                    
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label ">
                                            <input class="form-check-input" type="checkbox" name="checkall" id="checkAll" value="option1">
                                            <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                        </label>
                                    </div>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($getStudent_all as $s) {
                                ?>
                            <tr>
                                <td class="text-center"><?= $s["student_id"] ?></td>
                                <td><?= $s["student_name"] ?></td>
                                <td><?= $s["dob"] ?></td>
                                <td><?= $s["gender"] ?></td>
                                <td><?= $s["father_name"] ?></td>
                                <td><?= $s["father_phone"] ?></td>
                                <td><?= $s["current_address"] ?></td>
                                <td class="td-actions text-right">
                                    <div class="form-check ">
                                        <label class="form-check-label check-add">
                                            <input class="form-check-input" type="checkbox" name="<?= $s["student_id"] ?>" id="checkItem" value="option1">
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                                </span>
                                        </label>
                                    </div>

                                </td>

                            </tr>
                           
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>

                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                <span></span>
                <button type="button" class="btn btn-primary" name="add-class">Thêm</button>
            </div>
            </form>
        </div>
    </div>
</div>



<?php
    foreach ($getClass as $st) {
?>
<div class="modal fade" id="detail-class-<?= $st["class_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Chi tiết Lớp</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Lớp</label>
                        <input class="form-control" type="text" value="<?= $st["class_name"] ?>" readonly="readonly">
                    </div>
                    <?php
                        foreach ($getEmp_name as $emp) {
                            if($emp["class_id"] == $st["class_id"]){?>
                                <div class="form-group">
                                    <label for="exampleInput1" class="bmd-label-floating">Tên giáo viên</label>
                                    <input class="form-control" type="text" value="<?= $emp["emp_name"] ?>" readonly="readonly">
                                </div>
                                
                                <?php  
                                }
                            }
                    ?>        
                    <!-- <div class="form-group">
                        <label for="exampleFormControlSelect1">Giới tính</label>
                        <div class="row">
                            <div class="col-lg-2 col-md-2">
                                <div class="form-check form-check-radio ">
                                    <label class="form-check-label">
                                        <input class="form-check-input" 
                                        <?php
                                        if ($st["gender"] ==="Nam") { ?>
                                            checked
                                        <?php   
                                        }
                                        ?>
                                        type="radio"  name="nam" id="exampleRadios1" disabled value="Nam" >
                                        Nam
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                    
                                    
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input"
                                        <?php
                                        if ($st["gender"] ==="Nữ") { ?>
                                            checked
                                        <?php   
                                        }
                                        ?>
                                         type="radio"  name="nu" id="exampleRadios2" disabled value="Nữ" >
                                        Nữ
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Năm học</label>
                        <input class="form-control" type="text" value="<?= $st["year"]?>" readonly="readonly">
                    </div>

                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Số lượng học sinh</label>
                        <input class="form-control" type="text" value="<?php
                                        echo $class_per->getCount_student($st["class_id"]);
                                        ?>" readonly="readonly">
                    </div>

                   <!--  <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Phòng</label>
                        <input class="form-control" type="text" value="12B1" readonly="readonly">
                    </div> -->
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Danh sách học sinh</label>
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Họ và Tên</th>
                                <th>Năm Sinh</th>
                                <th>Giớ Tính</th>
                                <th>Họ tên cha/mẹ</th>
                                <th>SĐT cha/mẹ</th>
                                <th>Địa chỉ</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=0;
                                    foreach ($getStudent_Name as $stu) {
                                        if($st["class_id"] == $stu["class_id"])
                                    {?>
                            <tr>
                                <td class="text-center"><?= $stu["student_id"] ?></td>
                                <td><?= $stu["student_name"] ?></td>
                                <td><?= $stu["dob"] ?></td>
                                <td><?= $stu["gender"] ?></td>
                                <td><?= $stu["father_name"] ?></td>
                                <td><?= $stu["father_phone"] ?></td>
                                <td><?= $stu["current_address"] ?></td>

                            </tr>
                            
                                <?php                                 
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">ĐÓNG</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="edit-class-<?= $st["class_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Sửa thông tin</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <form>
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Lớp</label>
                            <input type="text" name="lop" class="form-control" value="<?= $st["class_name"] ?>" id="exampleInput1">
                        </div>

                        <div class="form-group ">
                            <?php
                            foreach ($getEmp_name as $emp) {
                                if($emp["class_id"] == $st["class_id"]){?>
                                    <label for="inputState">Tên giáo viên</label>
                                    <select id="inputState" class="form-control">
                                    <option selected><?= $emp["emp_name"] ?></option>    
                            <?php
                            foreach ($getEmp as $e) {
                            ?>
                            <option><?= $e["emp_name"] ?></option>
                            <?php
                            }
                            ?>
                                    </select>
                           <?php  
                                }
                            }
                            ?>
                        </div>
                        <!-- <div class="form-group">
                            <label class="bmd-label-floating">Giới tính</label>
                            <div class="form-check form-check-radio">
                                <?php if($s["gender"] == "Nam"){ ?>
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
                        </div> -->
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Năm học</label>
                            <input type="" name="#" class="form-control" value="<?= $st["year"] ?>" id="exampleInput1">
                        </div>
                        <!-- <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Số lượng học sinh</label>
                            <input type="number" name="#" class="form-control" value="20" id="exampleInput1">
                        </div> -->

                       <!--  <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Phòng</label>
                            <input type="text" name="#" class="form-control" value="12B1" id="exampleInput1">
                        </div> -->

                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                        <span></span>
                        <button type="button" class="btn btn-primary">CẬP NHẬT</button>
                    </div>
                    </form>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="delete-class-<?= $st["class_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Xác nhận xóa</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Thao tác này sẽ làm mất dữ liệu !<br>Bạn chắc chắn muốn xóa trường này ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                <span></span>
                <button type="button" class="btn btn-primary">CHẤP NHẬN</button>
            </div>
        </div>
    </div>
</div>

<?php
    }
?>

                <?php
                if (isset($_POST["add-class"])) {
                    for ($j=0; $j < count($_POST['lol']);$j++) 
                        {
                    $insert=mysql_query("INSERT INTO castvote (candidate) VALUES '".$_POST['lol'][$j]."')");
                    }

                    
                    if($check){
                        echo "<script>alertAdd(true,'Đã thêm <b>".$name."</b> thành công!');</script>";
                    }
                    else{
                        echo "<script>alertAdd(false,'Thêm học sinh thất bại!');</script>";
                    }
                }
                // if (isset($_POST["update-student"])) {
                //     $id = $_POST["id"];
                //     $name = $_POST["name"];
                //     $dob = $_POST["dob"];
                //     $gender = $_POST["gender"];
                //     $hometown = $_POST["hometown"];
                //     $address = $_POST["address"];
                //     $current_address = $_POST["current_address"];
                //     $father_name = $_POST["father_name"];
                //     $father_job = $_POST["father_job"];
                //     $father_phone = $_POST["father_phone"];
                //     $mother_name = $_POST["mother_name"];
                //     $mother_job = $_POST["mother_job"];
                //     $mother_phone = $_POST["mother_phone"];

                //     $check = $student->update($id, $name, $dob, $gender, $hometown, $address, $current_address, $father_name, $father_job, $father_phone, $mother_name, $mother_job, $mother_phone);

                //     if($check){
                //         echo "<script>alertEdit(true,'Đã sửa <b>".$name."</b> thành công!');</script>";
                //     }
                //     else{
                //         echo "<script>alertEdit(false,'Sửa thông tin học sinh thất bại!');</script>";
                //     }
                // }
                // if (isset($_POST["delete-student"])) {
                //     $id = $_POST["id"];
                //     $check = $student->delete($id);
                //     if($check){
                //         echo "<script>alertDelete(true,'Xoá <b>".$name."</b> thành công!');</script>";
                //     }
                //     else{
                //         echo "<script>alertDelete(false,'Xoá học sinh thất bại!');</script>";
                //     }
                // }

                ?>

<!--    End Modal-->
<script>
    $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>

