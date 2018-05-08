<?php
include_once("../database/model/InAuditLoader.php");
$page = $_GET['page'] == null ? 0 : $_GET['page'];
$action = new InAuditLoader();

?>
<div class="content">
    <div class="container-fluid">
        <button type="button" class="btn btn-secondary btn-lg" role="button" aria-disabled="true"
                data-toggle="modal" data-target="#addInAuditModal">
            <i class="material-icons">add_circle_outline</i>
            Thêm phí thu mới
        </button>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">DANH SÁCH PHÍ THU</h4>
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
                                    Số tiền thu (VND)
                                </th>
                                <th>
                                    Ngày thu
                                </th>
                                <th>
                                    Người đóng tiền
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
<div class="modal fade" id="addInAuditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm phí thu mới</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmAdd">
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Mô tả</label>
                        <input type="text" class="form-control" id="txtDescription" name="inaudit-desc">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Số tiền thu (VND)</label>
                        <input type="number" class="form-control" id="txtInAudit" name="inaudit-money">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Ngày thu</label>
                        <input type="date" class="form-control" id="txtInAuditDate" name="inaudit-date">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Người đóng tiền</label>
                        <input type="text" class="form-control" id="txtPayer" name="inaudit-payer">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Người xác nhận</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="inaudit-confirm">
                            <?php $action->loadEmpName(); ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                        <span></span>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="add-in-audit">LƯU LẠI</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detailInAuditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chi tiết phí thu</h5>
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
                        <label for="exampleFormControlSelect1">Số tiền thu (VND)</label>
                        <input type="text" class="form-control" id="txtInAudit" readonly="true">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Ngày thu</label>
                        <input type="date" class="form-control" id="txtInAuditDate" readonly="true">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Người đóng tiền</label>
                        <input type="text" class="form-control" id="txtPayer" readonly="true">
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

<div class="modal fade" id="editInAuditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <input type="text" class="form-control" id="txtDescription" name="inaudit-desc">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Số tiền thu (VND)</label>
                        <input type="number" class="form-control" id="txtInAudit" name="inaudit-money">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Ngày thu</label>
                        <input type="date" class="form-control" id="txtInAuditDate" name="inaudit-date">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Người đóng tiền</label>
                        <input type="text" class="form-control" id="txtPayer" name="inaudit-payer">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Người xác nhận</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="inaudit-confirm">
                            <?php $action->loadEmpName(); ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <input name="edit-in-audit" value="edit" type="hidden" class="data-tmp"/>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                        <span></span>
                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="edit-in-audit">LƯU
                            LẠI
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteInAuditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <input name="delete-in-audit" value="delete" type="hidden" class="data-tmp"/>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                    <span></span>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="delete-in-audit">CHẤP NHẬN</button>
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
            var input = $("#detailInAuditModal").find("input");
            for (var i = 0; i < input.length; i++) {
                input.eq(i).val(tdata.eq(i + 1).text());
            }
        });
        $(".btn-danger").on("click", function () {
            $("#deleteInAuditModal").find(".data-tmp").val($(this).val());
        });

        $(".btn-success").on("click", function () {
            var tdata = $(this).closest("tr").find("td");
            var select = $("#editInAuditModal").find("select");
            var input = $("#editInAuditModal").find("input");
            for (var i = 0; i < input.length; i++) {
                input.eq(i).val(tdata.eq(i + 1).text());
            }

            $("#editInAuditModal").find(".data-tmp").val($(this).val());
            for (var i = 1; i < tdata.length - 1; i++) {
                select.find("option").filter(function () {
                    return this.text == tdata.eq(i).text();
                }).attr('selected', true);
            }
        });
    }

    function setupModal() {
        var urlInsert = "../database/action/add-in-audit.php?menu=<?=$_GET['menu']?>&page=<?=$page?>";
        var messInsert_sc = "Thêm thành công";
        var messInsert_fl = "Thêm thất bại";

        $("#add-in-audit").on("click", function () {
            submitInsert(urlInsert, $("#frmAdd"), $("#table-body"), $("#pagination"), messInsert_sc, messInsert_fl);
        });

        var urlEdit = "../database/action/update-in-audit.php?menu=<?=$_GET['menu']?>&page=<?=$page?>";
        var messEdit_sc = "Cập nhật thành công";
        var messEdit_fl = "Cập nhật thất bại";
        $("#edit-in-audit").on("click", function () {
            submitEdit(urlEdit, $("#frmEdit"), $("#table-body"), $("#pagination"), messEdit_sc, messEdit_fl);
        });

        var urlDelete = "../database/action/delete-in-audit.php?menu=<?=$_GET['menu']?>&page=<?=$page?>";
        var messDel_sc = "Xóa thành công";
        var messDel_fl = "Xóa thất bại";
        $("#delete-in-audit").on("click", function () {
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
