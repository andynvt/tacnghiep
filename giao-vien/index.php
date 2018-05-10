<!DOCTYPE html>
<html lang="en">
<?php include_once("../common/header.php"); ?>
<?php include_once("../common/script.php"); ?>
<?php
$account = $_SESSION['user'];
?>
<body class="">
<div class="wrapper">
    <!--    Sidebar-->
    <?php include_once("../common/sidebar.php"); ?>
    <!--    End Sidebar-->
    <div class="main-panel">
        <!-- Navbar -->
        <?php include_once("../common/navigation.php"); ?>
        <!-- End Navbar -->
        <!-- Content -->
        <?php
        $menu = $_GET['menu'];
        switch ($menu) {
            case 0:
            default:
                include_once("../giao-vien/personal.php");
                break;
            case 1:
                include_once("../giao-vien/student.php");
                break;
            case 2:
                include_once("../giao-vien/class.php");
                break;
        }
        ?>
        <!-- End Content -->

        <?php include_once("../common/footer.php"); ?>
    </div>
</div>
<?php include_once("../common/staff.php"); ?>

<div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
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
                        <button type="submit" name="chane" class="btn btn-primary">Lưu Lại</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<?php
if(isset($_POST['chane']) )
{
    session_start();
    $con=mysqli_connect("localhost","root","","preschool");

    $username = $_POST['username'];
    $oldPass = $_POST['oldPass'];
    $newPass = $_POST['newPass'];
    $passwordconfirm = $_POST['passwordconfirm'];
    $result = mysqli_query($con,"SELECT password FROM account WHERE username='$username' AND password ='$oldPass'");
    $sql = mysqli_query($con,"Select username from account");
    $row = mysqli_fetch_array($sql);
    if(mysqli_num_rows($result) == 0)
    {
        echo "<script>alertAdd(false,'Bạn đã nhập sai mật khẩu !');</script>";
    }
    else if($newPass!=$passwordconfirm){
        echo "<script>alertAdd(false,'Sai mật khẩu xác nhận!');</script>";
    }
    else{
        $sql=mysqli_query($con,"UPDATE account SET password='$newPass' where username='$username'");
        echo "<script>alertAdd(true,'Đổi mật khẩu thành công ! Hệ thống sẽ tự đông đăng xuất ! Vui lòng đăng nhập lại !');</script>";
        session_destroy();
        echo("<meta http-equiv='refresh' content='2.5'>");
        header('Location: http://localhost/tacnghiep/login');

    }
}
?>
</body>
<?php include_once("../common/core-js.php"); ?>
</html>
