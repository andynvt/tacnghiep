<!DOCTYPE html>
<html lang="en">
<?php include_once("../common/head.php"); ?>
<body>
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
            default:
            case 0:
                include_once("../admin/personal.php");
                break;
            case 1:
                include_once("../admin/permission.php");
                break;
            case 2:
                include_once("../admin/account.php");
                break;
        }
        ?>
        <!-- End Content -->
        <?php include_once("../common/footer.php"); ?>
    </div>
</div>

</body>
<?php include_once("../common/staff.php"); ?>
</body>
<?php include_once("../common/script.php"); ?>

</html>
