<?php
include_once("../database/model/Assignment.php");
include_once("../database/model/Lop.php");
include_once("../database/model/Employee.php");

$assignment = new Assignment();
$lop = new Lop();
$employee = new Employee();
$assign_array = $assignment->getAll();
$class_arr = $lop->getAll();
$emp_arr = $employee->getAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="../assets/img/apple-icon.png">
    <link rel="icon" href="../assets/img/favicon.png">
    <title>
        QUẢN LÝ TRƯỜNG HỌC | N8 PLUS
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>

    <link rel="stylesheet" href="../assets/css/material-dashboard.css?v=2.0.0">
    <!-- Documentation extras -->
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/assets-for-demo/demo.css" rel="stylesheet"/>
    <!-- iframe removal -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body class="">
<div class="wrapper">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-4.jpg">
        <div class="logo">
            <a href="../admin/index.html" class="simple-text logo-normal">
                MẪU GIÁO MẦM XANH
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="../ban-giam-hieu/teacher.html">
                        <i class="material-icons">person</i>
                        <p>Nhân Viên</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../ban-giam-hieu/student.html">
                        <i class="material-icons">face</i>
                        <p>Học Sinh</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../ban-giam-hieu/group.html">
                        <i class="material-icons">group</i>
                        <p>Tổ</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../ban-giam-hieu/class.html">
                        <i class="material-icons">dashboard</i>
                        <p>Lớp Học</p>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../ban-giam-hieu/assignment.html">
                        <i class="material-icons">assignment</i>
                        <p>Phân công giảng dạy</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../ban-giam-hieu/audit.html">
                        <i class="material-icons">attach_money</i>
                        <p>Kiểm toán</p>
                    </a>
                </li>
                <li class="nav-item active-pro">
                    <a class="nav-link" href="../ban-giam-hieu/index.html">
                        <i class="material-icons">account_circle</i>
                        <p>Cá Nhân</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute fixed-top">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="#pablo">PHÂN CÔNG GIẢNG DẠY</a>
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
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
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
        <!-- End Navbar -->
        <!-- Modal -->

        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm lịch giảng dạy mới</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="#">
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Niên khóa</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="class-year">
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
                                <label for="exampleInput1" class="bmd-label-floating">Chọn lớp học</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="class-name">
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
                                <select class="form-control" id="exampleFormControlSelect1" name="emp-name">
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
                                <button type="submit" class="btn btn-primary" name="add-assignment">LƯU LẠI</button>
                                <?php
                                if (isset($_POST["add-assignment"])) {
                                    $class_id = $_POST["class-name"];
                                    $emp_id = $_POST["employee-name"];
                                    if (!empty($class_id) && !empty($emp_id)) {
                                        $assignment->insert($emp_id, $class_id);
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                        <span></span>
                        <button type="button" class="btn btn-primary">CHẤP NHẬN</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Model -->
        <div class="content">
            <div class="container-fluid">
                <button type="button" class="btn btn-secondary btn-lg" role="button" aria-disabled="true"
                        data-toggle="modal" data-target="#addModal">
                    <i class="material-icons">add_circle_outline</i>
                    Thêm lịch mới
                </button>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">DANH SÁCH PHÂN CÔNG GIẢNG DẠY</h4>
                                <!--<p class="card-category"> Here is a subtitle for this table</p>-->
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                        <th>
                                            Số thứ tự
                                        </th>
                                        <th>
                                            Niên khóa
                                        </th>
                                        <th>
                                            Tên lớp
                                        </th>
                                        <th>
                                            Giáo viên giảng dạy
                                        </th>
                                        <th class="text-center">
                                            Thao tác
                                        </th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($assign_array as $value) {
                                            echo "<tr>";
                                            echo "<td>" . ++$i . "</td>";
                                            echo "<td>{$value["year"]}</td>";
                                            echo "<td >{$value["class_name"]}</td>";
                                            echo "<td >{$value["emp_name"]}</td>";
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
        <footer class="footer ">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="../admin/team.html">
                                Danh sách nhóm
                            </a>
                        </li>
                        <li>
                            <a href="https://n8plus.com">
                                N8 Plus
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear());

                    </script>
                    , teamplate by Creative Tim. Design by N8 Plus Team
                </div>
            </div>
        </footer>
    </div>
</div>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
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

<div class="modal fade" id="detailstaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
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

<div class="modal fade" id="editstaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
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

<div class="modal fade" id="deletestaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                <span></span>
                <button type="button" class="btn btn-primary">CHẤP NHẬN</button>
            </div>
        </div>
    </div>
</div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/bootstrap-material-design.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!-- Library for adding dinamically elements -->
<script src="../assets/js/plugins/arrive.min.js" type="text/javascript"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Material Dashboard Core initialisations of plugins and Bootstrap Material Design Library -->
<script src="../assets/js/material-dashboard.js?v=2.0.0"></script>
<!-- demo init -->
<script src="../assets/js/plugins/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        demo.initDashboardPageCharts();
        demo.initCharts();
    });

    $(window).on('load', function () {
        $(".btn-info").click(function () {
            var tdata = $(this).closest("tr").find("td");
            var input = $("#detailModal").find("input");
            for (var i = 0; i < input.length; i++) {
                input.eq(i).val(tdata.eq(i + 1).text());
            }
            $("#detailModal").modal("show");
        });
        $(".btn-danger").click(function () {
            $("#deleteModal").find("p").attr("id", $(this).val());
            $("#deleteModal").modal("show");
        });
        $(".btn-success").click(function () {
            var tdata = $(this).closest("tr").find("td");
            var select = $("#editModal").find("select");
            var confirm = $("#editModal").find("#btn-update");
            confirm.val($(this).val());

            for (var i = 1; i < tdata.length - 1; i++) {
                select.find("option").filter(function () {
                    return this.text == tdata.eq(i).text();
                }).attr('selected', true);
            }
            $("#editModal").modal("show");
        });
    });
</script>

</html>
