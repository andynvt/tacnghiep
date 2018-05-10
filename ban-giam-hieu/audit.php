<?php
include_once("../database/model/InAuditLoader.php");
include_once("../database/model/OutAuditLoader.php");

$pageInAudit = $_GET['page'] == null ? 0 : $_GET['page'];
$pageOutAudit = $_GET['page'] == null ? 0 : $_GET['page'];
$inAuditLoader = new InAuditLoader();
$outAuditLoader = new OutAuditLoader();
?>

<div class="content">
    <!-- Modal -->
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
    <!-- End Modal -->

    <button type="button" class="btn btn-primary btn-lg" role="button" aria-disabled="true" id="btnInAudit">PHÍ THU
    </button>
    <button type="button" class="btn btn-secondary btn-lg" role="button" aria-disabled="true" id="btnOutAudit">PHÍ CHI
    </button>

    <div class="container-fluid">
        <div class="row" id="formInAudit">
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
                                <tbody id="table-body"><?php echo $inAuditLoader->viewOnly($pageInAudit); ?></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="formOutAudit" style="display: none">
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
                                <tbody id="table-body"><?php echo $outAuditLoader->viewOnly($pageInAudit); ?></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            demo.initDashboardPageCharts();
            demo.initCharts();
        });

        $(window).on('load', function () {
            $(".btn-info").click(function () {
                var modal = $(this).data("target");
                var tdata = $(this).closest("tr").find("td");
                var input = $(modal).find("input");
                for (var i = 0; i < input.length; i++) {
                    input.eq(i).val(tdata.eq(i + 1).text());
                }
            });
        });

        $("#btnInAudit").click(function () {
            $("#btnOutAudit").removeClass('btn-primary').addClass('btn-secondary');
            $("#btnInAudit").removeClass('btn-secondary').addClass('btn-primary');
            $("#formOutAudit").hide();
            $("#formInAudit").show();
        });

        $("#btnOutAudit").click(function () {
            $("#btnInAudit").removeClass('btn-primary').addClass('btn-secondary');
            $("#btnOutAudit").removeClass('btn-secondary').addClass('btn-primary');
            $("#formInAudit").hide();
            $("#formOutAudit").show();
        });

    </script>
</div>
