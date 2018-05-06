<div class="content">
    <link rel="stylesheet" href="../ban-giam-hieu/css/modal.css">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-secondary btn-lg" role="button" aria-disabled="true"
                        data-toggle="modal" data-target="#addModal-class">
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
                                                data-toggle="modal" data-target="#add-class">
                                            <i class="material-icons">add</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-info btn-simple"
                                                data-toggle="modal" data-target="#detail-class">
                                            <i class="material-icons">remove_red_eye</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-success btn-simple"
                                                data-toggle="modal" data-target="#edit-class">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btn-danger btn-simple"
                                                data-toggle="modal" data-target="#delete-class">
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
</div>
<!--    Modal-->
    <div class="modal fade" id="addModal-class" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Thêm lớp học mới</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Lớp</label>
                        <input type="text" name="lop" class="form-control" id="exampleInput1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Tên giáo viên chủ nhiệm</label>
                        <input type="text" name="ten" class="form-control" id="exampleInput1">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Giới tính</label>
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="nam" >
                                        Nam
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="nu" checked>
                                        Nữ
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Năm học</label>
                        <input type="text" name="#" class="form-control" id="exampleInput1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Số lượng học sinh</label>
                        <input type="number" name="#" class="form-control" id="exampleInput1">
                    </div>

                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Phòng</label>
                        <input type="text" name="#" class="form-control" id="exampleInput1">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                <span></span>
                <button type="button" class="btn btn-primary">LƯU LẠI</button>
            </div>
        </div>
    </div>
</div>

    <div class="modal fade" id="add-class" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Thêm học sinh</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Danh sách học sinh</label>
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Họ và Tên</th>
                                <th>Năm Sinh</th>
                                <th>Giớ Tính</th>
                                <th>Họ tên cha/mẹ</th>
                                <th>SĐT cha/mẹ</th>
                                <th>Địa chỉ</th>
                                <th class="td-actions text-cente check-add" style="padding: 0px 0px 21px 0px">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label ">

                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option1">

                                            <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                        </label>
                                    </div>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>Andrew Mike</td>
                                <td>2000</td>
                                <td>Nam</td>
                                <td>John Doe</td>
                                <td>012345678</td>
                                <td>an minh</td>
                                <td class="td-actions text-right">
                                    <div class="form-check ">
                                        <label class="form-check-label check-add">
                                            <input class="form-check-input" type="checkbox" id="checkItem" value="option1">
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                                </span>
                                        </label>
                                    </div>

                                </td>

                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>John Doe</td>
                                <td>2001</td>
                                <td>Nữ</td>
                                <td>John Doe</td>
                                <td>012345678</td>
                                <td>an minh</td>
                                <td class="td-actions text-right">
                                    <div class="form-check ">
                                        <label class="form-check-label check-add">
                                            <input class="form-check-input" type="checkbox" id="checkItem" value="option1">
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                                </span>
                                        </label>
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td>Alex Mike</td>
                                <td>2010</td>
                                <td>Nam</td>
                                <td>John Doe</td>
                                <td>012345678</td>
                                <td>an minh</td>
                                <td class="td-actions text-right">
                                    <div class="form-check ">
                                        <label class="form-check-label check-add">
                                            <input class="form-check-input" type="checkbox" id="checkItem" value="option1">
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                                </span>
                                        </label>
                                    </div>

                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ĐÓNG</button>
                <span></span>
                <button type="button" class="btn btn-primary">Thêm</button>
            </div>
        </div>
    </div>
</div>

    <div class="modal fade" id="detail-class" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Chi tiết Lớp</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>

                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Lớp</label>
                        <input class="form-control" type="text" value="Mầm 1" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Tên giáo viên chủ nhiệm</label>
                        <input class="form-control" type="text" value="Dakota Rice" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Giới tính</label>
                        <div class="row">
                            <div class="col-lg-2 col-md-2">
                                <div class="form-check form-check-radio ">
                                    <label class="form-check-label">
                                        <input class="form-check-input" checked type="radio" disabled name="nam" id="exampleRadios1" value="nam" >
                                        Nam
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <div class="form-check form-check-radio">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" disabled name="nu" id="exampleRadios2" value="nu" >
                                        Nữ
                                        <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Năm học</label>
                        <input class="form-control" type="text" value="2010-2012" readonly="readonly">
                    </div>

                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Số lượng học sinh</label>
                        <input class="form-control" type="text" value="20" readonly="readonly">
                    </div>

                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Phòng</label>
                        <input class="form-control" type="text" value="12B1" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="exampleInput1" class="bmd-label-floating">Danh sách học sinh</label>
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Họ và Tên</th>
                                <th>Năm Sinh</th>
                                <th>Giớ Tính</th>
                                <th>Họ tên cha/mẹ</th>
                                <th>SĐT cha/mẹ</th>
                                <th>Địa chỉ</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>Andrew Mike</td>
                                <td>2000</td>
                                <td>Nam</td>
                                <td>John Doe</td>
                                <td>012345678</td>
                                <td>an minh</td>

                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td>John Doe</td>
                                <td>2001</td>
                                <td>Nữ</td>
                                <td>John Doe</td>
                                <td>012345678</td>
                                <td>an minh</td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td>Alex Mike</td>
                                <td>2010</td>
                                <td>Nam</td>
                                <td>John Doe</td>
                                <td>012345678</td>
                                <td>an minh</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>



                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">ĐÓNG</button>
            </div>
        </div>
    </div>
</div>

    <div class="modal fade" id="edit-class" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form>
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Lớp</label>
                            <input type="text" name="lop" class="form-control" value="Mầm 1" id="exampleInput1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Tên giáo viên chủ nhiệm</label>
                            <input type="text" name="ten" class="form-control" value="Rick Grimes" id="exampleInput1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Giới tính</label>
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-check form-check-radio">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="nam" >
                                            Nam
                                            <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check form-check-radio">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="nu" checked>
                                            Nữ
                                            <span class="circle">
                                            <span class="check"></span>
                                        </span>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Năm học</label>
                            <input type="" name="#" class="form-control" value="2010-2011" id="exampleInput1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Số lượng học sinh</label>
                            <input type="number" name="#" class="form-control" value="20" id="exampleInput1">
                        </div>

                        <div class="form-group">
                            <label for="exampleInput1" class="bmd-label-floating">Phòng</label>
                            <input type="text" name="#" class="form-control" value="12B1" id="exampleInput1">
                        </div>

                    </form>
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

    <div class="modal fade" id="delete-class" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<!--    End Modal-->
<script>
    $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>

