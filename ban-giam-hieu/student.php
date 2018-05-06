<?php
    $conn = new mysqli("localhost", "root", "", "preschool");
    $student = "SELECT * FROM student 
LEFT JOIN class_student on class_student.student_id = student.student_id
LEFT JOIN class on class.class_id = class_student.class_id";
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
        <link rel="stylesheet" href="../ban-giam-hieu/css/modal.css">
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
                            <a class="nav-link" href="../ban-giam-hieu/teacher.html">
                            <i class="material-icons">person</i>
                            <p>Nhân Viên</p>
                        </a>
                        </li>
                        <li class="nav-item active">
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
                        <li class="nav-item">
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
                        <li class="nav-item active-pro ">
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
                            <a class="navbar-brand" href="#pablo">QUẢN LÝ HỌC SINH</a>
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
                                    </p>ial-icons">notifications</i>
                                        <span class="notification">5</span>
                                        <p>
                                            <span class="d-lg-none d-md-block">Some Actions</span>
                                        </p>
                                    </a>
                                    <div class="dropdown-menu
                                </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mater dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Mike John responded to your email</a>
                                        <a class="dropdown-item" href="#">You have 5 new tasks</a>
                                        <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                                        <a class="dropdown-item" href="#">Another Notification</a>
                                        <a class="dropdown-item" href="#">Another One</a>
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
                                <button type="button" class="btn btn-secondary btn-lg" role="button" aria-disabled="true" data-toggle="modal" data-target="#add-student">
                              <i class="material-icons">add_circle_outline</i>
                          Thêm mới
                            </button>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-primary" style="background: linear-gradient(60deg, #ab47bc, #8e24aa)">
                                        <h4 class="card-title ">Bảng quản lý học sinh</h4>
                                        <!--                                    <p class="card-category"> Here is a subtitle for this table</p>-->
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead class=" text-primary">
                                                    <th>
                                                        ID
                                                    </th>
                                                    <th>
                                                        Tên
                                                    </th>
                                                    <th>
                                                        Lớp
                                                    </th>
                                                    <th>
                                                        Ngày sinh
                                                    </th>
                                                    <th>
                                                        Giới tính
                                                    </th>
                                                    <th class="text-center">
                                                        Địa chỉ
                                                    </th>
                                                    <th class="text-center">
                                                        Thao tác
                                                    </th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                            $getst = $conn->query($student);
                                                            if($getst->num_rows > 0){
                                                            while($row = $getst->fetch_assoc()){
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $row['student_id']?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['student_name']?>
                                                            </td>
                                                            <td class="text-primary">
                                                                <a href="#">
                                                                    <?php echo $row['class_name'] ?>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['dob']?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['gender']?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['current_address']?>
                                                            </td>
                                                            <td class="td-actions text-center">
                                                                <button type="button" rel="tooltip" class="btn btn-info btn-simple" data-toggle="modal" data-target="#detail-student-<?php echo $row['student_id']?>">
                                                            <i class="material-icons">remove_red_eye</i>
                                                        </button>
                                                                <button type="button" rel="tooltip" class="btn btn-success btn-simple" data-toggle="modal" data-target="#edit-student">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                                <button type="button" rel="tooltip" class="btn btn-danger btn-simple" data-toggle="modal" data-target="#delete-student">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                            }
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

                            </script>, teamplate by Creative Tim. Design by N8 Plus Team
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <div class="modal fade" id="add-student" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Thêm học sinh mới</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label class="bmd-label-floating">Tên học sinh</label>
                                <input type="text" class="form-control" name="student">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Ngày sinh</label>
                                <input type="date" class="form-control" name="dob" placeholder="">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Giới tính</label>
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label col-lg-2">
                                    <input class="form-check-input" type="radio" name="gender" value="Nam" checked>
                                    Nam
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                                    <label class="form-check-label col-lg-2">
                                    <input class="form-check-input" type="radio" name="gender" value="Nữ" >
                                    Nữ
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Quê quán</label>
                                <input type="text" class="form-control" name="hometown">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Địa chỉ thường trú</label>
                                <input type="text" class="form-control" name="address">
                            </div>
                            <div class="form-group">
                                <label class="bmd-label-floating">Địa chỉ hiện nay</label>
                                <input type="text" class="form-control" name="current_address">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Họ tên cha</label>
                                        <input type="text" class="form-control" name="father_name">
                                    </div>
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Nghề nghiệp cha</label>
                                        <input type="text" class="form-control" name="father_job">
                                    </div>
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Số điện thoại cha</label>
                                        <input type="text" class="form-control" name="father_phone">
                                    </div>
                                </div>
                                <div class="col-lg-6" style="border-left: 1px solid #b3b3b3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Họ tên mẹ</label>
                                        <input type="text" class="form-control" name="mother_name">
                                    </div>
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Nghề nghiệp mẹ</label>
                                        <input type="text" class="form-control" name="mother_job">
                                    </div>
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Số điện thoại mẹ</label>
                                        <input type="text" class="form-control" name="mother_phone">
                                    </div>
                                </div>
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

        <?php
            $getst = $conn->query($student);
            if($getst->num_rows > 0){
            while($row = $getst->fetch_assoc()){
        ?>
            <div class="modal fade" id="detail-student-<?php echo $row['student_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Chi tiết học sinh
                                <?php echo $row['student_name']?>
                            </h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                    </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Họ tên</label>
                                    <input class="form-control disable-modal" type="text" value="<?php echo $row['student_name']?>" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Ngày sinh</label>
                                    <input class="form-control" type="text" value="<?php echo $row['dob']?>" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Giới tính</label>
                                    <input class="form-control" type="text" value="<?php echo $row['gender']?>" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Quê quán</label>
                                    <input class="form-control" type="text" value="<?php echo $row['hometown']?>" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Địa chỉ thường trú</label>
                                    <input class="form-control" type="text" value="<?php echo $row['address']?>" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Địa chỉ hiện nay</label>
                                    <input class="form-control" type="text" value="<?php echo $row['current_address']?>" readonly="readonly">
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Họ tên cha</label>
                                            <input type="text" class="form-control" value="<?php echo $row['farther_name']?>" readonly="readonly">
                                        </div>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Nghề nghiệp cha</label>
                                            <input type="text" class="form-control" value="<?php echo $row['farther_job']?>" readonly="readonly">
                                        </div>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Số điện thoại cha</label>
                                            <input type="text" class="form-control" value="<?php echo $row['farther_phone']?>" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="col-lg-6" style="border-left: 1px solid #b3b3b3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Họ tên mẹ</label>
                                            <input type="text" class="form-control" value="<?php echo $row['morther_name']?>" readonly="readonly">
                                        </div>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Nghề nghiệp mẹ</label>
                                            <input type="text" class="form-control" value="<?php echo $row['morther_job']?>" readonly="readonly">
                                        </div>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Số điện thoại mẹ</label>
                                            <input type="text" class="form-control" value="<?php echo $row['morther_phone']?>" readonly="readonly">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">ĐÓNG</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
        } 
        ?>

                <div class="modal fade" id="edit-student" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel">Sửa thông tin học sinh XXX</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Họ tên</label>
                                        <input class="form-control" type="text" name="name" value="Nguyễn Văn Tài">
                                    </div>
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Ngày sinh</label>
                                        <input class="form-control" type="date" name="dob" value="1996-10-22">
                                    </div>
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Giới tính</label>
                                        <div class="form-check form-check-radio">
                                            <label class="form-check-label col-lg-2">
                                    <input class="form-check-input" type="radio" name="gender" value="Nam" checked>
                                    Nam
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                                            <label class="form-check-label col-lg-2">
                                    <input class="form-check-input" type="radio" name="gender" value="Nữ" >
                                    Nữ
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Quê quán</label>
                                        <input class="form-control" type="text" name="hometown" value="Sóc Trăng">
                                    </div>
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Địa chỉ thường trú</label>
                                        <input class="form-control" type="text" name="address" value="Sóc Trăng">
                                    </div>
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Địa chỉ hiện nay</label>
                                        <input class="form-control" type="text" name="current_address" value="Cần Thơ">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Họ tên cha</label>
                                                <input type="text" class="form-control" name="father_name" value="A">
                                            </div>
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Nghề nghiệp cha</label>
                                                <input type="text" class="form-control" name="father_job" value="A">
                                            </div>
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Số điện thoại cha</label>
                                                <input type="text" class="form-control" name="father_phone" value="A">
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="border-left: 1px solid #b3b3b3">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Họ tên mẹ</label>
                                                <input type="text" class="form-control" name="mother_name" value="A">
                                            </div>
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Nghề nghiệp mẹ</label>
                                                <input type="text" class="form-control" name="mother_job" value="A">
                                            </div>
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Số điện thoại mẹ</label>
                                                <input type="text" class="form-control" name="mother_phone" value="A">
                                            </div>
                                        </div>
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

                <div class="modal fade" id="delete-student" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Xác nhận xoá học sinh XXX</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                            </div>
                            <div class="modal-body">
                                <p>Thao tác này sẽ làm mất dữ liệu !<br>Bạn chắc chắn muốn xóa học sinh XXX ?</p>
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
        $(document).ready(function() {

            //init wizard

            // demo.initMaterialWizard();

            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

            demo.initCharts();

        });

    </script>

    </html>
