am5.ready(function () {
    var url = window.location + "";
    var separador = url.split("/");
    var traderID = separador[separador.length - 1];

    var root = am5.Root.new("chartdiv");
    root.setThemes([am5themes_Animated.new(root)]);
    var chart = root.container.children.push(
        am5xy.XYChart.new(root, {
            panX: true,
            panY: true,
            panZ: true,
            wheelX: "panX",
            wheelY: "zoomX",
            pinchZoomX: true,
        })
    );
    var cursor = chart.set(
        "cursor",
        am5xy.XYCursor.new(root, {
            behavior: "none",
        })
    );
    cursor.lineY.set("visible", false);
    var xAxis = chart.xAxes.push(
        am5xy.DateAxis.new(root, {
            maxDeviation: 0,
            baseInterval: {
                timeUnit: "minute",
                count: 15,
            },
            renderer: am5xy.AxisRendererX.new(root, {}),
            tooltip: am5.Tooltip.new(root, {}),
        })
    );
    var zAxis = chart.yAxes.push(
        am5xy.ValueAxis.new(root, {
            renderer: am5xy.AxisRendererY.new(root, {}),
        })
    );
    var yAxis = chart.yAxes.push(
        am5xy.ValueAxis.new(root, {
            renderer: am5xy.AxisRendererY.new(root, {}),
        })
    );
    var series = chart.series.push(
        am5xy.LineSeries.new(root, {
            name: "Series",
            xAxis: xAxis,
            yAxis: yAxis,
            zAxis: zAxis,
            valueYField: "value",
            valueXField: "date",
            valueZField: "moment",
            tooltip: am5.Tooltip.new(root, {
                labelText:
                    "Total de profit: {valueY} \nFecha: {valueX.formatDate('dd/MM/yyyy HH:mm')}",
            }),
        })
    );
    chart.set(
        "scrollbarX",
        am5.Scrollbar.new(root, {
            orientation: "horizontal",
        })
    );

    let hoy = new Date();

    let inicio = new Date(hoy.getFullYear(), 0, 1);

    let fechaInicio_inicio =
        inicio.getFullYear() +
        "-0" +
        (inicio.getMonth() + 1) +
        "-0" +
        inicio.getDate() +
        " 0" +
        inicio.getHours() +
        ":0" +
        inicio.getMinutes() +
        ":0" +
        inicio.getSeconds();

    let mes = "";
    let dia = "";
    let horas = "";
    let minutos = "";
    let segundos = "";

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

    let fechaFin_inicio =
        hoy.getFullYear() + mes + dia + " " + "23" + ":59" + ":00";

    $("#fechaDesdeInput").val(fechaInicio_inicio);
    $("#fechaHastaInput").val(fechaFin_inicio);

    const grafica = (id, inicio, fin) => {
        $.get({
            url: "/admin/showMomento",
            data: { id: id, fecha_inicio: inicio, fecha_fin: fin },
            success: function (response) {
                var data = [];
                let valor = 0;
                response.traders.map(function (trader) {
                    if (trader.count == null) {
                        valor = 0;
                    } else {
                        valor = trader.count;
                    }

                    data.push({
                        date: new Date(trader.fecha).getTime(),
                        value: valor,
                        moment: trader.momento,
                    });
                    series.data.setAll(data);
                });
            },
            error: function (error) {
                console.log(error);
            },
        });
    };

    // grafica(traderID, fechaInicio_inicio, fechaFin_inicio);

    $(document).on("click", "#obtenerRegistros", () => {
        let fecha_inicio = $("#fechaDesdeInput").val();
        let fecha_fin = $("#fechaHastaInput").val();

        if (fecha_inicio.length > 0 && fecha_fin.length > 0) {
            if (fecha_inicio > fecha_fin) {
                $("#fechaDesdeInput").val(0);
                $("#fechaHastaInput").val(0);
                Swal.fire({
                    icon: "warning",
                    title: '<h1 style="font-family: Poppins; font-weight: 700;">Error en fechas</h1>',
                    html: '<p style="font-family: Poppins">La fecha de inicio debe de ser menor a la fecha de fin.</p>',
                    confirmButtonText:
                        '<a style="font-family: Poppins">Aceptar</a>',
                    confirmButtonColor: "#01bbcc",
                });
            } else {
                grafica(traderID, fecha_inicio, fecha_fin);
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

    series.appear(1000);
    chart.appear(1000, 100);
}); // end am5.ready()
