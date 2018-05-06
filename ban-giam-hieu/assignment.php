<?php
include_once("../database/model/Assignment.php");
include_once("../database/model/Lop.php");
include_once("../database/model/Employee.php");

$assignment = new Assignment();
$lop = new Lop();
$employee = new Employee();
$assign_array = $assignment->getAll();
$class_arr = $lop->getAll();
$emp_arr = $employee->getAll();
?>
<!DOCTYPE html>
<html lang="en">
//head
<?php include_once("../ban-giam-hieu/common/head.php"); ?>
<body class="">
//sidebar
<?php include_once("../ban-giam-hieu/common/sidebar.php"); ?>
<div class="wrapper">
    <div class="main-panel">
        <!-- Navbar -->
        <?php include_once("../ban-giam-hieu/common/navigation.php"); ?>
        <!-- End Navbar -->
        <!-- Modal -->

        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm lịch giảng dạy mới</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="#">
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Niên khóa</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="class-year">
                                    <?php
                                    foreach ($class_arr as $value) {
                                        ?>
                                        <option value="<?= $value["year"] ?>"><?= $value["year"] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Chọn lớp học</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="class-name">
                                    <?php
                                    foreach ($class_arr as $value) {
                                        ?>
                                        <option value="<?= $value["class_id"] ?>"><?= $value["class_name"] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Giáo viên giảng dạy</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="emp-name">
                                    <?php
                                    foreach ($emp_arr as $value) {
                                        ?>
                                        <option value="<?= $value["emp_id"] ?>"><?= $value["emp_name"] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                                <span></span>
                                <button type="submit" class="btn btn-primary" name="add-assignment">LƯU LẠI</button>
                                <?php
                                if (isset($_POST["add-assignment"])) {
                                    $class_id = $_POST["class-name"];
                                    $emp_id = $_POST["employee-name"];
                                    if (!empty($class_id) && !empty($emp_id)) {
                                        $assignment->insert($emp_id, $class_id);
                                    }
                                }
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chi tiết cơ sở vật chất</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleInput2" class="bmd-label-floating">Niên khóa</label>
                                <input class="form-control" type="text"
                                       readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Tên lớp</label>
                                <input class="form-control" type="text"
                                       readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Giáo viên hướng dẫn</label>
                                <input class="form-control" type="text"
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

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sửa thông tin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Niên khóa</label>
                                <select class="form-control" name="class-year">
                                    <?php
                                    foreach ($class_arr as $value) {
                                        ?>
                                        <option value="<?= $value["year"] ?>"><?= $value["year"] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Lớp học</label>
                                <select class="form-control" name="class-name">
                                    <?php
                                    foreach ($class_arr as $value) {
                                        ?>
                                        <option value="<?= $value["class_id"] ?>"><?= $value["class_name"] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Giáo viên giảng dạy</label>
                                <select class="form-control" name="emp-name">
                                    <?php
                                    foreach ($emp_arr as $value) {
                                        ?>
                                        <option value="<?= $value["emp_id"] ?>"><?= $value["emp_name"] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                                <span></span>
                                <button name="update-assignment" id="btn-update" type="submit" class="btn btn-primary">
                                    LƯU LẠI
                                </button>
                                <?php
                                if (isset($_POST["update-assignment"])) {
                                    $assign_id = $_POST["update-assignment"];
                                    $class_id = $_POST["class-name"];
                                    $emp_id = $_POST["emp-name"];
                                    if (!empty($assign_id) && !empty($class_id) && !empty($emp_id)) {
                                        $assignment->update($assign_id, $emp_id, $class_id);
                                    }
                                }
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Xác nhận xóa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Thao tác này sẽ làm mất dữ liệu !<br>Bạn chắc chắn muốn xóa trường này ?</p>
                    </div>
                    <div class="modal-footer">
                        <form method="post">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                            <span></span>
                            <button type="submit" name="delete-assignment" id="btn-delete" class="btn btn-primary">CHẤP
                                NHẬN
                            </button>
                            <?php
                            if (isset($_POST["delete-assignment"])) {
                                $assign_id = $_POST["delete-assignment"];
                                if (!empty($assign_id)) {
                                    $assignment->delete($assign_id);
                                }
                            }
                            ?>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- End Model -->


        <div class="content">
            <div class="container-fluid">
                <button type="button" class="btn btn-secondary btn-lg" role="button" aria-disabled="true"
                        data-toggle="modal" data-target="#addModal">
                    <i class="material-icons">add_circle_outline</i>
                    Thêm lịch mới
                </button>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">DANH SÁCH PHÂN CÔNG GIẢNG DẠY</h4>
                                <!--<p class="card-category"> Here is a subtitle for this table</p>-->
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                        <th>
                                            Số thứ tự
                                        </th>
                                        <th>
                                            Niên khóa
                                        </th>
                                        <th>
                                            Tên lớp
                                        </th>
                                        <th>
                                            Giáo viên giảng dạy
                                        </th>
                                        <th class="text-center">
                                            Thao tác
                                        </th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($assign_array as $value) {
                                            echo "<tr>";
                                            echo "<td>" . ++$i . "</td>";
                                            echo "<td>{$value["year"]}</td>";
                                            echo "<td >{$value["class_name"]}</td>";
                                            echo "<td >{$value["emp_name"]}</td>";
                                            ?>
                                            <td class="td-actions text-center">
                                                <button type="button" rel="tooltip"
                                                        class="btn btn-info"><i class="material-icons">person</i>
                                                </button>
                                                <button value="<?= $value["assign_id"] ?>" type="button" rel="tooltip"
                                                        class="btn btn-success"><i class="material-icons">edit</i>
                                                </button>
                                                <button value="<?= $value["assign_id"] ?>" type="button" rel="tooltip"
                                                        class="btn btn-danger"><i class="material-icons">close</i>
                                                </button>
                                            </td>
                                            <?php
                                            echo "</tr>";
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
        <?php include_once("../ban-giam-hieu/common/footer.php"); ?>
    </div>
</div>
<?php include_once("../ban-giam-hieu/common/staff.php"); ?>
</body>
<?php include_once("../ban-giam-hieu/common/script.php"); ?>
<script type="text/javascript">
    $(document).ready(function () {
        demo.initDashboardPageCharts();
        demo.initCharts();
    });
    $(window).on('load', function () {
        $(".btn-info").click(function () {
            var tdata = $(this).closest("tr").find("td");
            var input = $("#detailModal").find("input");
            for (var i = 0; i < input.length; i++) {
                input.eq(i).val(tdata.eq(i + 1).text());
            }
            $("#detailModal").modal("show");
        });
        $(".btn-danger").click(function () {
            $("#deleteModal").find("#btn-delete").val($(this).val());
            $("#deleteModal").modal("show");
        });
        $(".btn-success").click(function () {
            var tdata = $(this).closest("tr").find("td");
            var select = $("#editModal").find("select");
            var confirm = $("#editModal").find("#btn-update");
            confirm.val($(this).val());
            for (var i = 1; i < tdata.length - 1; i++) {
                select.find("option").filter(function () {
                    return this.text == tdata.eq(i).text();
                }).attr('selected', true);
            }
            $("#editModal").modal("show");
        });
    });
</script>

</html>
