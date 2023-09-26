$(document).ready(function () {

    $.ajaxSetup({

        headers: {

            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),

        },

    });



    $.ajax({

        type: "GET",

        url: "/admin/getPortafoliosActivos2023",

        success: function (response) {

            $("#contPortafoliosAct").empty();

            $("#contPortafoliosAct").html(response);

        },

        error: function (response) {

            console.log(response);

        },

    });



setInterval(function () {

    $.ajax({

        type: "GET",

        url: "/admin/getPortafoliosActivos2023",

        success: function (response) {

            $("#contPortafoliosAct").empty();

            $("#contPortafoliosAct").html(response);

        },

        error: function (response) {

            console.log(response);

        },

    });

}, 5000);

});

