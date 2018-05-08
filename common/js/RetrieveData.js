function retrieve(data) {
    $.ajax({
        type: "POST",
        url: "../php/retrieve.php",
        dataType: "json",
        data: {data: data},
        success: function (data) {
            return JSON.parse(data);
        }
    });
}