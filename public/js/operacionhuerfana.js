$(document).ready(function () {
    let sonido = new Audio("../../audio/alarma.mp3");
    sonido.loop = true;
    sonido.muted = true;

    $.get({
        url: "/admin/showOperacionHuerfana",
        success: function (response) {
            if (
                response == "Existen operaciones huerfanas." ||
                response == "Existen operaciones en conflicto."
            ) {
                Swal.fire({
                    toast: true,
                    title: response,
                    showDenyButton: true,
                    confirmButtonText: "Ir a las operaciones",
                    denyButtonText: "Cerrar",
                    denyButtonColor: "#404040",
                    icon: "warning",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/admin/operacion";
                    } else if (result.isDenied) {
                        sonido.play();
                    }
                });
            }
        },
        error: function (error) {
            console.log(error);
        },
    });

    setInterval(() => {
        $.get({
            url: "/admin/showOperacionHuerfana",
            success: function (response) {
                if (
                    response == "Existen operaciones huerfanas." ||
                    response == "Existen operaciones en conflicto."
                ) {
                    sonido.muted = false;
                    Swal.fire({
                        toast: true,
                        title: response,
                        showDenyButton: true,
                        confirmButtonText: "Ir a las operaciones",
                        denyButtonText: "Cerrar",
                        denyButtonColor: "#404040",
                        icon: "warning",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "/admin/operacion";
                        } else if (result.isDenied) {
                            sonido.pause();
                        }
                    });
                }
            },
            error: function (error) {
                console.log(error);
            },
        });
    }, 60000);
});
