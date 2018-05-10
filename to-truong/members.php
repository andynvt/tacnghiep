<?php
include_once("../database/model/DepartmentLoader.php");
$action = new DepartmentLoader();
$department = new Department();

$user = $_SESSION['user'];
$dep_name = $department->getDepByEmp($user['emp_id']);

?>
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Danh sách thành viên <?php echo $dep_name['dep_name']?></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="filter_tbl">
                                <thead class=" text-primary">
                                <th>
                                    STT
                                </th>
                                <th>
                                    Mã
                                </th>
                                <th>
                                    Tên
                                </th>
                                <th>
                                    Ngày sinh
                                </th>
                                <th>
                                    Giới tính
                                </th>
                                <th>
                                    CMND
                                </th>
                                <th>
                                    Địa chỉ
                                </th>
                                <th>
                                    SĐT
                                </th>

                                </thead>

                                <tbody id="table-body"><?php echo $action->displayListMemByID($user['emp_id']); ?></tbody>
                            </table>
                        </div>
                        <div id="pagination"><?php echo $action->getPagination(); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>