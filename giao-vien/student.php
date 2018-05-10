<?php
include_once("../database/model/Class_per.php");
include_once("../database/model/Student.php");
include_once("../database/model/StudentLoader.php");
include_once("../database/model/Teacher.php");
$class_name = $_SESSION['user'];
$idgv = $class_name['emp_id'];
$empLoader = new StudentLoader();
$student = new Student();
$getStudent = $student->getStudent($idgv);
$teacher = new Teacher();
$class = $teacher->getClass($idgv)[0];
$classes = new Class_per();
?>
<div class="content">
    <div class="container-fluid">
        <button type="button" class="btn btn-secondary btn-lg" role="button" aria-disabled="true"
                data-toggle="modal" data-target="#addModal">
            <i class="material-icons">add_circle_outline</i>
            Thêm thành tích
        </button>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Bảng quản lý học sinh
                            lớp <?php echo $class["grade_name"] . "(" . $class["class_name"] . ")"; ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="filter_tbl">
                                <thead class=" text-primary">
                                <th>
                                    Mã học sinh
                                </th>
                                <th>
                                    Tên học sinh
                                </th>
                                <th>
                                    Ngày sinh
                                </th>
                                <th>
                                    Giới tính
                                </th>
                                <th>
                                    Địa chỉ thường trú
                                </th>
                                <th hidden>
                                    Địa chỉ thường trú
                                </th>
                                <th hidden>
                                    Địa chỉ thường trú
                                </th>
                                <th hidden>
                                    Địa chỉ thường trú
                                </th>
                                <th hidden>
                                    Địa chỉ thường trú
                                </th>
                                <th hidden>
                                    Địa chỉ thường trú
                                </th>
                                <th hidden>
                                    Địa chỉ thường trú
                                </th>
                                <th hidden>
                                    Địa chỉ thường trú
                                </th>
                                <th hidden>
                                    Địa chỉ thường trú
                                </th>
                                <th class="text-center">
                                    Tác vụ
                                </th>
                                </thead>
                                <tbody id="table-body">
                                <?php echo $empLoader->displayAll($getStudent, $class) ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="title">Cập nhật thành tích</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmChuyenLop">
                    <div class="form-control">
                        <label>Chọn thời điểm</label>
                        <select class="select">
                            <?= $empLoader->makeNamhoc($class["year"]) ?>
                        </select>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover" id="filter_tbl">
                            <thead class=" text-primary">
                            <th>
                                STT
                            </th>
                            <th>
                                Tên học sinh
                            </th>
                            <th>
                                Ngày sinh
                            </th>
                            <th>
                                Giới tính
                            </th>

                            <th class="td-actions text-center check-add" style="padding: 0px 8px 21px 0px">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label ">
                                        <input class="form-check-input" type="checkbox" name="checkall"
                                               id="checkAll<?= $st["class_id"] ?>" value="option1">
                                        <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                    </label>
                                </div>
                            </th>
                            </thead>
                            <tbody id="table-body">
                            <?php echo $empLoader->displayThanhTich($getStudent, $class) ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ĐÓNG</button>
                        <span></span>
                        <button type="button" class="btn btn-warning " data-dismiss="modal">Chuyển lớp</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="title"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmChuyenLop">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group" style="display: none">
                                <label for="exampleInput1" class="bmd-label-floating">Mã học sinh</label>
                                <input class="form-control" type="text" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInput2" class="bmd-label-floating">Tên học sinh</label>
                                <input class="form-control" type="text" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Ngày sinh</label>
                                <input class="form-control" type="date" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Giới tính</label>
                                <input class="form-control" type="text" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Quê quán</label>
                                <input class="form-control" type="text" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Địa chỉ</label>
                                <input class="form-control" type="text" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Địa chỉ thường trú</label>
                                <input class="form-control" type="text" value="" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Tên cha</label>
                                <input class="form-control" type="text" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Nghề của cha</label>
                                <input class="form-control" type="text" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Số điện thoại cha</label>
                                <input class="form-control" type="number" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Tên mẹ</label>
                                <input class="form-control" type="text" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Nghề của mẹ</label>
                                <input class="form-control" type="text" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Số điện thoại mẹ</label>
                                <input class="form-control" type="number" value="" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ĐÓNG</button>
                        <span></span>
                        <button type="button" class="btn btn-warning " data-dismiss="modal">Chuyển lớp
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="student_name"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmChonLop" method="post">
                    <div class="form-group">
                        <input type="hidden" id="student-id" name="student-id"/>
                        <input type="hidden" id="class-old-id" name="class-old-id"/>
                        <input type="hidden" id="emp-id" name="emp-id"/>
                        <label for="exampleInput2" class="bmd-label-floating">Chọn lớp để chuyển:</label>
                        <select class="form-control" id="select-class" name="class-id">
                            <?php
                            $classArr = $classes->getClassAndQuantity();
                            foreach ($classArr as $value) {
                                $val = $value["grade_name"] . " (" . $value["class_name"] . ")";
                                $quan = $value["quantity"];
                                echo "<option value='" . $value["class_id"] . "'>" . $val .
                                    "&nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;" .
                                    "&nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;" .
                                    "&nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;" .
                                    "&nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;" .
                                    " Sỉ số hiện tại: " . $quan . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ĐÓNG</button>
                        <span></span>
                        <button type="button" class="btn btn-warning btn-submit" data-dismiss="modal"
                                data-target="#editModal">Chuyển lớp
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        demo.initDashboardPageCharts();
        demo.initCharts();

    });

    function reloadjQuery() {
        $(".btn-info").on("click", function (e) {
            var tdata = $(this).closest("tr").find("td");
            var state = $(this).val();
            if (state == 1) {
                $("#btn-edit").show();
            } else {
                $("#btn-edit").hide();
            }
            $("#title").text(tdata.eq(1).text());
            var input = $("#frmChuyenLop").find("input");
            for (var i = 0; i < input.length; i++) {
                input.eq(i).val(tdata.eq(i).text());
            }
        });
        $(".btn-edit-tb").on("click", function (e) {
            var tdata = $(this).closest("tr").find("td");
            $("#student_name").html("Tên học sinh: " + tdata.eq(1).text());
            $("#student-id").val(tdata.eq(0).text());
            $("#class-old-id").val('<?=$class["class_id"]?>');
            $("#emp-id").val('<?=$idgv?>');
            var url = "../database/action/get-next-class.php";
            retrieve($("#frmChonLop").serialize(), url, function (data) {
                $("#student_name").text("Học sinh " + tdata.eq(1).text() + " đã đủ tuổi để lên " + data["next-class"]);
            })

        });
    }

    function setupModal() {
        var urlEdit = "../database/action/chuyenlop-teacher.php?menu=<?=$_GET['menu']?>";
        var messEdit_sc = "Chuyển lớp thành công";
        var messEdit_fl = "Chuyển lớp thất bại";
        $(".btn-submit").on("click", function () {
            submitEdit(urlEdit, $("#frmChonLop"), $("#table-body"), messEdit_sc, messEdit_fl);
        });
    }

    $(window).on("load", function () {
        reloadjQuery();
        setupModal();
    })

    $(document).ajaxComplete(function (event, request, settings) {
        reloadjQuery();
    })
</script>