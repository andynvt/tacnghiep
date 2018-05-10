<?php
include_once("../database/model/DepartmentLoader.php");
$page = $_GET['page'] == null ? 0 : $_GET['page'];
$action = new DepartmentLoader();
$department = new Department();
?>
<div class="content">
    <div class="container-fluid">
        <button type="button" class="btn btn-secondary btn-lg" role="button" aria-disabled="true"
                data-toggle="modal" data-target="#add-member">
            <i class="material-icons">add_circle_outline</i>
            Thêm thành viên mới
        </button>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">DANH SÁCH TỔ</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">

                                <th>
                                    STT
                                </th>
                                <th>
                                    Tên Tổ
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

    <!--    Modal-->
    <input type="hidden" id="dep_id">
    <div class="modal fade" id="ViewListModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chi tiết danh sách tổ</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead class=" text-primary">

                        <th>
                            STT
                        </th>
                        <th>
                            Mã
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

                        <th class="text-center">
                            Thao tác
                        </th>
                        </thead>
                        <tbody id="table-body-modal">
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="add-member" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Thêm thành viên mới</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="post">
                        <div class="form-group">
                            <label class="bmd-label-floating">Họ tên nhân viên</label>
                            <select class="form-control" name="emp-id">
                                <?php $action->loadEmpName(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Chọn tổ</label>
                            <select class="form-control" name="dep-id">
                                <?php $action->loadDepName(); ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                            <span></span>
                            <button type="submit" class="btn btn-primary" name="add-emp" data-target="#add-emp">LƯU LẠI</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-member" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Xác nhận xoá <b></b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Thao tác này sẽ làm mất dữ liệu !<br>Bạn chắc chắn muốn xóa thành viên này ? <b></b> ?</p>
                </div>
                <div class="modal-footer">
                    <form method="post">
                        <input type="hidden" name="id" value="<?= $st["student_id"] ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                        <span></span>
                        <button type="submit" class="btn btn-primary" name="delete-student">CHẤP NHẬN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--    End Modal-->
</div>
<script type="text/javascript">
    $(document).ready(function () {
        demo.initDashboardPageCharts();
        demo.initCharts();

    });

    function reloadjQuery() {
        $(".btn-info").on("click", function () {
            $.ajax({
                type: 'post',
                url: 'test.php',
                data: {dep_id: $(this).val()},
                success:function (data) {
                    $("#table-body-modal").html(data);
                }
            });
        });
    }

    $(window).on("load", function () {
        reloadjQuery();
    })
    $(document).ajaxComplete(function (event, request, settings) {
        reloadjQuery();
    })
</script>
