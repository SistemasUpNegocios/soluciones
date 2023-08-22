$(document).ready(function () {
    let hoy = new Date();

    let mes = "";
    let dia = "";

    if (hoy.getMonth().toString().length == 1) {
        mes = "-0" + (hoy.getMonth() + 1);
    } else {
        mes = "-" + (hoy.getMonth() + 1);
    }
    if (hoy.getDate().toString().length == 1) {
        dia = "-0" + hoy.getDate();
    } else {
        dia = "-" + hoy.getDate();
    }

    if (hoy.getHours().toString().length == 1) {
        horas = "0" + hoy.getHours();
    } else {
        horas = "" + hoy.getHours();
    }
    if (hoy.getSeconds().toString().length == 1) {
        segundos = ":0" + hoy.getSeconds();
    } else {
        segundos = ":" + hoy.getSeconds();
    }
    if (hoy.getMinutes().toString().length == 1) {
        minutos = ":0" + hoy.getMinutes();
    } else {
        minutos = ":" + hoy.getMinutes();
    }

    let semana = moment(hoy.getFullYear() + mes + dia, "YYYYMMDD").isoWeek();
    let inicio_semana = moment()
        .isoWeek(semana)
        .startOf("isoweek")
        .format("YYYY-MM-DD HH:mm:ss");
    let fin_semana = moment()
        .isoWeek(semana)
        .startOf("isoweek")
        .add(5, "days")
        .subtract(1, "minutes")
        .format("YYYY-MM-DD HH:mm:ss");

    $("#fechaDesdeInput").val(inicio_semana);
    $("#fechaHastaInput").val(fin_semana);

    function setData(inicio, fin, portafolio) {
        $.get({
            url: "/admin/getPortafolio",
            data: {
                inicio: inicio,
                fin: fin,
                portafolio: portafolio,
            },
            success: function (response) {
                var dps = [];
                response.portafolio.map(function (port) {
                    dps.push({ x: port.valor, y: port.rendimiento });
                });

                if (dps.length == 0) {
                    Swal.fire({
                        icon: "warning",
                        title: '<h1 style="font-family: Poppins; font-weight: 700;">Advertencia</h1>',
                        html: '<p style="font-family: Poppins">No se encontraron datos para graficar</p>',
                        confirmButtonText:
                            '<a style="font-family: Poppins">Aceptar</a>',
                        confirmButtonColor: "#01bbcc",
                    });
                    $("#chartContainer").CanvasJSChart(options);
                } else {
                    var options = {
                        animationEnabled: true,
                        title: {
                            text: "Spline Chart using jQuery Plugin",
                        },
                        axisX: {
                            labelFontSize: 14,
                        },
                        axisY: {
                            labelFontSize: 14,
                        },
                        data: [
                            {
                                type: "spline", //change it to line, area, bar, pie, etc
                                dataPoints: dps,
                            },
                        ],
                    };
                    $("#chartContainer").CanvasJSChart(options);
                }
            },
            error: function (error) {
                console.log(error);
            },
        });
    }

    $(document).on("click", "#obtenerRegistros", () => {
        let fecha_inicio = $("#fechaDesdeInput").val();
        let fecha_fin = $("#fechaHastaInput").val();
        let portafolio = $("#portafolio").val();

        if (fecha_inicio.length > 0 && fecha_fin.length > 0) {
            if (fecha_inicio > fecha_fin) {
                $("#fechaDesdeInput").val(0);
                $("#fechaHastaInput").val(0);
                $("#portafolio").val(0);
                Swal.fire({
                    icon: "warning",
                    title: '<h1 style="font-family: Poppins; font-weight: 700;">Error en fechas</h1>',
                    html: '<p style="font-family: Poppins">La fecha de inicio debe de ser menor a la fecha de fin.</p>',
                    confirmButtonText:
                        '<a style="font-family: Poppins">Aceptar</a>',
                    confirmButtonColor: "#01bbcc",
                });
            } else {
                setData(fecha_inicio, fecha_fin, portafolio);
            }
        } else {
            Swal.fire({
                icon: "warning",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Advertencia</h1>',
                html: '<p style="font-family: Poppins">Debes de seleccionar dos fechas.</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
});
