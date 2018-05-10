function retrieve(data, url, callback) {
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        success: function (data) {
            console.log(data);
            callback(JSON.parse(data));
        }
    });
}
