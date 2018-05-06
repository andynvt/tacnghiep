<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-secondary btn-lg" role="button" aria-disabled="true"
                        data-toggle="modal" data-target="#addModal">
                    <i class="material-icons">add_circle_outline</i>
                    Thêm lớp mới
                </button>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary"
                         style="background: linear-gradient(60deg, #ab47bc, #8e24aa)">
                        <h4 class="card-title ">Bảng quản lý lớp học</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class=" text-primary">
                                <th>
                                    ID
                                </th>

                                <th>
                                    Lớp
                                </th>
                                <th>
                                    Tên giáo viên chủ nhiệm
                                </th>
                                <th>
                                    Năm học
                                </th>
                                <th>
                                    Số lượng
                                </th>
                                <th>
                                    Giới tính
                                </th>
                                <th class="text-center">
                                    Phòng
                                </th>
                                <th class="text-center">
                                    Thao tác
                                </th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        1
                                    </td>

                                    <td class="text-primary">
                                        Mầm 1
                                    </td>
                                    <td>
                                        Rick Grimes
                                    </td>
                                    <td>2010-2011</td>
                                    <td>
                                        20
                                    </td>
                                    <td>
                                        Nam
                                    </td>
                                    <td class="text-center">
                                        12B1
                                    </td>
                                    <td class="td-actions text-center">
                                        <button type="button" rel="tooltip" class="btn btn-info btn-simple"
                                                data-toggle="modal" data-target="#addstaff">
                                            <i class="material-icons">add</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-info btn-simple"
                                                data-toggle="modal" data-target="#detailstaff">
                                            <i class="material-icons">remove_red_eye</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-success btn-simple"
                                                data-toggle="modal" data-target="#editstaff">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger btn-simple"
                                                data-toggle="modal" data-target="#deletestaff">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--    Modal-->

    <!--    End Modal-->
</div>
<script>
    $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>

