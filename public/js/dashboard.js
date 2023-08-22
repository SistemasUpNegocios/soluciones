$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        type: "GET",
        url: "/admin/getPruebasVida",
        success: function (response) {
            $("#contPruebaVida").empty();
            $("#contPruebaVida").html(response);
        },
        error: function (response) {
            console.log(response);
        },
    });

    setInterval(function () {
        $.ajax({
            type: "GET",
            url: "/admin/getPruebasVida",
            success: function (response) {
                $("#contPruebaVida").empty();
                $("#contPruebaVida").html(response);
            },
            error: function (response) {
                console.log(response);
            },
        });
    }, 1000);
});
