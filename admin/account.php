<?php
include_once("../database/model/Account.php");
include_once("../database/model/Permission.php");
include_once("../database/model/Employee.php");
$limit = (isset($_GET['limit'])) ? $_GET['limit'] : 10;
$page = (isset($_GET['page'])) ? $_GET['page'] : 1;

$account = new Account();
$per = new Permission();
$account_detail_array = $account->getAccountDetail();
$per_arr = $per->getAll();
$emp_arr = $account->getEmpList();
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-secondary btn-lg" role="button" aria-disabled="true" data-toggle="modal" data-target="#addModal">
                    <i class="material-icons">add_circle_outline</i>
                    Thêm tài khoản mới
                </button>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary" style="background: linear-gradient(60deg, #ab47bc, #8e24aa)">
                        <h4 class="card-title ">Danh sách tài khoản</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="filter_tbl">
                                <thead class=" text-primary">
                                <th>
                                    Mã Nhân Viên
                                </th>
                                <th>
                                    Tên Nhân Viên
                                </th>
                                <th>
                                    Tên Tài Khoản
                                </th>
                                <th>
                                    Quyền Hạn
                                </th>
                                <th class="text-center">
                                    Thao tác
                                </th>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($account_detail_array as $account_info){
                                    echo "<tr>";
                                    echo "<td>{$account_info["emp_id"]}</td>";
                                    echo "<td>{$account_info["emp_name"]}</td>";
                                    echo "<td>{$account_info["username"]}</td>";
                                    echo "<td>{$account_info["per_name"]}</td>";
                                    ?>
                                    <td class="td-actions text-center">
                                    <button type="button" rel="tooltip" title="Xem chi tiết" class="btn btn-info btn-simple"
                                                data-toggle="modal"
                                                data-target="#detail-account-<?= $account_info["emp_id"] ?>">
                                            <i class="material-icons">remove_red_eye</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Sửa thông tin" class="btn btn-success btn-simple"
                                                data-toggle="modal" data-target="#edit-account-<?= $account_info["emp_id"] ?>">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Xoá tài khoản" class="btn btn-danger btn-simple"
                                                data-toggle="modal" data-target="#delete-account<?= $account_info["emp_id"] ?>">
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
                    <h5 class="modal-title" id="addAccountModel">Thêm tài khoản mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="#">
                        <div class="form-group">
                            <label for="emp" class="bmd-label-floating">Nhân Viên</label>
                            <select class="form-control" id="emp" name="emp" required>
                                <?php
                                foreach ($emp_arr as $value) {
                                    echo '<option value="'.$value["emp_id"].'">'. $value["emp_name"].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="Account" class="bmd-label-floating">Tài Khoản</label>
                            <input type ="text" class="form-control" id="username" name="username" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="pwd" class="bmd-label-floating">Mật Khẩu</label>
                            <input type ="password" class="form-control" id="pwd" name="pwd" value="" required>
                            
                        </div>
                        <div class="form-group">
                            <label for="per" class="bmd-label-floating">Quyền Hạn</label>
                            <select class="form-control" id="per" name="per_id" required>
                                <?php
                                foreach ($per_arr as $value) {
                                    echo '<option value="'.$value["per_id"].'">'. $value["per_name"].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                            <span></span>
                            <button type="submit" class="btn btn-primary" name="add-account">LƯU LẠI</button>
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
                    <h5 class="modal-title" id="account_detail">Chi tiết tài khoản</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInput2" class="bmd-label-floating">Mã Nhân Viên</label>
                            <input class="form-control" type="text"
                                   readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Tên Nhân Viên</label>
                            <input class="form-control" type="text"
                                   readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Tên Tài Khoản</label>
                            <input class="form-control" type="text"
                                   readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Quyền Hạn</label>
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
    foreach ($account_detail_array as $acc) {
    ?>
    <div class="modal fade" id="detail-account-<?= $acc["emp_id"] ?>" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Thông tin
                       <b><?= $acc["emp_name"] ?></b>
                    </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label class="bmd-label-floating">Mã Nhân Viên</label>
                            <input class="form-control disable-modal" type="text"
                                   value="<?= $acc["emp_id"] ?>" readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Tên Nhân Viên</label>
                            <input class="form-control" type="text" value="<?= $acc["emp_name"] ?>"
                                   readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Tài Khoản</label>
                            <input class="form-control" type="text" value="<?= $acc["username"] ?>"
                                   readonly="readonly">
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Quyền</label>
                            <input class="form-control" type="text" value="<?= $acc["per_name"] ?>"
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

    <div class="modal fade" id="edit-account-<?= $acc["emp_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Sửa thông tin <b><?= $acc["emp_name"] ?></b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                        <label class="bmd-label-floating">Mã Nhân Viên</label>
                            <input class="form-control" type="text" name="update_manv"value="<?= $acc["emp_id"] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Tên Tài Khoản</label>
                            <input class="form-control" type="text" name="update_username"value="<?= $acc["username"] ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="bmd-label-floating">Mật Khẩu</label>
                            <input class="form-control" type="password" name="update_pwd" value="<?= $acc["password"] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="per" class="bmd-label-floating">Quyền Hạn</label>
                            <select class="form-control" id="per" name="update_per_id" required>
                                <option value=""> </option>
                                <?php
                                foreach ($per_arr as $value) {
                                    if ($value["per_id"] == $acc["per_id"])
                                    {
                                        echo '<option selected value="'.$value["per_id"].'">'. $value["per_name"].'</option>';    
                                    }
                                    else{
                                        echo '<option value="'.$value["per_id"].'">'. $value["per_name"].'</option>';
                                    }
                                    // echo '<option value="'.$value["per_id"].'">'. $value["per_name"].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                            <span></span>
                            <button type="submit" class="btn btn-primary" name="update-account">CẬP NHẬT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-account<?= $acc["emp_id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Xác nhận xoá <b><?= $acc["username"] ?></b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Thao tác này sẽ làm mất dữ liệu !<br>Bạn chắc chắn muốn xóa tài khoản <b><?= $acc["username"] ?></b> ?</p>
                </div>
                <div class="modal-footer">
                    <form method="post">
                        <input type="hidden" name="delete_username" value="<?= $acc["username"] ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                        <span></span>
                        <button type="submit" class="btn btn-primary" name="delete-account">CHẤP NHẬN</button>
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
    if (isset($_POST["add-account"])) {
        $emp_id = $_POST["emp"];
        $account_name = $_POST["username"];
        $password = $_POST["pwd"];
        $per_id = $_POST["per_id"];
        // echo "<script>alert('". $emp_id . " " . $account_name ." " . $password. " ". $per_id ."')</script>";
            if($account->insert($account_name,$password,$emp_id,$per_id)){
                echo("<meta http-equiv='refresh' content='3.5'>");
                echo "<script>alertAdd(true,'Đã thêm tài khoản thành công!');</script>";
            }
            else{
                echo "<script>alertAdd(false,'Thêm tài khoản không thành công!');</script>";
            }
    }
    if (isset($_POST["update-account"])){
        $emp_id = $_POST["update_manv"];
        $account_name = $_POST["update_username"];
        $password = $_POST["update_pwd"];
        $per_id = $_POST["update_per_id"];
        if($account->update($emp_id,$account_name,$password,$per_id)){
            echo("<meta http-equiv='refresh' content='3.5'>");
            echo "<script>alertEdit(true,'Đã chỉnh sửa tài khoản thành công!');</script>";
        }
        else{
            echo "<script>alertEdit(false,'Chỉnh sửa tài khoản không thành công!');</script>";
        }
    }
    if (isset($_POST["delete-account"])){
        $username = $_POST["delete_username"];
        $check = $account->delete($username);
            if($check){
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