<!DOCTYPE html>
<html lang="en">
<?php include_once("../common/head.php"); ?>
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
        echo $menu;
        switch ($menu) {
            default:
            case 0:
                include_once("../ban-giam-hieu/personal.php");
                break;
            case 1:
                include_once("../ban-giam-hieu/teacher.php");
                break;
            case 2:
                include_once("../ban-giam-hieu/student.php");
                break;
            case 3:
                include_once("../ban-giam-hieu/group.php");
                break;
            case 4:
                include_once("../ban-giam-hieu/class.php");
                break;
            case 5:
                include_once("../ban-giam-hieu/assignment.php");
                break;
            case 6:
                include_once("../ban-giam-hieu/audit.php");
                break;
        }
        ?>
        <!-- End Content -->
        <?php include_once("../common/footer.php"); ?>
    </div>
</div>
<?php include_once("../common/staff.php"); ?>
</body>
<?php include_once("../common/script.php"); ?>
</html>
