<?php
include_once("../database/model/Permission.php");
$per = new Permission();
$per_arr = $per->getAll();
$perid_curr = $per->makePerID();
$perid_next = $perid_curr["max(per_id)"] + 1;
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-secondary btn-lg" role="button" aria-disabled="true" data-toggle="modal" data-target="#addModal">
                    <i class="material-icons">add_circle_outline</i>
                    Thêm quyền hạn mới
                </button>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary" style="background: linear-gradient(60deg, #ab47bc, #8e24aa)">
                        <h4 class="card-title ">Danh sách quyền hạn</h4>
                        <!--                                    <p class="card-category"> Here is a subtitle for this table</p>-->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class=" text-primary">
                                <th>
                                    STT
                                </th>
                                <th>
                                    Mã Quyền
                                </th>
                                <th>
                                    Quyền Hạn
                                </th>
                                <th>
                                    Mô Tả
                                </th>
                                <th class="text-center">
                                    Thao tác
                                </th>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                foreach ($per_arr as $per_info){
                                    echo "<tr>";
                                    echo "<td>".$i++."</td>";
                                    echo "<td>{$per_info["per_id"]}</td>";
                                    echo "<td>{$per_info["per_name"]}</td>";
                                    echo "<td>{$per_info["description"]}</td>";
                                    ?>
                                    <td class="td-actions text-center">
                                    <button type="button" rel="tooltip" title="Xem chi tiết" class="btn btn-info btn-simple"
                                                data-toggle="modal"
                                                data-target="#detail-per-<?= $per_info["per_id"] ?>">
                                            <i class="material-icons">remove_red_eye</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Sửa thông tin" class="btn btn-success btn-simple"
                                                data-toggle="modal" data-target="#edit-per-<?= $per_info["per_id"] ?>">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Xoá tài khoản" class="btn btn-danger btn-simple"
                                                data-toggle="modal" data-target="#delete-per<?= $per_info["per_id"] ?>">
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
<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header"> 
                    <h5 class="modal-title" id="addPermission">Thêm quyền hạn mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="#">
                        <div class="form-group">
                            <label for="per_id" class="bmd-label-floating">Mã Quyền</label>
                            <input type="text" class="form-control" id="per_id" name="per_id" value="<?php 
                            echo $perid_next;
                            ?>" readonly>
                        </div>
                        
                        <div class="form-group">
                            <label for="per_name" class="bmd-label-floating">Quyền Hạn</label>
                            <input type ="text" class="form-control" id="per_name" name="per_name" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="description" class="bmd-label-floating">Mô Tả</label>
                            <input type ="text" class="form-control" id="description" name="description" value="" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                            <span></span>
                            <button type="submit" class="btn btn-primary" name="add-permission">LƯU LẠI</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 </div>
 
 <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="per_detail">Chi tiết quyền hạn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="per_id" class="bmd-label-floating">Mã Quyền</label>
                            <input class="form-control" type="text"
                                   readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="per_name" class="bmd-label-floating">Quyền Hạn</label>
                            <input class="form-control" type="text"
                                   readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="description" class="bmd-label-floating">Mô Tả</label>
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
</div>
<?php
    foreach ($per_arr as $per_info) {
    ?>
    <div class="modal fade" id="detail-per-<?= $per_info["per_id"] ?>" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Thông tin
                       <b><?= $per_info["per_name"] ?></b>
                    </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label class="bmd-label-floating">Mã Quyền</label>
                            <input class="form-control disable-modal" type="text"
                                   value="<?= $per_info["per_id"] ?>" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Quyền Hạn</label>
                            <input class="form-control" type="text" value="<?= $per_info["per_name"] ?>"
                                   readonly="readonly" >
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Mô tả</label>
                            <input class="form-control" type="text" value="<?= $per_info["description"] ?>"
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

    <div class="modal fade" id="edit-per-<?= $per_info["per_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Sửa thông tin <b><?= $per_info["per_name"] ?></b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                        <label class="bmd-label-floating">Mã Quyền</label>
                            <input class="form-control" type="text" name="update_per_id"value="<?= $per_info["per_id"] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Quyền Hạn</label>
                            <input class="form-control" type="text" name="update_per_name"value="<?= $per_info["per_name"] ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Mô Tả</label>
                            <input class="form-control" type="text" name="update_desc" value="<?= $per_info["description"] ?>" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                            <span></span>
                            <button type="submit" class="btn btn-primary" name="update-permission">CẬP NHẬT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-per<?= $per_info["per_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Xác nhận xoá <b><?= $per_info["per_name"] ?></b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Thao tác này sẽ làm mất dữ liệu !<br>Bạn chắc chắn muốn xóa quyền <b><?= $per_info["per_name"] ?></b> ?</p>
                </div>
                <div class="modal-footer">
                    <form method="post">
                        <input type="hidden" name="delete-perid" value="<?= $per_info["per_id"] ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                        <span></span>
                        <button type="submit" class="btn btn-primary" name="delete-permission">CHẤP NHẬN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <!-- End Model -->
<!-- php -->
<?php
    if (isset($_POST["add-permission"])) {
        $per_id = $_POST["per_id"];
        $per_name = $_POST["per_name"];
        $description = $_POST["description"];
        if($per->insert($per_id,$per_name,$description)){
            echo("<meta http-equiv='refresh' content='3.5'>");
            echo "<script>alertAdd(true,'Đã thêm quyền thành công!');</script>";
            }
            else{
                echo "<script>alertAdd(false,'Thêm quyền không thành công!');</script>";
            }
    }
    if (isset($_POST["update-permission"])){
        $per_id = $_POST["update_per_id"];
        $per_name = $_POST["update_per_name"];
        $description = $_POST["update_desc"];
            if($per->update($per_id, $per_name,$description)){
                echo("<meta http-equiv='refresh' content='3.5'>");
                echo "<script>alertEdit(true,'Đã chỉnh sửa tài khoản thành công!');</script>";
            }
            else{
                echo "<script>alertEdit(false,'Chỉnh sửa tài khoản không thành công!');</script>";
            }
    }
    if (isset($_POST["delete-permission"])){
        $per_id = $_POST["delete-perid"];
            if($per->delete($per_id)){
                echo("<meta http-equiv='refresh' content='3.5'>");
                echo "<script>alertDelete(true,'Đã xóa tài khoản thành công!');</script>";
            }
            else{
                echo "<script>alertDelete(false,'Xóa tài khoản không thành công!');</script>";
            }
}

?>    
<div class="modal fade" id="changeInformation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div>