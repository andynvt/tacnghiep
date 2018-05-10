<?php
include_once("../database/model/Student.php");
include_once("../database/model/Teacher.php");
    $class_name = $_SESSION['user'];
    $idgv = $class_name['emp_id'];

    $student = new Student();
    $getStudent = $student->getStudent($idgv);

    $teacher = new Teacher();
    $class = $teacher->getClass($idgv);
?>
<body>
                <!-- End Navbar -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary" style="background: linear-gradient(60deg, #ab47bc, #8e24aa)">
                            <h4 class="card-title ">Danh sách học sinh lớp <?= $class; ?></h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="" method="post">
                                    <table class="table table-hover" id="filter_tbl">
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
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach ($getStudent as $st) {
                                            ?>
                                            <tr class="class-style" data-toggle="modal" data-target='#stu_<?= $st["student_id"]; ?>' style="cursor: pointer">
                                                <td>
                                                    <?= $st["student_id"]; ?>
                                                </td>
                                                <td>
                                                    <?= $st["student_name"]; ?>
                                                </td>
                                                <td>
                                                    <?= $st["dob"]; ?>
                                                </td>
                                                <td>
                                                    <?= $st["gender"]; ?>
                                                </td>
                                                <td>
                                                    <?= $st["current_address"]; ?>
                                                </td>
                                            </tr>
                                            <?php }?>
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

    <?php
        foreach ($getStudent as $st) {
    ?>
    <div class="modal fade" id='stu_<?= $st["student_id"] ?>' tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel"><?= $st['student_name']; ?></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Mã học sinh</label>
                        <input class="form-control" type="text" value="<?= $st['student_id']; ?>" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput2" class="bmd-label-floating">Tên học sinh</label>
                        <input class="form-control" type="text" value="<?= $st['student_name']; ?>" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Ngày sinh</label>
                        <input class="form-control" type="date" value="<?= $st['dob']; ?>" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Giới tính</label>
                        <input class="form-control" type="text" value="<?= $st['gender']; ?>" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Quê quán</label>
                        <input class="form-control" type="text" value="<?= $st['hometown']; ?>" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Địa chỉ</label>
                        <input class="form-control" type="text" value="<?= $st['address']; ?>" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Địa chỉ thường trú</label>
                        <input class="form-control" type="text" value="<?= $st['current_address']; ?>" readonly="readonly">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Tên cha</label>
                                <input class="form-control" type="text" value="<?= $st['father_name']; ?>" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Nghề của cha</label>
                                <input class="form-control" type="text" value="<?= $st['father_job']; ?>" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Số điện thoại cha</label>
                                <input class="form-control" type="number" value="<?= $st['father_phone']; ?>" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Tên mẹ</label>
                                <input class="form-control" type="text" value="<?= $st['mother_name']; ?>" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Nghề của mẹ</label>
                                <input class="form-control" type="text" value="<?= $st['mother_job']; ?>" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="exampleInput1" class="bmd-label-floating">Số điện thoại mẹ</label>
                                <input class="form-control" type="number" value="<?= $st['mother_phone']; ?>" readonly="readonly">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">ĐÓNG</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
</body>
    <!--   Core JS Files   -->
   
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
