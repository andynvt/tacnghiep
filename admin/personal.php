<?php
    $host = "localhost";
    $db_name = "preschool";
    $username = "root";
    $password = "";


    $table_name = "employee";
    $conn = new mysqli($host, $username, $password, $db_name);
    if ($conn->connect_error) {
        die($conn->connect_error());
    }
    mysqli_set_charset($conn, 'utf8');
    
    $employee = "select emp_name,dob, gender, id_card, doi, hometown, address, current_address, phone  from employee where emp_id = 10 ";
    
    
?>



    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary" style="background: linear-gradient(60deg, #ab47bc, #8e24aa)">
                            <h4 class="card-title ">Thông tin cá nhân</h4>
                            <!--                                    <p class="card-category"> Here is a subtitle for this table</p>-->
                        </div>
                        <div class="card-body">
                            <div class="col-12 col-sm-10 offset-sm-1">
                                <!-- Personal pane START -->
                                <?php
                                                    if($result = $conn->query($employee)){
                                                        while($row = $result->fetch_assoc()){
                                                
                                                ?>
                                    <form style="width: 45%; float: left" method="post">

                                        <div class="form-group">
                                            <label class="col-form-label">Họ Tên</label>
                                            <input class="form-control" name="empName" type="text" value="<?php echo $row['emp_name']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Năm Sinh</label>
                                            <input class="form-control" type="text" name="dob" value="<?php echo $row['dob']; ?>" readonly>

                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Giới Tính</label>
                                            <br>
                                            <?php
                                            if($row['gender']=='Nam'){

                                                echo '<input type="radio" name="gender" id="male" value="male" checked/>
                                                 <label for="male">Nam</label>';
                                                     echo '<input style="margin-left:60px;" type="radio" name="gender" id="female" value="female" />
                                                <label for="female" >Nữ</label>';
                                            }
                                            else {
                                               echo '<input type="radio" name="gender" id="male" value="male" />
                                                 <label for="male">Nam</label>';
                                                     echo '<input style="margin-left:60px;" type="radio" name="gender" id="female" value="female" checked/>
                                                <label for="female" >Nữ</label>';
                                            }
                                           ?>

                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">CMND</label>
                                            <input class="form-control" type="text" name="idcard" value="<?php echo $row[ 'id_card']; ?>" readonly>

                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Ngày Vào</label>
                                            <input class="form-control" type="text" name="doi" value="<?php echo $row['doi']; ?>" readonly>

                                        </div>

                                    </form>
                                    <form style=" width: 45%; float: right;">


                                        <div class="form-group">
                                            <label class="col-form-label">Quê Quán</label>
                                            <input class="form-control" type="text" name="hometown" value="<?php echo $row['hometown']; ?>" readonly>

                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Địa Chỉ</label>
                                            <input class="form-control" type="text" name="address" value="<?php echo $row['address']; ?>" readonly>

                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Địa Chỉ Hiện Tại</label>
                                            <input class="form-control" type="text" name="currAddress" value="<?php echo $row['current_address']; ?>" readonly>

                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Điện Thoại</label>
                                            <input class="form-control" type="text" name="phone" value="<?php echo $row['phone']; ?>" readonly>

                                        </div>

                                    </form>
                                    <?php
                                                            }
                                                        } 
                                                        ?>
                                        <form style="width: 100%; float:left; padding-left: 15%;">
                                            <div class="form-group row">
                                                <div class="offset-xs-0 offset-sm-3 col-12 col-sm-9 mt-3">
                                                    <input id="btnupdate" name="" data-action="open" type="button" class="btn btn-primary" data-toggle="modal" data-target="#changePersonal" value="Cập Nhật">
                                                    <input id="close" data-action="open" type="button" class="btn btn-primary" value="Thoát">
                                                </div>

                                            </div>
                                        </form>


                            </div>

                            <!-- Profile tabs END -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="changePersonal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Cập nhật thông tin</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <?php
                                                    if($result = $conn->query($employee)){
                                                        while($row = $result->fetch_assoc()){
                                                
                                                ?>
                        <form method="post">

                            <div class="form-group">
                                <label class="col-form-label">Họ Tên</label>
                                <input class="form-control" name="empName" type="text" value="<?php echo $row['emp_name']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Năm Sinh</label>
                                <input class="form-control" type="date" name="dob" value="<?php echo $row['dob']; ?>">

                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Giới Tính</label>
                                <br>
                                <?php
                                if($row['gender']=='Nam'){
                                    
                                    echo '<input type="radio" name="gender" id="male" value="male" checked/>
                                     <label for="male">Nam</label>';
                                         echo '<input style="margin-left:60px;" type="radio" name="gender" id="female" value="female" />
                                    <label for="female" >Nữ</label>';
                                }
                                else {
                                   echo '<input type="radio" name="gender" id="male" value="male" />
                                     <label for="male">Nam</label>';
                                         echo '<input style="margin-left:60px;" type="radio" name="gender" id="female" value="female" checked/>
                                    <label for="female" >Nữ</label>';
                                }
                               ?>

                            </div>
                            <div class="form-group">
                                <label class="col-form-label">CMND</label>
                                <input class="form-control" type="text" name="idcard" value="<?php echo $row['id_card']; ?>">

                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Ngày Vào</label>
                                <input class="form-control" type="date" name="doi" value="<?php echo $row['doi']; ?>">

                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Quê Quán</label>
                                <input class="form-control" type="text" name="hometown" value="<?php echo $row['hometown']; ?>">

                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Địa Chỉ</label>
                                <input class="form-control" type="text" name="address" value="<?php echo $row['address']; ?>">

                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Địa Chỉ Hiện Tại</label>
                                <input class="form-control" type="text" name="currAddress" value="<?php echo $row['current_address']; ?>">

                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Điện Thoại</label>
                                <input class="form-control" type="text" name="phone" value="<?php echo $row['phone']; ?>">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                                <span></span>
                                <button type="button" class="btn btn-primary">CẬP NHẬT</button>
                            </div>

                        </form>
                        <?php
                                                            }
                                                        } 
                                                        ?>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Đổi mật khẩu</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Mật khẩu cũ</label>
                            <input type="password" class="form-control" id="exampleInput1" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Mật khẩu mới</label>
                            <input type="password" class="form-control" id="exampleInput1" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" id="exampleInput1" required>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                            <span></span>
                            <button type="button" class="btn btn-primary">Lưu Lại</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
