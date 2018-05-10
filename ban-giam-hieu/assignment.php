<?php
include_once('../database/model/AssignmentLoader.php');
$page = $_GET['page'] == null ? 0 : $_GET['page'];
$action = new AssignmentLoader();
?>
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
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="filter_tbl">
                                <thead class=" text-primary">
                                <th>
                                    Số thứ tự
                                </th>
                                <th>
                                    Giáo viên giảng dạy
                                </th>
                                <th>
                                    Tên lớp
                                </th>
                                <th>
                                    Niên khóa
                                </th>
                                <th class="text-center">
                                    Thao tác
                                </th>
                                </thead>
                                <tbody id="table-body"><?php echo $action->display($page); ?></tbody>
                            </table>
                        </div>
                        <!--                        <div id="pagination">-->
                        <?php //echo $action->getPagination(); ?><!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                    <form method="post" id="frmAdd">
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Giáo viên giảng dạy</label>
                            <select class="form-control" name="emp-id">
                                <?php $action->loadEmpName(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Chọn lớp học</label>
                            <select class="form-control" name="class-id">
                                <?php $action->loadFullClassName(); ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                            <span></span>
                            <button type="button" class="btn btn-primary" data-dismiss="modal" id="add-assignment">
                                LƯU LẠI
                            </button>
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
                            <label for="exampleInput1" class="bmd-label-floating">Giáo viên hướng dẫn</label>
                            <input class="form-control" type="text"
                                   readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Tên lớp</label>
                            <input class="form-control" type="text"
                                   readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="exampleInput2" class="bmd-label-floating">Niên khóa</label>
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
                    <form id="frmEdit" method="post">
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Giáo viên giảng dạy</label>
                            <select class="form-control" name="emp-id">
                                <?php $action->loadEmpName(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Lớp học</label>
                            <select class="form-control" name="class-id">
                                <?php $action->loadFullClassName(); ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <input name="assign-id" value="delete" type="hidden" class="data-tmp"/>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" name="assign-id">ĐÓNG
                            </button>
                            <span></span>
                            <button type="button" class="btn btn-primary" data-dismiss="modal" id="btn-edit">
                                LƯU LẠI
                            </button>
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
                    <form id="frmDelete" method="post">
                        <input name="assign-id" value="delete" type="hidden" class="data-tmp"/>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                        <span></span>
                        <button type="button" data-dismiss="modal" id="btn-delete" class="btn btn-primary">
                            CHẤP NHẬN
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Model -->
</div>
<script type="text/javascript">
    $(document).ready(function () {
        demo.initDashboardPageCharts();
        demo.initCharts();

    });

    function reloadjQuery() {
        $(".btn-info").on("click", function () {
            var tdata = $(this).closest("tr").find("td");
            var input = $("#detailModal").find("input");
            for (var i = 0; i < input.length; i++) {
                input.eq(i).val(tdata.eq(i + 1).text());
            }
        });
        $(".btn-danger").on("click", function () {
            $("#deleteModal").find(".data-tmp").val($(this).val());
        });

        $(".btn-success").on("click", function () {
            var tdata = $(this).closest("tr").find("td");
            var select = $("#editModal").find("select");
            $("#editModal").find(".data-tmp").val($(this).val());
            for (var i = 1; i < select.length; i++) {
                select.find("option").filter(function () {
                    return this.text == tdata.eq(i).text();
                }).attr('selected', true);
            }
        });
    }

    function setupModal() {
        var urlInsert = "../database/action/add-assign.php?menu=<?=$_GET['menu']?>&page=<?=$page?>";
        var messInsert_sc = "Thêm lịch giảng dạy thành công";
        var messInsert_fl = "Thêm lịch giảng dạy thất bại";

        $("#add-assignment").on("click", function () {
            submitInsert(urlInsert, $("#frmAdd"), $("#table-body"), messInsert_sc, messInsert_fl);
        });

        var urlEdit = "../database/action/update-assign.php?menu=<?=$_GET['menu']?>&page=<?=$page?>";
        var messEdit_sc = "Cập nhật lịch giảng dạy thành công";
        var messEdit_fl = "Cập nhật lịch giảng dạy thất bại";
        $("#btn-edit").on("click", function () {
            submitEdit(urlEdit, $("#frmEdit"), $("#table-body"), messEdit_sc, messEdit_fl);
        });

        var urlDelete = "../database/action/delete-assign.php?menu=<?=$_GET['menu']?>&page=<?=$page?>";
        var messDel_sc = "Xóa lịch giảng dạy thành công";
        var messDel_fl = "Xóa lịch giảng dạy thất bại";
        $("#btn-delete").on("click", function () {
            submitDelete(urlDelete, $("#frmDelete"), $("#table-body"), messDel_sc, messDel_fl);
        });
    }

    $(window).on("load", function () {
        setupModal();
        reloadjQuery();
    })

    $(document).ajaxComplete(function (event, request, settings) {
        reloadjQuery();
    })
</script>
