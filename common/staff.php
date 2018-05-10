<?php
$account = $_SESSION['user'];
?>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Thêm nhân viên mới</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Tên tài sản</label>
                        <input type="email" class="form-control" id="exampleInput1">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Đơn vị tính</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>Cái</option>
                            <option>Chiếc</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Nguồn tài sản</label>
                        <input type="email" class="form-control" id="exampleInput1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Số lượng</label>
                        <input type="number" class="form-control" id="exampleNumber1">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                        <span></span>
                        <button type="button" class="btn btn-primary">LƯU LẠI</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detailstaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Chi tiết nhân viên XXX</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Số thứ tự</label>
                        <input class="form-control" type="text" value="1" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput2" class="bmd-label-floating">Tên tài sản</label>
                        <input class="form-control" type="text" value="Dakota Rice" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Đơn vị tính</label>
                        <input class="form-control" type="text" value="Cái" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Nguồn tài sản</label>
                        <input class="form-control" type="text" value="Oud-Turnhout" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Số lượng</label>
                        <input class="form-control" type="text" value="38" readonly="readonly">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">ĐÓNG</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editstaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Sửa thông tin</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Tên tài sản</label>
                        <input type="text" class="form-control" id="exampleInput1" value="Dakota Rice">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Đơn vị tính</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>Cái</option>
                            <option>Chiếc</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Nguồn tài sản</label>
                        <input type="text" class="form-control" id="exampleInput1" value="Oud-Turnhout">

                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Số lượng</label>
                        <input type="number" class="form-control" id="exampleNumber1" value="38">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                        <span></span>
                        <button type="button" class="btn btn-primary">CẬP NHẬT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deletestaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Xác nhận xóa</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Thao tác này sẽ làm mất dữ liệu !<br>Bạn chắc chắn muốn xóa trường này ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                <span></span>
                <button type="button" class="btn btn-primary">CHẤP NHẬN</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Bạn có muốn đăng xuất?</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <form action="../login/php/logout.php" method="post">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                    <span></span>
                    <button type="submit" class="btn btn-primary">CHẤP NHẬN</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Đổi mật khẩu</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Ten tai khoan</label>
                        <input type="text" class="form-control" id="" name="username" value="<?= $account['username']?>" readonly="readonly" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Mật khẩu cũ</label>
                        <input type="password" class="form-control" id="" name="oldPass" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Mật khẩu mới</label>
                        <input type="password" class="form-control" id="" name="newPass" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" id="" name="passwordconfirm" required>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                        <span></span>
                        <button type="submit" name="chane" class="btn btn-primary">LƯU LẠI</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="question" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Mật khẩu đã được thay đổi !<br> Bạn có muốn đăng xuất không ?</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <form action="../login/php/logout.php" method="post">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐỂ SAU</button>
                    <span></span>
                    <button type="submit" name="confirm" class="btn btn-primary">CHẤP NHẬN</button>
                </form>
            </div>
        </div>
    </div>
</div>
