<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-4.jpg">
    <div class="logo">
        <a href="../admin/index.php?menu=0" class="simple-text logo-normal">
            MẪU GIÁO MẦM XANH
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav" id="sidebar">
            <li class="nav-item active">
                <a class="nav-link" href="../admin/index.php?menu=0">
                    <i class="material-icons">person</i>
                    <p>Phân quyền</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../admin/index.php?menu=1">
                    <i class="material-icons">person</i>
                    <p>Phân quyền</p>
                </a>
            </li>
            <li class="nav-item active-pro">
                <a class="nav-link" href="../admin/index.php?menu=2">
                    <i class="material-icons">account_circle</i>
                    <p>Cá Nhân</p>
                </a>
            </li>
        </ul>
    </div>
</div>
<script>
    var menu = "<?=$_GET['menu']?>";
    var item = $("#sidebar").find(".nav-item");
    item.removeClass("active");
    item.eq(6).addClass("active-pro");
    menu = menu == undefined ? 0 : menu;
    item.eq(menu).addClass("active");
</script>