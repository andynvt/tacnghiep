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
                include_once("../giao-vien/class_change.php");
                break;
        }
        ?>
        <!-- End Content -->

        <?php include_once("../common/footer.php"); ?>
    </div>
</div>
<?php include_once("../common/staff.php"); ?>


<?php
if (isset($_POST['chane'])) {
    session_start();
    $con = mysqli_connect("localhost", "root", "", "preschool");

    $username = $_POST['username'];
    $oldPass = $_POST['oldPass'];
    $newPass = $_POST['newPass'];
    $passwordconfirm = $_POST['passwordconfirm'];
    $result = mysqli_query($con, "SELECT password FROM account WHERE username='$username' AND password ='$oldPass'");
    $sql = mysqli_query($con, "Select username from account");
    $row = mysqli_fetch_array($sql);
    if (mysqli_num_rows($result) == 0) {
        echo "<script>alertAdd(false,'Ban nhap sai mat khau!');</script>";
    } else if ($newPass != $passwordconfirm) {
        echo "<script>alertAdd(false,'Sai mật khẩu xác nhận!');</script>";
    } else {
        $sql=mysqli_query($con,"UPDATE account SET password='$newPass' where username='$username'");
        //        echo "<script>alertAdd(true,'Đổi mật khẩu thành công ! Vui lòng đăng nhập lại !');</script>";
        echo '<script type="text/javascript"> $("#question").modal("show"); </script>';
        if(isset($_POST['confirm']) ){

            header('Location: http://localhost/tacnghiep/login');
            session_destroy();
        }
        else{
            return;
        }
    }
}
?>
</body>
<?php include_once("../common/core-js.php"); ?>
</html>
