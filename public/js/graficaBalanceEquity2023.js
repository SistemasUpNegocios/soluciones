//Se obtiene el valor de la URL desde el navegador

var url = window.location + "";

var separador = url.split("/");

var traderID = separador[separador.length - 1];

var boton_select = "";

am5.ready(function () {
    // Create root element

    // https://www.amcharts.com/docs/v5/getting-started/#Root_element

    var root = am5.Root.new("balanceEquity");

    // Set themes

    // https://www.amcharts.com/docs/v5/concepts/themes/

    root.setThemes([am5themes_Animated.new(root)]);

    // Create chart

    // https://www.amcharts.com/docs/v5/charts/xy-chart/

    var chart = root.container.children.push(
        am5xy.XYChart.new(root, {
            panX: true,

            panY: true,

            wheelX: "panX",

            wheelY: "zoomX",

            pinchZoomX: true,
        })
    );

    chart.get("colors").set("step", 5);

    // Add cursor

    // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/

    var cursor = chart.set(
        "cursor",

        am5xy.XYCursor.new(root, {
            behavior: "none",
        })
    );

    cursor.lineY.set("visible", false);

    // Create axes

    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/

    var xAxis = chart.xAxes.push(
        am5xy.DateAxis.new(root, {
            baseInterval: {
                timeUnit: "minute",

                count: 1,
            },

            renderer: am5xy.AxisRendererX.new(root, {}),

            tooltip: am5.Tooltip.new(root, {}),
        })
    );

    var yAxis = chart.yAxes.push(
        am5xy.ValueAxis.new(root, {
            renderer: am5xy.AxisRendererY.new(root, {}),
        })
    );

    var series1 = chart.series.push(
        am5xy.LineSeries.new(root, {
            name: "Series",

            xAxis: xAxis,

            yAxis: yAxis,

            valueYField: "open",

            openValueYField: "close",

            valueXField: "date",

            stroke: "#00f",

            fill: "#00f4",

            tooltip: am5.Tooltip.new(root, {
                labelText: "Balance: {valueY}",
            }),
        })
    );

    //     am5xy.LineSeries.new(root, {

    //         name: "Series",

    //         xAxis: xAxis,

    //         yAxis: yAxis,

    //         valueYField: "medium",

    //         valueXField: "date",

    //         stroke: "#6a972f",

    //         fill: "#6a972f8e",

    //         tooltip: am5.Tooltip.new(root, {

    //             labelText: "Equity: {valueY}",

    //         }),

    //     })

    // );

    // var series3 = chart.series.push(

    //     am5xy.LineSeries.new(root, {

    //         name: "Series",

    //         xAxis: xAxis,

    //         yAxis: yAxis,

    //         valueYField: "close",

    //         valueXField: "date",

    //         stroke: "#F7C04A",

    //         fill: "#E7B10A",

    //         tooltip: am5.Tooltip.new(root, {

    //             labelText: "Free Margin: {valueY}",

    //         }),

    //     })

    // );

    chart.set(
        "scrollbarX",

        am5.Scrollbar.new(root, {
            orientation: "horizontal",
        })
    );

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
        .startOf("isoweek")

        .format("YYYY-MM-DD HH:mm:ss");

    let fin_semana = moment()
        .startOf("isoweek")

        .add(5, "days")

        .subtract(1, "minutes")

        .format("YYYY-MM-DD HH:mm:ss");

    $("#fechaDesdeInput").val(inicio_semana);

    $("#fechaHastaInput").val(fin_semana);

    function setDataBalance(traderID, inicio, fin) {
        $.get({
            url: "/admin/getTrader2023",

            data: {
                id: traderID,

                inicio: inicio,

                fin: fin,
            },

            success: function (response) {
                var data = [];

                $("#numeroTrader").text(response.tradersNombre[0].nombre);

                $("#balanceInicialFiltro").text(
                    response.balanceInicialFiltro.balance.toLocaleString(
                        "en-US",
                        { minimumFractionDigits: 2, maximumFractionDigits: 2 }
                    )
                );

                $("#balanceFinalFiltro").text(
                    response.balanceFinalFiltro.balance.toLocaleString(
                        "en-US",
                        { minimumFractionDigits: 2, maximumFractionDigits: 2 }
                    )
                );

                response.traders.map(function (trader) {
                    data.push({
                        date: new Date(trader.fecha).getTime(),
                        open: trader.balance,
                    });
                });

                series1.data.setAll(data);
            },

            error: function (error) {
                console.log(error);
            },
        });
    }

    function setDataResume(traderID, inicio, fin) {
        $.get({
            url: "/admin/getResume2023",

            data: {
                id: traderID,

                inicio: inicio,

                fin: fin,
            },

            success: function (response) {
                fechai = inicio.split(" ")[0].split("-");
                anioi = fechai[0];

                fechaf = fin.split(" ")[0].split("-");
                aniof = fechaf[0];

                $("#incremento").show();

                $("#incremento2").show();

                $("#incremento3").show();

                $("#distribucion").show();

                $("#table-title").show();

                $("#table-title2").show();

                $("#table-title3").show();

                $("#title-dataBalance").show();

                $("#balanceTable").show();

                $("#dataBalance").show();

                if (anioi == 2022) {
                    $("#veintidos").show();
                    $("#veintitres").show();

                    $("#veintidos2").show();
                    $("#veintitres2").show();

                    $("#veintidos3").show();
                    $("#veintitres3").show();
                }
                if (anioi == 2023) {
                    $("#veintidos").hide();
                    $("#veintidos2").hide();
                    $("#veintidos3").hide();

                    $("#veintitres").show();
                    $("#veintitres2").show();
                    $("#veintitres3").show();
                }
                if (aniof == 2022) {
                    $("#veintidos").show();
                    $("#veintidos2").show();
                    $("#veintidos3").show();

                    $("#veintitres").hide();
                    $("#veintitres2").hide();
                    $("#veintitres3").hide();
                }

                var data = [];

                $("#dataResume").show();
                $("#totalTrades").html(
                    "<strong>Total de Trades:</strong> <br>" +
                        response.totalTrades +
                        " Operaciones"
                );
                $("#rentables").html(
                    "<strong>Transacciones rentables:</strong> <br>" +
                        response.rentables
                );
                $("#noRentables").html(
                    "<strong>Transacciones no rentables:</strong> <br>" +
                        response.noRentables
                );
                $("#compras").html(
                    "<strong>Transacciones largas:</strong> <br>" +
                        response.compras
                );
                $("#ventas").html(
                    "<strong>Transacciones cortas:</strong> <br>" +
                        response.ventas
                );
                $("#beneficioBruto").html(
                    "<strong>Beneficio en bruto:</strong>  <br> $" +
                        response.beneficioBruto.toLocaleString("en-US", {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2,
                        }) +
                        " USD"
                );
                $("#perdidasBruto").html(
                    "<strong>Pérdidas en bruto:</strong>  <br> $" +
                        response.perdidasBruto.toLocaleString("en-US", {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2,
                        }) +
                        " USD"
                );
                $("#beneficioMedio").html(
                    "<strong>Beneficio medio:</strong>  <br> $" +
                        response.beneficioMedio.toFixed(2) +
                        " USD"
                );
                $("#perdidasMedias").html(
                    "<strong>Pérdidas medias:</strong>  <br> $" +
                        response.perdidasMedias.toFixed(2) +
                        " USD"
                );

                var activosOperaciones = Object.values(
                    response.activosOperaciones
                );
                var activosCortas = Object.values(response.activosCortas);
                var activosLargas = Object.values(response.activosLargas);

                $(".activos").each(function (index) {
                    $(this)
                        .siblings(".operaciones")
                        .text(activosOperaciones[index]);
                    $(this).siblings(".cortas").text(activosCortas[index]);
                    $(this).siblings(".largas").text(activosLargas[index]);
                });
            },

            error: function (error) {
                console.log(error);
            },
        });
    }

    // Make stuff animate on load

    // https://www.amcharts.com/docs/v5/concepts/animations/

    series1.appear(1000);

    chart.appear(1000, 100);

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
                setDataBalance(traderID, fecha_inicio, fecha_fin);
                setDataResume(traderID, fecha_inicio, fecha_fin);
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

    $(document).on("click", "#mostrarBalance", () => {
        let fecha_inicio = $("#fechaDesdeInput").val();

        let fecha_fin = $("#fechaHastaInput").val();

        boton_select = "balance";

        $("#mostrarBalance").addClass("btn-primary");

        $("#mostrarBalance").removeClass("btn-outline-primary");

        $("#mostrarBlanceEquity").addClass("btn_balance_equity");

        $("#mostrarBlanceEquity").removeClass("btn_balance_equity_active");

        $("#mostrarEquityMargenLibre").addClass("btn_equity_margen_libre");

        $("#mostrarEquityMargenLibre").removeClass(
            "btn_equity_margen_libre_active"
        );

        $("#mostrarBalanceMargenLibre").addClass("btn_balance_margen_libre");

        $("#mostrarBalanceMargenLibre").removeClass(
            "btn_balance_margen_libre_active"
        );

        $("#mostrarTodo").addClass("btn-outline-dark");

        $("#mostrarTodo").removeClass("btn-dark");

        $("#mostrarEquity").addClass("btn-outline-success");

        $("#mostrarEquity").removeClass("btn-success");

        $("#mostrarMargenLibre").addClass("btn-outline-warning");

        $("#mostrarMargenLibre").removeClass("btn-warning");

        setDataBalance(traderID, fecha_inicio, fecha_fin);
    });

    $(document).ready(function () {
        $("#incremento").hide();
        $("#incremento2").hide();
        $("#incremento3").hide();
        $("#veintidos").hide();
        $("#veintidos2").hide();
        $("#veintidos3").hide();
        $("#veintitres").hide();
        $("#veintitres2").hide();
        $("#veintitres3").hide();
        $("#distribucion").hide();
        $("#dataResume").hide();
        $("#table-title").hide();
        $("#title-dataBalance").hide();
        $("#table-title2").hide();
        $("#table-title3").hide();
        $("#balanceTable").hide();
        $("#dataBalance").hide();
    });

    $(document).on("click", "#imprimirResume", function () {
        window.open(
            `/admin/imprimirResume2023?id=${traderID}&inicio=${$(
                "#fechaDesdeInput"
            ).val()}&fin=${$("#fechaHastaInput").val()}`,
            "_blank"
        );
    });
}); // end am5.ready()
