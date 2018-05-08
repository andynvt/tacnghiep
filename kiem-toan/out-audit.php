<?php
include_once("../database/model/OutAuditLoader.php");
$page = $_GET['page'] == null ? 0 : $_GET['page'];
$action = new OutAuditLoader();
?>
<div class="content">
    <div class="container-fluid">
        <button type="button" class="btn btn-secondary btn-lg" role="button" aria-disabled="true"
                data-toggle="modal" data-target="#addOutAuditModal">
            <i class="material-icons">add_circle_outline</i>
            Thêm phí chi mới
        </button>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">DANH SÁCH PHÍ CHI</h4>
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
                                    Mô tả
                                </th>
                                <th>
                                    Số tiền chi (VND)
                                </th>
                                <th>
                                    Ngày chi
                                </th>
                                <th>
                                    Người xác nhận
                                </th>
                                <th class="text-center">
                                    Thao tác
                                </th>
                                </thead>
                                <tbody id="table-body"><?php echo $action->display($page); ?></tbody>
                            </table>
                        </div>
                        <div id="pagination"><?php echo $action->getPagination(); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->

<div class="modal fade" id="addOutAuditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm phí chi mới</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmAdd">
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Mô tả</label>
                        <input type="text" class="form-control" id="txtDescription" name="outaudit-desc">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Số tiền chi (VND)</label>
                        <input type="number" class="form-control" id="txtOutAudit" name="outaudit-money">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Ngày chi</label>
                        <input type="date" class="form-control" id="txtOutAuditDate" name="outaudit-date">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Người xác nhận</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="outaudit-confirm">
                            <?php $action->loadEmpName(); ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                        <span></span>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="add-out-audit">LƯU LẠI</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detailOutAuditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chi tiết phí chi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Mô tả</label>
                        <input type="text" class="form-control" id="txtDescription" readonly="true">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Số tiền chi (VND)</label>
                        <input type="text" class="form-control" id="txtOutAudit" readonly="true">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Ngày chi</label>
                        <input type="date" class="form-control" id="txtOutAuditDate" readonly="true">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Người xác nhận</label>
                        <input type="text" class="form-control" id="txtConfirmed" readonly="true">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">ĐÓNG</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editOutAuditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form method="post" id="frmEdit">
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Mô tả</label>
                        <input type="text" class="form-control" id="txtDescription" name="outaudit-desc">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Số tiền chi (VND)</label>
                        <input type="number" class="form-control" id="txtOutAudit" name="outaudit-money">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Ngày chi</label>
                        <input type="date" class="form-control" id="txtOutAuditDate" name="outaudit-date">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Người xác nhận</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="outaudit-confirm">
                            <?php $action->loadEmpName(); ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <input name="edit-out-audit" value="edit" type="hidden" class="data-tmp"/>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                        <span></span>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="edit-out-audit">LƯU
                            LẠI
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteOutAuditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form method="post" id="frmDelete">
                    <input name="delete-out-audit" value="edit" type="hidden" class="data-tmp"/>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                    <span></span>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="delete-out-audit">CHẤP
                        NHẬN
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- End Model -->

<script type="text/javascript">
    $(document).ready(function () {
        demo.initDashboardPageCharts();
        demo.initCharts();
    });

    function reloadjQuery() {
        $(".btn-info").on("click", function () {
            var tdata = $(this).closest("tr").find("td");
            var input = $("#detailOutAuditModal").find("input");
            for (var i = 0; i < input.length; i++) {
                input.eq(i).val(tdata.eq(i + 1).text());
            }
        });
        $(".btn-danger").on("click", function () {
            $("#deleteOutAuditModal").find(".data-tmp").val($(this).val());
        });

        $(".btn-success").on("click", function () {
            var tdata = $(this).closest("tr").find("td");
            var select = $("#editOutAuditModal").find("select");
            var input = $("#editOutAuditModal").find("input");
            for (var i = 0; i < input.length; i++) {
                input.eq(i).val(tdata.eq(i + 1).text());
            }

            $("#editOutAuditModal").find(".data-tmp").val($(this).val());
            for (var i = 1; i < tdata.length - 1; i++) {
                select.find("option").filter(function () {
                    return this.text == tdata.eq(i).text();
                }).attr('selected', true);
            }
        });
    }

    function setupModal() {
        var urlInsert = "../database/action/add-out-audit.php?menu=<?=$_GET['menu']?>&page=<?=$page?>";
        var messInsert_sc = "Thêm thành công";
        var messInsert_fl = "Thêm thất bại";

        $("#add-out-audit").on("click", function () {
            submitInsert(urlInsert, $("#frmAdd"), $("#table-body"), $("#pagination"), messInsert_sc, messInsert_fl);
        });

        var urlEdit = "../database/action/update-out-audit.php?menu=<?=$_GET['menu']?>&page=<?=$page?>";
        var messEdit_sc = "Cập nhật thành công";
        var messEdit_fl = "Cập nhật thất bại";
        $("#edit-out-audit").on("click", function () {
            submitEdit(urlEdit, $("#frmEdit"), $("#table-body"), $("#pagination"), messEdit_sc, messEdit_fl);
        });

        var urlDelete = "../database/action/delete-out-audit.php?menu=<?=$_GET['menu']?>&page=<?=$page?>";
        var messDel_sc = "Xóa thành công";
        var messDel_fl = "Xóa thất bại";
        $("#delete-out-audit").on("click", function () {
            submitDelete(urlDelete, $("#frmDelete"), $("#table-body"), $("#pagination"), messDel_sc, messDel_fl);
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

<!--<script type="text/javascript">-->
<!--    $(document).ready(function () {-->
<!--        demo.initDashboardPageCharts();-->
<!--        demo.initCharts();-->
<!--    });-->
<!---->
<!--    $(window).on('load', function () {-->
<!--        $(".btn-info").click(function () {-->
<!--            var modal = $(this).data("target");-->
<!--            var tdata = $(this).closest("tr").find("td");-->
<!--            var input = $(modal).find("input");-->
<!--            for (var i = 0; i < input.length; i++) {-->
<!--                input.eq(i).val(tdata.eq(i + 1).text());-->
<!--            }-->
<!--        });-->
<!--        $(".btn-success").click(function () {-->
<!--            var modal = $(this).data("target");-->
<!--            var tdata = $(this).closest("tr").find("td");-->
<!--            var input = $(modal).find("input");-->
<!--            for (var i = 0; i < input.length; i++) {-->
<!--                input.eq(i).val(tdata.eq(i + 1).text());-->
<!--            }-->
<!--            var confirm = $(modal).find("#btn-update");-->
<!--            confirm.val($(this).val());-->
<!--        });-->
<!--        $(".btn-danger").click(function () {-->
<!--            var modal = $(this).data("target");-->
<!--            $(modal).find("#btn-delete").val($(this).val());-->
<!--        });-->
<!---->
<!--    });-->
<!---->
<!--</script>-->

</html>
