<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-4.jpg">
    <div class="logo">
        <a href="../ban-giam-hieu/index.php?menu=0" class="simple-text logo-normal">
            MẪU GIÁO MẦM XANH
        </a>
    </div>
    <div class="sidebar-wrapper">
        <?php
        $perm = $_SESSION['perm'];
        $perm = is_null($perm) ? -1 : $perm;
        switch ($perm) {
            case -1:
                echo "<script>window.location.href = 'http://localhost/tacnghiep/login';</script>";
                break;
            case 0:
                include_once("sidebar/sidebar-admin.php");
                break;
            case 1:
                include_once("sidebar/sidebar-bangiamhieu.php");
                break;
            case 2:
                include_once("sidebar/sidebar-totruong.php");
                break;
            case 3:
                include_once("sidebar/sidebar-kiemtoan.phpp");
                break;
            case 4:
                include_once("sidebar/sidebar-giaovien.php");
                break;
            case 5:
                include_once("sidebar/sidebar-bao-mau.php");
                break;
        }
        ?>

    </div>
</div>
<script>
    $(document).ready(function () {
        var menu = "<?=$_GET['menu']?>";
        var item = $(".nav").find(".nav-item");
        item.removeClass("active");
        menu = menu == undefined ? 0 : menu;
        var index = menu >= 1 ? (menu - 1) : item.length - 1;
        item.eq(index).addClass("active");
    })
</script>