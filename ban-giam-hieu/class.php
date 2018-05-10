<?php
    include_once("../database/model/Student.php");
    $student = new Student();
    $getStudent = $student->getAll();

    include_once("../database/model/Employee.php");
    $emp = new Employee();
    $getEmp = $emp->getAll();

    include_once("../database/model/Class_per.php");
    $class_per = new Class_per();    
    $getClass = $class_per->pagination(10,$_GET['page']);
    $getEmp_name = $class_per->getEMP_Name();
    $getStudent_Name = $class_per->getStudent_Name();
    $getStudent_all = $class_per->getStudent_all();
    $getClass_name = $class_per->getClass();
?>
<div class="content">
    <link rel="stylesheet" href="../ban-giam-hieu/css/modal.css">
    <div class="container-fluid">
        <div class="row">
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
                                    STT
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
                                
                               
                                <th class="text-center">
                                    Thao tác
                                </th>
                                </thead>
                                <tbody>
                                    
                                    <?php
                                        $i=0;
                                        foreach ($getClass->getResult()  as $st) {
                                    ?>
                                <tr>
                                    <td>
                                        <?= ++$i ?>
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
                                    <td>
                                        <?= $st["year"] ?>
                                            
                                    </td>
                                    <td>
                                        <?php
                                        echo $class_per->getCount_student($st["class_id"]);
                                        ?>
                                    </td>
                                    
                                   
                                    <td class="td-actions text-center">
                                        <button type="button" rel="tooltip" title="Thêm học sinh" class="btn btn-success btn-simple"
                                                data-toggle="modal" data-target="#add-class-<?= $st["class_id"] ?>">
                                            <i class="material-icons">add</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Xem chi tiết" class="btn btn-info btn-simple"
                                                data-toggle="modal" data-target="#detail-class-<?= $st["class_id"] ?>">
                                            <i class="material-icons">remove_red_eye</i>
                                        </button>
                                    
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
                        <div id="pagination"><?=$getClass->showPagination()?></div>
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
                   
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Năm học</label>
                        <input type="text" name="#" class="form-control" id="exampleInput1">
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

<?php
    foreach ($getClass->getResult() as $st) {
?>

<div class="modal fade" id="add-class-<?= $st["class_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <th class="text-center">STT</th>
                                <th>Họ và Tên</th>
                                <th>Năm sinh</th>
                                <th>Giới tính</th>
                                <th>Họ tên phụ huynh</th>
                                <th>SĐT phụ huynh</th>
                                <th>Địa chỉ</th>
                                <th class="td-actions text-cente check-add" style="padding: 0px 8px 21px 0px">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label ">
                                            <input class="form-check-input" type="checkbox" name="checkall" id="checkAll<?= $st["class_id"] ?>" value="option1">
                                            <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                        </label>
                                    </div>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=0;
                                    foreach ($getStudent_all as $s) {
                                ?>
                            <tr>
                                <td class="text-center"><?= ++$i ?></td>
                                <td><?= $s["student_name"] ?></td>
                                <td><?= $s["dob"] ?></td>
                                <td><?= $s["gender"] ?></td>
                                <td><?= $s["father_name"] ?></td>
                                <td><?= $s["father_phone"] ?></td>
                                <td><?= $s["current_address"] ?></td>
                                <td class="td-actions text-right">
                                    <div class="form-check ">
                                        <label class="form-check-label check-add">
                                            <input class="form-check-input" type="checkbox" name="ID[]" id="checkItem" value="<?= $s["student_id"] ?>">
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
            <input hidden  name="idclass" value="<?= $st["class_id"] ?>" >
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                <span></span>
                <button type="submit" class="btn btn-primary" name="add-class">Thêm</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="detail-class-<?= $st["class_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Chi tiết Lớp</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post">
            <div class="modal-body">      
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

                 
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Danh sách học sinh</label>
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">STT</th>
                                <th>Họ và Tên</th>
                                <th>Năm Sinh</th>
                                <th>Giớ Tính</th>
                                <th>Họ tên phụ huynh</th>
                                <th>SĐT phụ huynh</th>
                                <th>Địa chỉ</th>
                                <th class="td-actions text-cente check-add" style="padding: 0px 8px 21px 0px">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label ">
                                            <input class="form-check-input" type="checkbox" name="checkall" id="checkAll_del<?= $st["class_id"] ?>" value="option1">
                                            <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                        </label>
                                    </div>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=0;
                                    foreach ($getStudent_Name as $stu) {
                                        if($st["class_id"] == $stu["class_id"])
                                    {?>
                            <tr>
                                <td class="text-center"><?= ++$i ?></td>
                                <td><?= $stu["student_name"] ?></td>
                                <td><?= $stu["dob"] ?></td>
                                <td><?= $stu["gender"] ?></td>
                                <td><?= $stu["father_name"] ?></td>
                                <td><?= $stu["father_phone"] ?></td>
                                <td><?= $stu["current_address"] ?></td>
                                <td class="td-actions text-right">
                                    <div class="form-check ">
                                        <label class="form-check-label check-add">
                                            <input class="form-check-input" type="checkbox" name="IDDEL[]" id="checkItem" value="<?= $stu["student_id"] ?>">
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                                </span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                                <?php                                 
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <input hidden  name="idclass_del" value="<?= $st["class_id"] ?>" >
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">ĐÓNG</button>
                <span></span>
                <button type="submit" class="btn btn-primary" name="del-class">Xóa học sinh</button>
            </div>
            </form>
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
            <form method="post">
            <?php
            if($class_per->getCount_student($st["class_id"])!= 0){?>
            <div class="modal-body">    
                <p>Thao tác này không thể thực hiện !!!<br>Lớp học còn <b><?=$class_per->getCount_student($st["class_id"])?></b> học sinh !!!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                <span></span>
                <!-- <button type="submit" class="btn btn-danger" name="Delete-class">CHẤP NHẬN</button> -->
            </div>
            <?php
            }else{?>
                <div class="modal-body">    
                
               
                <p>Thao tác này sẽ làm mất dữ liệu !<br>Bạn chắc chắn muốn xóa trường này ?</p>
                <input hidden  name="idclass_delete" value="<?= $st["class_id"] ?>" >

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                <span></span>
                <button type="submit" class="btn btn-danger" name="Delete-class">CHẤP NHẬN</button>
            </div>
           <?php 
            }
            ?>

        </form>
        </div>
    </div>
</div>

<?php
    }
?>

    <?php 
        if(isset($_POST['add-class']))
        {   
            $checkBox = implode(',', $_POST['ID']);
            $idclass = $_POST['idclass'];               
            $pops = explode(',', $checkBox);
            foreach ($pops as $pop )
            {
                $check = $class_per->insert($idclass, $pop);   
            }
            if($check){
                    echo("<meta http-equiv='refresh' content='2.5'>");
                    header("refresh: 0;");
                    echo "<script>alertAdd(true,'Đã thêm thành công!');</script>";   
                }
                else{
                    // echo("<meta http-equiv='refresh' content='2.5'>");
                    echo "<script>alertAdd(false,'Thêm học sinh thất bại!');</script>";
                    // header("refresh: 0;");
                }
        }
    ?>

    <?php 
        if(isset($_POST['del-class']))
        {   
            $checkBox_del = implode(',', $_POST['IDDEL']);
            $idclass_del = $_POST['idclass_del'];               
            $pops = explode(',', $checkBox_del);
            // print_r($checkBox_del);
            foreach ($pops as $pop )
            {
                $check_del = $class_per->delete($idclass_del, $pop);   
            }
            if($check_del){
                    echo("<meta http-equiv='refresh' content='1.5'>");
                    echo "<script>alertAdd(true,'Đã xóa thành công!');</script>";
                    header("refresh: 0;");
                }
                else{
                    // echo("<meta http-equiv='refresh' content='1.5'>");
                    echo "<script>alertAdd(false,'Xóa học sinh thất bại!');</script>";
                    // header("refresh: 0;");
                }
        }
    ?>

    <?php 
        if(isset($_POST['Delete-class']) )
        {       
            $idclass_delete = $_POST['idclass_delete']; 
            $check_del = $class_per->delete_class($idclass_delete); 

            if($check_del){
                    echo("<meta http-equiv='refresh' content='1.5'>");
                    echo "<script>alertAdd(true,'Đã xóa thành công!');</script>";
                    header("refresh: 0;");
                }
                else{
                    // echo("<meta http-equiv='refresh' content='1.5'>");
                    echo "<script>alertAdd(false,'Xóa học sinh thất bại!');</script>";
                    // header("refresh: 0;");
                }
        }
    ?>

<!--    End Modal-->
<script>
    <?php
        foreach ($getClass->getResult() as $st) {
    ?>
    $("#checkAll<?= $st["class_id"] ?>").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
    <?php
    }
?>
</script>

<script>
    <?php
        foreach ($getClass->getResult() as $st) {
    ?>
    $("#checkAll_del<?= $st["class_id"] ?>").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
    <?php
    }
?>
</script>






