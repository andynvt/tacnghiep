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
                        <h4 class="card-title ">Bảng quản lý nhân viên</h4>
                        <!--                                    <p class="card-category"> Here is a subtitle for this table</p>-->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
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
                                for ($i = 0; $i< count($account_detail_array); $i = $i+4){
                                    echo "<tr>";
                                    echo "<td>{$account_detail_array[$i]}</td>";
                                    echo "<td>{$account_detail_array[$i+1]}</td>";
                                    echo "<td>{$account_detail_array[$i+2]}</td>";
                                    echo "<td>{$account_detail_array[$i+3]}</td>";
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
                            <select class="form-control" id="emp" name="emp">
                                <option value=""> </option>
                                <?php
                                foreach ($emp_arr as $value) {
                                    echo '<option value="'.$value["emp_id"].'">'. $value["emp_name"].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="Account" class="bmd-label-floating">Tài Khoản</label>
                            <input type ="text" class="form-control" id="account" name="account" value="" placeholder="Tên Tài Khoản">
                        </div>
                        <div class="form-group">
                            <label for="pwd" class="bmd-label-floating">Mật Khẩu</label>
                            <input type ="password" class="form-control" id="pwd" name="pwd" value="" placeholder="Mật Khẩu">
                            <i class="glyphicon glyphicon-eye-open form-control-feedback"></i>
                        </div>
                        <div class="form-group">
                            <label for="per" class="bmd-label-floating">Quyền Hạn</label>
                            <select class="form-control" id="per" name="per_id">
                                <option value=""> </option>
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
                            <?php
                            if (isset($_POST["add-account"])) {
                                $emp_id = $_POST["emp"];
                                $account_name = $_POST["account"];
                                $password = $_POST["pwd"];
                                $per_id = $_POST["per_id"];
                                // echo "<script>alert('". $emp_id . " " . $account_name ." " . $password. " ". $per_id ."')</script>";
                                if (!empty($account) && !empty($emp_id) && !empty($password) && !empty($per_id)) {
                                    if($account->insert($account_name,$password,$emp_id,$per_id)){
                                        echo "<script>alert('test2')</script>";
                                    }
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