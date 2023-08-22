$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    function estatusClaveIncorrecta(input) {
        let estatus = $(input).data("editarStatusMod");
        if (estatus == "activado") {
            $(input).prop("checked", true);
            $(input).val("activado");
        } else {
            $(input).prop("checked", false);
            $(input).val("desactivado");
        }
    }

    $(document).on("click", ".editarStatusMod", function () {
        let input = this;
        let id = $(this).data("id");


        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener("mouseenter", Swal.stopTimer);
                toast.addEventListener("mouseleave", Swal.resumeTimer);
            },
        });
        Swal.fire({
            title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
            html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
            icon: "warning",
            showCancelButton: true,
            cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
            cancelButtonColor: "#01bbcc",
            confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
            confirmButtonColor: "#198754",
            input: "password",
            showLoaderOnConfirm: true,
            preConfirm: (clave) => {
                $.ajax({
                    type: "GET",
                    url: "/admin/showClave",
                    data: {
                        clave: clave,
                        id: id,
                        campo: "modificable",
                    },
                    success: function (result) {
                        if (result == "success") {
                            $.get(
                                "/admin/editStatus",
                                {
                                    id: id,
                                     campo: "modificable",
                                },
                                function (response) {
                                    Toast.fire({
                                        icon: "success",
                                        title: "Estatus actualizado",
                                    });
                                    $("#contBotones").empty();
                                    $("#contBotones").html(response);
                                                                  }
                                                                  
                            );
                        } else {
                            estatusClaveIncorrecta(input);

                            Toast.fire({
                                icon: "error",
                                title: "Clave incorrecta",
                            });
                        }
                    },
                    error: function () {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    },
                });
            },
            allowOutsideClick: () => !Swal.isLoading(),
        }).then((result) => {
            if (!result.isConfirmed) {
                estatusClaveIncorrecta();
                Swal.fire({
                    icon: "error",
                    title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                    html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                    confirmButtonText:
                        '<a style="font-family: Poppins">Aceptar</a>',
                    confirmButtonColor: "#01bbcc",
                });
            }
        });
        // $.get({
        //     url: "/admin/editStatus",
        //     data: {
        //         id: id,
        //         campo: "modificable",
        //     },
        //     success: function (response) {
        //         $("#contBotones").empty();
        //         $("#contBotones").html(response);
        //     },
        //     error: function (error) {
        //         console.log(error);
        //     },
        // });
    });

   

    $(document).on("click", ".editarStatusAct", function () {
        let id = $(this).data("id");
        $.get({
            url: "/admin/editStatus",
            data: {
                id: id,
                campo: "activado",
            },
            success: function (response) {
                $("#contBotones").empty();
                $("#contBotones").html(response);
            },
            error: function (error) {
                console.log(error);
            },
        });
    });

    $(document).on("click", ".editarStatusSL", function () {
        let id = $(this).data("id");

        $.get({
            url: "/admin/editStatus",
            data: {
                id: id,
                campo: "sl",
            },
            success: function (response) {
                $("#contBotones").empty();
                $("#contBotones").html(response);
            },
            error: function (error) {
                console.log(error);
            },
        });
    });

    $(document).on("click", ".editarStatusTP", function () {
        let id = $(this).data("id");

        $.get({
            url: "/admin/editStatus",
            data: {
                id: id,
                campo: "tp",
            },
            success: function (response) {
                $("#contBotones").empty();
                $("#contBotones").html(response);
            },
            error: function (error) {
                console.log(error);
            },
        });
    });

    $("#traderForm").on("submit", function (e) {
        e.preventDefault();
        var url = $(this).attr("action");

        $.ajax({
            type: "POST",
            url: url,
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                $.get({
                    url: "/admin/showTraders",
                    success: function (response) {
                        $("#contBotones").empty();
                        $("#contBotones").html(response);
                    },
                    error: function (error) {
                        console.log(error);
                    },
                });
                $("#formModal").modal("hide");
                $("#traderForm")[0].reset();
                Swal.fire({
                    icon: "success",
                    title: '<h1 style="font-family: Poppins; font-weight: 700;">Trader agregado</h1>',
                    html: '<p style="font-family: Poppins">El trader ha sido añadido correctamente</p>',
                    confirmButtonText:
                        '<a style="font-family: Poppins">Aceptar</a>',
                    confirmButtonColor: "#01bbcc",
                });
            },
            error: function (err, exception) {
                console.log(err);
                console.log(exception);
            },
        });
    });

    $(document).on("click", ".new", function (e) {
        $("#alertMessage").text("");
        $("#traderForm")[0].reset();
        $("#traderForm").attr("action", "/admin/addTrader");
        $("#idInput").val("");
    });
});



$(".table").addClass("compact nowrap w-100");
