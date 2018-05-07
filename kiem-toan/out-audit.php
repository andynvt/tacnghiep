<?php
include_once "../database/model/Database.php";
include_once "../database/model/Audit.php";
include_once "../database/model/Employee.php";

$outAudit = new OutAudit();
$emp = new Employee();
$outAudit_array = $outAudit->loadAll();
$emp_name_arr = $emp->getAll();
?>

<!DOCTYPE html>
<html lang="vi">

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
                    <a class="nav-link" href="../kiem-toan/in-audit.php">
                        <i class="material-icons">attach_money</i>
                        <p>Quản lý phí thu</p>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../kiem-toan/out-audit.php">
                        <i class="material-icons">attach_money</i>
                        <p>Quản lý phí chi</p>
                    </a>
                </li>
                <li class="nav-item active-pro ">
                    <a class="nav-link" href="../kiem-toan/personal.php">
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
                    <a class="navbar-brand" href="#pablo">QUẢN LÝ THU CHI</a>
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

        <div class="modal fade" id="addOutAuditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm phí chi mới</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Mô tả</label>
                                <input type="text" class="form-control" id="txtDescription" name="outaudit-desc">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Số tiền chi (VND)</label>
                                <input type="number" class="form-control" id="txtOutAudit" name="outaudit-money">
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Ngày chi</label>
                                <input type="date" class="form-control" id="txtOutAuditDate" name="outaudit-date">
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Người xác nhận</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="outaudit-confirm">
                                    <?php
                                    foreach ($emp_name_arr as $value) {
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
                                <button type="submit" class="btn btn-primary" name="add-out-audit">LƯU LẠI</button>
                                <?php
                                if (isset($_POST["add-out-audit"])) {
                                    $oa_desc = $_POST["outaudit-desc"];
                                    $money = $_POST["outaudit-money"];
                                    $date = $_POST["outaudit-date"];
                                    $emp_id = $_POST["outaudit-confirm"];
                                    if (!empty($oa_desc) && !empty($money) && !empty($date) && !empty($emp_id)) {
                                        $outAudit->insert($oa_desc, $money, $date, $emp_id);
                                    } else echo "<script>alert('Vui lòng nhập đầy đủ các trường!')</script>";
                                }
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="detailOutAuditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chi tiết phí chi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Mô tả</label>
                                <input type="text" class="form-control" id="txtDescription" readonly="true">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Số tiền chi (VND)</label>
                                <input type="text" class="form-control" id="txtOutAudit" readonly="true">
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Ngày chi</label>
                                <input type="date" class="form-control" id="txtOutAuditDate" readonly="true">
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Người xác nhận</label>
                                <input type="text" class="form-control" id="txtConfirmed" readonly="true">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">ĐÓNG</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editOutAuditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                <label for="exampleInput1" class="bmd-label-floating">Mô tả</label>
                                <input type="text" class="form-control" id="txtDescription" name="outaudit-desc">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Số tiền chi (VND)</label>
                                <input type="number" class="form-control" id="txtOutAudit" name="outaudit-money">
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Ngày chi</label>
                                <input type="date" class="form-control" id="txtOutAuditDate" name="outaudit-date">
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Người xác nhận</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="outaudit-confirm">
                                    <?php
                                    foreach ($emp_name_arr as $value) {
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
                                <button type="submit" id="btn-update" class="btn btn-primary" name="edit-out-audit">LƯU
                                    LẠI
                                </button>
                                <?php
                                if (isset($_POST["edit-out-audit"])) {
                                    $oa_id = $_POST["edit-out-audit"];
                                    $oa_desc = $_POST["outaudit-desc"];
                                    $money = $_POST["outaudit-money"];
                                    $date = $_POST["outaudit-date"];
                                    $emp_id = $_POST["outaudit-confirm"];
                                    if (!empty($oa_id) && !empty($oa_desc) && !empty($money) && !empty($date) && !empty($emp_id)) {
                                        $outAudit->update($oa_id, $oa_desc, $money, $date, $emp_id);
                                    } else echo "<script>alert('Vui lòng nhập đầy đủ các trường!')</script>";
                                }
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteOutAuditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <form method="post">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                            <span></span>
                            <button type="submit" id="btn-delete" class="btn btn-primary" name="delete-out-audit">CHẤP
                                NHẬN
                            </button>
                            <?php
                            if (isset($_POST["delete-out-audit"])) {
                                $oa_id = $_POST["delete-out-audit"];
                                if (!empty($oa_id)) {
                                    $outAudit->delete($oa_id);
                                }
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Model -->
        <div class="content">
            <div class="container-fluid">
                <button type="button" class="btn btn-secondary btn-lg" role="button" aria-disabled="true"
                        data-toggle="modal" data-target="#addOutAuditModal">
                    <i class="material-icons">add_circle_outline</i>
                    Thêm phí chi mới
                </button>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">DANH SÁCH PHÍ CHI</h4>
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
                                            Mô tả
                                        </th>
                                        <th>
                                            Số tiền chi (VND)
                                        </th>
                                        <th>
                                            Ngày chi
                                        </th>
                                        <th>
                                            Người xác nhận
                                        </th>
                                        <th class="text-center">
                                            Thao tác
                                        </th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($outAudit_array as $value) {
                                            echo "<tr>";
                                            echo "<td>" . ++$i . "</td>";
                                            echo "<td>{$value["oa_desc"]}</td>";
                                            echo "<td>{$value["money"]}</td>";
                                            echo "<td>{$value["date"]}</td>";
                                            echo "<td class='text-primary'>{$emp->loadNameByID($value["emp_id"])}</td>";
                                            ?>
                                            <td class="td-actions text-center">
                                                <button type="button" rel="tooltip" class="btn btn-info"
                                                        data-toggle="modal" data-target="#detailOutAuditModal">
                                                    <i class="material-icons">remove_red_eye</i>
                                                </button>
                                                <button type="button" value="<?= $value["oa_id"] ?>" rel="tooltip"
                                                        class="btn btn-success" data-toggle="modal"
                                                        data-target="#editOutAuditModal">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button type="button" value="<?= $value["oa_id"] ?>" rel="tooltip"
                                                        class="btn btn-danger" data-toggle="modal"
                                                        data-target="#deleteOutAuditModal">
                                                    <i class="material-icons">close</i>
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

        //init wizard

        // demo.initMaterialWizard();

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.initCharts();

    });

</script>
<script type="text/javascript">
    $(document).ready(function () {
        demo.initDashboardPageCharts();
        demo.initCharts();
    });

    $(window).on('load', function () {
        $(".btn-info").click(function () {
            var modal = $(this).data("target");
            var tdata = $(this).closest("tr").find("td");
            var input = $(modal).find("input");
            for (var i = 0; i < input.length; i++) {
                input.eq(i).val(tdata.eq(i + 1).text());
            }
        });
        $(".btn-success").click(function () {
            var modal = $(this).data("target");
            var tdata = $(this).closest("tr").find("td");
            var input = $(modal).find("input");
            for (var i = 0; i < input.length; i++) {
                input.eq(i).val(tdata.eq(i + 1).text());
            }
            var confirm = $(modal).find("#btn-update");
            confirm.val($(this).val());
        });
        $(".btn-danger").click(function () {
            var modal = $(this).data("target");
            $(modal).find("#btn-delete").val($(this).val());
        });

    });

</script>

</html>
