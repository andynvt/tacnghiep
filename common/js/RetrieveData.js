function retrieve(data, url, callback) {
    console.log(data);
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        success: function (data) {
            callback(JSON.parse(data)) ;
        }
    });
}