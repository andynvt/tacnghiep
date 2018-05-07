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
<script src="../assets/js/plugins/bootstrap-notify.js">
</script>
<!-- Material Dashboard Core initialisations of plugins and Bootstrap Material Design Library -->
<script src="../assets/js/material-dashboard.js?v=2.0.0"></script>
<!-- demo init -->
<script src="../assets/js/plugins/demo.js"></script>
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
</script>
<script src="../common/js/SubmitData.js"></script>
