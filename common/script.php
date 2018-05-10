<script>
    function showNotification(icon, type, message) {
        $.notify({
            icon: icon,
            message: message,
        }, {
            type: type,
            timer: 4000,
            placement: {
                from: "top",
                align: "right"
            }
        });
    }

    function alertAdd(status, message) {
        if (status)
            showNotification('add_alert', 'success', message);
        else
            showNotification('add_alert', 'danger', message);
    }

    function alertEdit(status, message) {
        if (status)
            showNotification('edit_alert', 'success', message);
        else
            showNotification('edit_alert', 'danger', message);
    }

    function alertDelete(status, message) {
        if (status)
            showNotification('delete_alert', 'success', message);
        else
            showNotification('delete_alert', 'danger', message);

    }

    var oTable;

    function filterTable() {
        oTable = $('#filter_tbl').DataTable({
            language: {
                "lengthMenu": "Hiển thị _MENU_",
                "zeroRecords": "Xin lỗi - Không có nội dung để hiển thị",
                "info": "Hiển thị trang _PAGE_ trong _PAGES_",
                "infoEmpty": "Dữ liệu không có sẵn",
                "infoFiltered": "(lọc từ _MAX_ dòng trong tất cả)",
                "paginate": {
                    "previous": "Trước đó",
                    "next": "Kế tiếp",
                    "first": "Đầu tiên",
                    "last": "Cuối cùng"
                }
            },
            "fnDrawCallback": function (oSettings) {
                var max = $("#filter_tbl_length").find("select").val();
                if ($('#filter_tbl tr').length < max) {
                    $('.dataTables_paginate').hide();
                }
            }
        });

        setUpTable();
        $("#filter_tbl_filter").hide();
        $('#tbl_filter').keyup(function () {
            oTable.search($(this).val()).draw();
            setUpTable();
        })
        $("#filter_tbl_length").find("select").change(function () {
            setUpTable();
        });
    }

    function reloadTable(data) {
        oTable.ajax.reload(data, true);
    }

    function setUpTable() {
        $("#filter_tbl_length").find("select").addClass("select-change");
        var filter = $("#filter_tbl_length").detach();
        $(".card-header").append(filter);
        $("#filter_tbl_paginate").removeClass().addClass("pagination justify-content-center");
        var a = $("#filter_tbl_paginate").find("a").detach();
        for (var i = 0; i < a.length; i++) {

            var li = $("<li class='page-item'></li>");
            li.append(a.eq(i));
            $("#filter_tbl_paginate").append(li);
            if (a.eq(i).hasClass("current")) {
                a.eq(i).closest("li").addClass("active");
            }
        }
        a.removeClass("paginate_button").addClass("page-link");
        a.on("click", function () {
            setUpTable();
            $(this).closest("li").addClass("active");
        })
    }

</script>
<script src="../common/js/SubmitData.js"></script>
<script src="../common/js/RetrieveData.js"></script>
