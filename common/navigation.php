<nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute fixed-top">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo" id="title-item">NHÂN VIÊN</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form class="navbar-form">
                <div class="input-group no-border">

                    <input id="tbl_filter" type="text" value="" class="form-control dataTables_filter" placeholder="Tìm kiếm...">
                    <button type="button" class="btn btn-white btn-round btn-just-icon" id="filter">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                    </button>
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="http://example.com" id="dropdown-user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changePass">Thay đổi mật khẩu</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logout">Đăng
                            xuất</a>

                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<style>
    .dataTables_info {
        float: left;
    }

    .select-change {
        border-radius: 5px;
        padding-left: 5px;
        padding-right: 5px;
        line-height: 20px;
        height: 36px;
        text-align: center;
        background: none;
        color: #ffffff !important;
        width: 40px;
    }

    .select-change option {
        color: #2e3233;
    }

    .card-header {
        padding-bottom: 8px !important;
    }

    .card-title {
        float: left;

    }

    #filter_tbl_length {
        float: right;
    }

    #filter_tbl_length>label {
        color: #ffffff !important;
        font-size: 1rem;

    }

</style>
<script>
    var perm = "<?=$_SESSION['perm']?>";
    var menu = "<?=$_GET['menu']?>";
    var page = "<?=$_GET['page'] == null ? 0 : $_GET['page']?>";

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

    $(window).on("load", function() {
        filterTable();
    });

</script>
