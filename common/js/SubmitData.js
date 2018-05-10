function submitInsert(url, form, tbody, success_msg, failure_msg) {
    // console.log(form.serialize());
    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(),
        success: function (data) {
            console.log(data);
            data = JSON.parse(data);
            if (data["success"]) {
                alertAdd(true, success_msg);
            } else {
                alertAdd(false, failure_msg);
            }
            tbody.html(data['content']);
        }
    });
}

function submitEdit(url, form, tbody, success_msg, failure_msg) {
    console.log(form.serialize());
    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(),
        success: function (data) {
            console.log(data);
            data = JSON.parse(data);
            if (data["success"]) {
                alertEdit(true, success_msg);
            } else {
                alertEdit(false, failure_msg);
            }
            tbody.html(data['content']);
        }
    });
}

function submitDelete(url, form, tbody, success_msg, failure_msg) {
    console.log(form.serialize());
    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(),
        success: function (data) {
            data = JSON.parse(data);
            if (data["success"]) {
                alertDelete(true, success_msg);
            } else {
                alertDelete(false, failure_msg);
            }
            tbody.html(data['content']);
        }
    });
}


