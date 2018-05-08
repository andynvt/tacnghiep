<nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute fixed-top">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo" id="title-item">NHÂN VIÊN</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form class="navbar-form">
                <div class="input-group no-border">
                    <input type="text" value="" class="form-control" placeholder="Tìm kiếm...">
                    <button type="submit" class="btn btn-white bt

                    n-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                    </button>
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#pablo">
                        <i class="material-icons">dashboard</i>
                        <p>
                            <span class="d-lg-none d-md-block">Stats</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">notifications</i>
                        <span class="notification">5</span>
                        <p>
                            <span class="d-lg-none d-md-block">Some Actions</span>
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Mike John responded to your email</a>
                        <a class="dropdown-item" href="#">You have 5 new tasks</a>
                        <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                        <a class="dropdown-item" href="#">Another Notification</a>
                        <a class="dropdown-item" href="#">Another One</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://example.com" id="dropdown-user" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="index.html">Thông tin tài khoản</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logout">Đăng
                            xuất</a>

                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script>
    var perm = "<?=$_SESSION['perm']?>";
    var menu = "<?=$_GET['menu']?>";
    var title_admin = ["THÔNG TIN CÁ NHÂN", "PHÂN QUYỀN", "TÀI KHOẢN"];
    var title_bangiamhieu = ["THÔNG TIN CÁ NHÂN", "QUẢN LÝ NHÂN VIÊN", "QUẢN LÝ HỌC SINH", "QUẢN LÝ TỔ", "QUẢN LÝ LỚP HỌC", "PHÂN CÔNG GIẢNG DẠY", "QUẢN LÝ TÀI CHÍNH"];
    var title_baomau = ["THÔNG TIN CÁ NHÂN", "QUẢN LÝ HỌC SINH"];
    var title_giaovien = ["THÔNG TIN CÁ NHÂN", "QUẢN LÝ HỌC SINH", "QUẢN LÝ LỚP HỌC"];
    var title_kiemtoan = ["THÔNG TIN CÁ NHÂN", "QUẢN LÝ TÀI CHÍNH"];
    var title_totruong = ["THÔNG TIN CÁ NHÂN", "QUẢN LÝ TỔ"];
    var titles = [title_admin, title_bangiamhieu, title_totruong, title_kiemtoan, title_giaovien, title_baomau];
    var title = titles[perm];
    menu = menu == undefined ? 0 : menu;
    $("#title-item").text(title[menu]);
</script>