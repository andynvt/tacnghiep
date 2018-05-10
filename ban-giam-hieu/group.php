<?php
include_once("../database/model/Department.php");
include_once("../database/model/Employee.php");
include_once("../database/model/DepartmentEmployee.php");
$page = $_GET['page'] == null ? 0 : $_GET['page'];
$dep = new Department();
$emp = new Employee();
$depEmp = new DepartmentEmployee();
//$getDep = $department->pagination(10,$_GET['page']);
$getDep = $dep->getAll();
?>

<div class="content">
    <div class="container-fluid">
        <button type="button" class="btn btn-secondary btn-lg" role="button" aria-disabled="true"
                data-toggle="modal" data-target="#add-dep">
            <i class="material-icons">add_circle_outline</i>
            Thêm tổ
        </button>
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($_POST["add-dep"])) {
                    $name = $_POST["name"];

                    $check = $dep->insert($name);
                    if ($check) {
                        echo "<script>alertAdd(true,'Đã thêm <b>" . $name . "</b> thành công!');</script>";
                        echo("<meta http-equiv='refresh' content='3.5'>");
                    } else {
                        echo "<script>alertAdd(false,'Thêm nhân viên thất bại!');</script>";
                    }
                }
                if (isset($_POST["delete-dep"])) {
                    $dep_id = $_POST["id"];
                    $dep_name = $_POST["name"];

                    $check = $dep->delete($id);
                    if ($check) {
                        echo "<script>alertAdd(true,'Đã thêm <b>" . $name . "</b> thành công!');</script>";
                        echo("<meta http-equiv='refresh' content='3.5'>");
                    } else {
                        echo "<script>alertAdd(false,'Thêm nhân viên thất bại!');</script>";
                    }
                }


                ?>
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">DANH SÁCH TỔ</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <th>
                                    ID
                                </th>
                                <th>
                                    Tên Tổ
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
                                foreach ($getDep as $gd) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $gd["dep_id"] ?>
                                        </td>
                                        <td>
                                            <?= $gd["dep_name"] ?>
                                        </td>
                                        <td>
                                            <?php
                                                $no = $depEmp->countEmpByDepId($gd["dep_id"]);
                                                echo $no;
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" rel="tooltip" title="Thêm nhân viên vào tổ"
                                                    class="btn btn-success btn-simple"
                                                    data-toggle="modal" data-target="#add-dep-<?= $gd["dep_id"] ?>">
                                                <i class="material-icons">add</i>
                                            </button>
                                            <button type="button" rel="tooltip" title="Chi tiết tổ"
                                                    class="btn btn-info btn-simple"
                                                    data-toggle="modal" data-target="#detail-dep-<?= $gd["dep_id"] ?>">
                                                <i class="material-icons">remove_red_eye</i>
                                            </button>

                                            <button type="button" rel="tooltip" title="Xóa tổ"
                                                    class="btn btn-danger btn-simple"
                                                    data-toggle="modal" data-target="#delete-dep-<?= $gd["dep_id"] ?>">
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
                        <!--                        <div id="pagination">-->
                        <? //= $getDep->showPagination() ?><!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--    Modal-->
    <div class="modal fade" id="add-dep" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Thêm tổ mới</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <label class="bmd-label-floating">Tên tổ</label>
                            <input type="text" class="form-control" name="name" minlength="2" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                    <span></span>
                    <button type="submit" class="btn btn-primary" name="add-dep">LƯU LẠI</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
