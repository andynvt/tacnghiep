<?php
$conn = new mysqli("localhost", "root", "", "preschool");

$student = "select * from student";

$today = date("Y/m");

$s1524 = "SELECT *, DATEDIFF(CURDATE(),dob) as s1524 FROM student WHERE DATEDIFF(CURDATE(),dob) BETWEEN 450 and 720";

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <!-- Favicons -->
        <link rel="apple-touch-icon" href="../assets/img/apple-icon.png">
        <link rel="icon" href="../assets/img/favicon.png">
        <title>
            QUẢN LÝ TRƯỜNG HỌC | N8 PLUS
        </title>
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
        <link rel="stylesheet" href="../assets/css/material-dashboard.css?v=2.0.0">
        <!-- Documentation extras -->
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="../assets/assets-for-demo/demo.css" rel="stylesheet" />
        <!-- iframe removal -->
    </head>

    <body class="">
        <div class="wrapper">
            <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-4.jpg">
                <div class="logo">
                    <a href="../admin/index.php" class="simple-text logo-normal">
                    MẪU GIÁO MẦM XANH
                </a>
                </div>
                <div class="sidebar-wrapper">
                    <ul class="nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="../giao-vien/student.html">
                            <i class="material-icons">face</i>
                            <p>Học Sinh</p>
                        </a>
                        </li>
                        <li class="nav-item active-pro ">
                            <a class="nav-link" href="../giao-vien/index.html">
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
                            <a class="navbar-brand" href="#pablo">QUẢN LÝ CÁI GÌ</a>
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
                                    <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">notifications</i>
                                    <span class="notification">5</span>
                                    <p>
                                        <span class="d-lg-none d-md-block">Some Actions</span>
                                    </p>
                                </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                        <p class="dropdown-item" href="#" style="border-bottom: 1px solid #dddddd">Xác nhận chuyển lớp</p>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#change-class">Nguyễn Văn Hiệp</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#change-class">Nguyễn Hoài Chung</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#change-class">Nguyễn Văn Tài</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="http://example.com" id="dropdown-user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">person</i>
                                </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                                        <a class="dropdown-item" href="index.html">Thông tin tài khoản</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logout">Đăng xuất</a>

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-primary" style="background: linear-gradient(60deg, #ab47bc, #8e24aa)">
                                        <h4 class="card-title ">Bảng quản học sinh</h4>
                                        <!--                                    <p class="card-category"> Here is a subtitle for this table</p>-->
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <form action="" method="post">
                                                <table class="table table-hover">
                                                    <thead class=" text-primary">
                                                        <th>
                                                            Mã học sinh
                                                        </th>
                                                        <th>
                                                            Tên học sinh
                                                        </th>
                                                        <th>
                                                            Ngày sinh
                                                        </th>
                                                        <th>
                                                            Giới tính
                                                        </th>
                                                        <th>
                                                            Địa chỉ thường trú
                                                        </th>
                                                        <th class="text-center">
                                                            Chuyển lớp
                                                        </th>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $result = $conn->query($student);
                                                        if($result->num_rows > 0){
                                                        while($row = $result->fetch_assoc()){
                                                    ?>
                                                            <tr data-toggle="modal" data-target='#<?php echo $row["student_id"];?>' style="cursor: pointer">
                                                                <td>
                                                                    <?php echo $row["student_id"] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row["student_name"] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row["dob"] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row["gender"] ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $row["current_address"] ?>
                                                                </td>
                                                                <td class="td-actions text-center">
                                                                    <button type="submit" rel="tooltip" class="btn btn-success btn-simple" value="chuyển"><i class="material-icons">check</i></button>
                                                                </td>
                                                            </tr>

                                                            <div class="modal fade" id='<?php echo $row["student_id"];?>' tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h3 class="modal-title" id="exampleModalLabel"><?php echo $row["student_name"] ?></h3>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                              <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form>
                                                                                <div class="form-group">
                                                                                    <label for="exampleInput1" class="bmd-label-floating">Mã học sinh</label>
                                                                                    <input class="form-control" type="text" value="<?php echo $row['student_id']; ?>" readonly="readonly">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="exampleInput2" class="bmd-label-floating">Tên học sinh</label>
                                                                                    <input class="form-control" type="text" value="<?php echo $row['student_name']; ?>" readonly="readonly">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="exampleFormControlSelect1">Ngày sinh</label>
                                                                                    <input class="form-control" type="date" value="<?php echo $row['dob']; ?>" readonly="readonly">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="exampleInput1" class="bmd-label-floating">Giới tính</label>
                                                                                    <input class="form-control" type="text" value="<?php echo $row['gender']; ?>" readonly="readonly">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="exampleInput1" class="bmd-label-floating">Quê quán</label>
                                                                                    <input class="form-control" type="text" value="<?php echo $row['hometown']; ?>" readonly="readonly">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="exampleInput1" class="bmd-label-floating">Địa chỉ</label>
                                                                                    <input class="form-control" type="text" value="<?php echo $row['address']; ?>" readonly="readonly">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="exampleInput1" class="bmd-label-floating">Địa chỉ thường trú</label>
                                                                                    <input class="form-control" type="text" value="<?php echo $row['current_address']; ?>" readonly="readonly">
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        <div class="form-group">
                                                                                            <label for="exampleInput1" class="bmd-label-floating">Tên cha</label>
                                                                                            <input class="form-control" type="text" value="<?php echo $row['farther_name']; ?>" readonly="readonly">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="exampleInput1" class="bmd-label-floating">Nghề của cha</label>
                                                                                            <input class="form-control" type="text" value="<?php echo $row['farther_job']; ?>" readonly="readonly">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="exampleInput1" class="bmd-label-floating">Số điện thoại cha</label>
                                                                                            <input class="form-control" type="number" value="<?php echo $row['farther_phone']; ?>" readonly="readonly">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <div class="form-group">
                                                                                            <label for="exampleInput1" class="bmd-label-floating">Tên mẹ</label>
                                                                                            <input class="form-control" type="text" value="<?php echo $row['morther_name']; ?>" readonly="readonly">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="exampleInput1" class="bmd-label-floating">Nghề của mẹ</label>
                                                                                            <input class="form-control" type="text" value="<?php echo $row['morther_job']; ?>" readonly="readonly">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="exampleInput1" class="bmd-label-floating">Số điện thoại mẹ</label>
                                                                                            <input class="form-control" type="number" value="<?php echo $row['morther_phone']; ?>" readonly="readonly">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">ĐÓNG</button>
                                                                                    <button type="button" class="btn btn-success">Chuyển lớp</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <?php
                                                            } } 
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </form>
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

                            </script>, teamplate by Creative Tim. Design by N8 Plus Team
                        </div>
                    </div>
                </footer>
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
        $(document).ready(function() {

            //init wizard

            // demo.initMaterialWizard();

            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

            demo.initCharts();

        });

    </script>
    <!--

































 -->

    </html>
