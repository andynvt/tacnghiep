<?php
include_once "../database/model/Database.php";
include_once "../database/model/Audit.php";
include_once "../database/model/Employee.php";

$inAudit = new InAudit();
$emp = new Employee();
$inAudit_array = $inAudit->loadAll();
$emp_name_arr = $emp->getAll();
?>

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
                <form method="post" action="#">
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
                            <?php
                            foreach ($emp_name_arr as $value) {
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
                        <button type="submit" class="btn btn-primary" name="add-in-audit">LƯU LẠI</button>
                        <?php
                        if (isset($_POST["add-in-audit"])) {
                            $ia_desc = $_POST["inaudit-desc"];
                            $money = $_POST["inaudit-money"];
                            $date = $_POST["inaudit-date"];
                            $payer = $_POST["inaudit-payer"];
                            $emp_id = $_POST["inaudit-confirm"];
                            if (!empty($ia_desc) && !empty($money) && !empty($date) && !empty($payer) && !empty($emp_id)) {
                                $inAudit->insert($ia_desc, $money, $date, $payer, $emp_id);
                            } else echo "<script>alert('Vui lòng nhập đầy đủ các trường!')</script>";
                        }
                        ?>
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
                <form method="post">
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
                            <?php
                            foreach ($emp_name_arr as $value) {
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
                        <button type="submit" id="btn-update" class="btn btn-primary" name="edit-in-audit">LƯU
                            LẠI
                        </button>
                        <?php
                        if (isset($_POST["edit-in-audit"])) {
                            $ia_id = $_POST["edit-in-audit"];
                            $ia_desc = $_POST["inaudit-desc"];
                            $money = $_POST["inaudit-money"];
                            $date = $_POST["inaudit-date"];
                            $payer = $_POST["inaudit-payer"];
                            $emp_id = $_POST["inaudit-confirm"];
                            if (!empty($ia_id) && !empty($ia_desc) && !empty($money) && !empty($date) && !empty($payer) && !empty($emp_id)) {
                                $inAudit->update($ia_id, $ia_desc, $money, $date, $payer, $emp_id);
                            } else echo "<script>alert('Vui lòng nhập đầy đủ các trường!')</script>";
                        }
                        ?>
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
                <form method="post">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                    <span></span>
                    <button type="submit" id="btn-delete" class="btn btn-primary" name="delete-in-audit">CHẤP
                        NHẬN
                    </button>
                    <?php
                    if (isset($_POST["delete-in-audit"])) {
                        $ia_id = $_POST["delete-in-audit"];
                        if (!empty($ia_id)) {
                            $inAudit->delete($ia_id);
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
                                <tbody>
                                <?php
                                $i = 0;
                                foreach ($inAudit_array as $value) {
                                    echo "<tr>";
                                    echo "<td>" . ++$i . "</td>";
                                    echo "<td>{$value["ia_desc"]}</td>";
                                    echo "<td>{$value["money"]}</td>";
                                    echo "<td>{$value["date"]}</td>";
                                    echo "<td class='text-primary'>{$value["payer"]}</td>";
                                    echo "<td class='text-primary'>{$emp->loadNameByID($value["emp_id"])}</td>";
                                    ?>
                                    <td class="td-actions text-center">
                                        <button type="button" rel="tooltip" class="btn btn-info"
                                                data-toggle="modal" data-target="#detailInAuditModal">
                                            <i class="material-icons">remove_red_eye</i>
                                        </button>
                                        <button type="button" value="<?= $value["ia_id"] ?>" rel="tooltip"
                                                class="btn btn-success" data-toggle="modal"
                                                data-target="#editInAuditModal">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" value="<?= $value["ia_id"] ?>" rel="tooltip"
                                                class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteInAuditModal">
                                            <i class="material-icons">close</i>
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
        $(".btn-success").click(function () {
            var modal = $(this).data("target");
            var tdata = $(this).closest("tr").find("td");
            var input = $(modal).find("input");
            var select = $(modal).find("select");
            for (var i = 0; i < input.length; i++) {
                input.eq(i).val(tdata.eq(i + 1).text());
            }

            var confirm = $(modal).find("#btn-update");
            confirm.val($(this).val());
        });
        $(".btn-danger").click(function () {
            var modal = $(this).data("target");
            $(modal).find("#btn-delete").val($(this).val());
        });

    });

</script>