foreach ($getDep as $gd) {
    $getEmpNoDep = $emp->getEmpNoDep();
    $getEmp = $emp->getEmpByDepId($gd["dep_id"]);
    ?>
    <div class="modal fade" id="add-dep-<?= $gd["dep_id"] ?>" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm nhân viên vào tổ <?= $gd["dep_name"] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post">
                <div class="modal-body">
                    <table class="table">
                        <thead class=" text-primary">
                        <th>
                            ID
                        </th>
                        <th>
                            Tên
                        </th>
                        <th>
                            Giới tính
                        </th>
                        <th>
                            SĐT
                        </th>

                        <th class="td-actions text-center check-add" style="padding: 0px 8px 21px 0px">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label ">
                                    <input class="form-check-input" type="checkbox" name="checkall"
                                           id="checkAll<?= $gd["dep_id"] ?>" value="option1">
                                    <span class="form-check-sign">
                                                    <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </th>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($getEmpNoDep as $ge) {
                            ?>
                            <tr>
                                <td>
                                    <?= $ge["emp_id"] ?>
                                </td>
                                <td>
                                    <?= $ge["emp_name"] ?>
                                </td>
                                <td>
                                    <?= $ge["gender"] ?>
                                </td>
                                <td>
                                    <?= $ge["phone"] ?>
                                </td>
                                <td class="td-actions text-right">
                                    <div class="form-check ">
                                        <label class="form-check-label check-add">
                                            <input class="form-check-input" type="checkbox" name="ID[]" id="checkItem"
                                                   value="<?= $gd["dep_id"] ?>">
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                                </span>
                                        </label>
                                        <input hidden  name="id_del[]" value="<?= $ge["emp_id"] ?>" >
                                    </div>
                                </td>

                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">ĐÓNG</button>
                    <span></span>
                    <button type="submit" class="btn btn-primary" name="add-tea">Thêm giáo viên</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detail-dep-<?= $gd["dep_id"] ?>" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chi tiết tổ <?= $gd["dep_name"] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST">
                <div class="modal-body">

                    <table class="table">
                        <thead class=" text-primary">
                        <th>
                            ID
                        </th>
                        <th>
                            Tên
                        </th>
                        <th>
                            Giới tính
                        </th>
                        <th>
                            SĐT
                        </th>

                        <th class="td-actions text-center check-add" style="padding: 0px 8px 21px 0px">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label ">
                                    <input class="form-check-input" type="checkbox" name="checkall"
                                           id="checkAll<?= $gd["dep_id"] ?>1" value="option1">
                                    <span class="form-check-sign">
                                                    <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </th>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($getEmp as $ge) {
                            ?>
                            <tr>
                                <td>
                                    <?= $ge["emp_id"] ?>
                                </td>
                                <td>
                                    <?= $ge["emp_name"] ?>
                                </td>
                                <td>
                                    <?= $ge["gender"] ?>
                                </td>
                                <td>
                                    <?= $ge["phone"] ?>
                                </td>
                                <td class="td-actions text-right">
                                    <div class="form-check ">

                                        <label class="form-check-label check-add">
                                            <input class="form-check-input" type="checkbox" name="IDDE[]" id="checkItem"
                                                   value="<?= $gd["dep_id"]?>">
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                                </span>
                                        </label>
                                        <input hidden  name="idclass_del[]" value="<?= $ge["emp_id"] ?>" >

                                    </div>
                                </td>

                            </tr>
                            

                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">ĐÓNG</button>
                    <span></span>
                    <button type="submit" class="btn btn-primary" name="del-tea">Xóa học sinh</button>
                </div>
                </form>
            </div>
        </div>
    </div>



    <div class="modal fade" id="delete-dep-<?= $gd["dep_id"] ?>" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Xác nhận xoá tổ <b><?= $gd["dep_name"] ?></b><b></b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Thao tác này sẽ làm mất dữ liệu !<br>Bạn chắc chắn muốn xoá tổ <b><?= $gd["dep_name"] ?></b> ?</p>
                </div>
                <div class="modal-footer">
                    <form method="post">
                        <input type="hidden" name="id" value="<?= $gd["dep_id"] ?>">
                        <input type="hidden" name="name" value="<?= $gd["dep_name"] ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                        <span></span>
                        <button type="submit" class="btn btn-primary" name="delete-dep">CHẤP NHẬN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



   
    <?php
}
?>

<?php 
if(isset($_POST['add-tea']))
{   
    $checkBox_del = implode(',', $_POST['ID']);
    $idclass_del = implode(',', $_POST['id_del']);              
    $pops = explode(',', $checkBox_del);
    $idclass_del1 = explode(',', $idclass_del);
    // print_r($checkBox_del);
    foreach ($pops as $pop ){
        foreach ($idclass_del1 as $popl ){
        $check_del = $dep->add_tea($popl, $pop);   
        }
    }
    if($check_del){
            // echo("<meta http-equiv='refresh' content='1.5'>");
            echo "<script>alertAdd(true,'Đã xóa thành công!');</script>";
            // header("refresh: 0;");
        }
        else{
            // echo("<meta http-equiv='refresh' content='1.5'>");
            echo "<script>alertAdd(false,'Xóa học sinh thất bại!');</script>";
            // header("refresh: 0;");
        }
}
?>

<?php 
if(isset($_POST['del-tea']))
{   
    $checkBox_del = implode(',', $_POST['IDDE']);
    $idclass_del = implode(',', $_POST['idclass_del']);              
    $pops = explode(',', $checkBox_del);
    $idclass_del1 = explode(',', $idclass_del);
    // print_r($checkBox_del);
    foreach ($pops as $pop ){
        foreach ($idclass_del1 as $popl ){
        $check_del = $dep->delete_tea($popl, $pop);   
        }
    }
    if($check_del){
            // echo("<meta http-equiv='refresh' content='1.5'>");
            echo "<script>alertAdd(true,'Đã xóa thành công!');</script>";
            // header("refresh: 0;");
        }
        else{
            // echo("<meta http-equiv='refresh' content='1.5'>");
            echo "<script>alertAdd(false,'Xóa học sinh thất bại!');</script>";
            // header("refresh: 0;");
        }
}
?>

 <script>
        <?php
        foreach ($getDep as $st) {
        ?>
        $("#checkAll<?= $st["dep_id"] ?>").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
        <?php
        }
        ?>

        <?php
        foreach ($getDep as $st) {
        ?>
        $("#checkAll<?= $st["dep_id"] ?>1").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
        <?php
        }
        ?>
    </script>

<!--    End Modal-->
</div>

