
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
<script src="../common/js/RetrieveData.js"></script>
