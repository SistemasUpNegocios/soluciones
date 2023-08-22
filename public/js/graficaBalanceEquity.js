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

    var series2 = chart.series.push(
        am5xy.LineSeries.new(root, {
            name: "Series",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "medium",
            valueXField: "date",
            stroke: "#6a972f",
            fill: "#6a972f8e",
            tooltip: am5.Tooltip.new(root, {
                labelText: "Equity: {valueY}",
            }),
        })
    );

    var series3 = chart.series.push(
        am5xy.LineSeries.new(root, {
            name: "Series",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "close",
            valueXField: "date",
            stroke: "#F7C04A",
            fill: "#E7B10A",
            tooltip: am5.Tooltip.new(root, {
                labelText: "Free Margin: {valueY}",
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

    function setData(traderID, inicio, fin) {
        $.get({
            url: "/admin/getTrader",
            data: {
                id: traderID,
                inicio: inicio,
                fin: fin,
            },
            success: function (response) {
                var data = [];
                $("#numeroTrader").text(response.tradersNombre[0].nombre);

                response.traders.map(function (trader) {
                    data.push({
                        date: new Date(trader.fecha).getTime(),
                        close: trader.free_margin,
                        medium: trader.equity,
                        open: trader.balance,
                    });
                });

                series1.data.setAll(data);
                series2.data.setAll(data);
                series3.data.setAll(data);
            },
            error: function (error) {
                console.log(error);
            },
        });
    }

    setData(traderID, inicio_semana, fin_semana);

    function setDataBalanceEquity(traderID, inicio, fin) {
        $.get({
            url: "/admin/getTrader",
            data: {
                id: traderID,
                inicio: inicio,
                fin: fin,
            },
            success: function (response) {
                var data = [];
                $("#numeroTrader").text(response.tradersNombre[0].nombre);

                response.traders.map(function (trader) {
                    data.push({
                        date: new Date(trader.fecha).getTime(),
                        // close: trader.free_margin,
                        medium: trader.equity,
                        open: trader.balance,
                    });
                });

                series1.data.setAll(data);
                series2.data.setAll(data);
                series3.data.setAll(data);
            },
            error: function (error) {
                console.log(error);
            },
        });
    }

    function setDataBalanceMargenLibre(traderID, inicio, fin) {
        $.get({
            url: "/admin/getTrader",
            data: {
                id: traderID,
                inicio: inicio,
                fin: fin,
            },
            success: function (response) {
                var data = [];
                $("#numeroTrader").text(response.tradersNombre[0].nombre);

                response.traders.map(function (trader) {
                    data.push({
                        date: new Date(trader.fecha).getTime(),
                        close: trader.free_margin,
                        // medium: trader.equity,
                        open: trader.balance,
                    });
                });

                series1.data.setAll(data);
                series2.data.setAll(data);
                series3.data.setAll(data);
            },
            error: function (error) {
                console.log(error);
            },
        });
    }

    function setDataEquityMargenLibre(traderID, inicio, fin) {
        $.get({
            url: "/admin/getTrader",
            data: {
                id: traderID,
                inicio: inicio,
                fin: fin,
            },
            success: function (response) {
                var data = [];
                $("#numeroTrader").text(response.tradersNombre[0].nombre);

                response.traders.map(function (trader) {
                    data.push({
                        date: new Date(trader.fecha).getTime(),
                        close: trader.free_margin,
                        medium: trader.equity,
                        // open: trader.balance,
                    });
                });

                series1.data.setAll(data);
                series2.data.setAll(data);
                series3.data.setAll(data);
            },
            error: function (error) {
                console.log(error);
            },
        });
    }

    function setDataBalance(traderID, inicio, fin) {
        $.get({
            url: "/admin/getTrader",
            data: {
                id: traderID,
                inicio: inicio,
                fin: fin,
            },
            success: function (response) {
                var data = [];
                $("#numeroTrader").text(response.tradersNombre[0].nombre);

                response.traders.map(function (trader) {
                    data.push({
                        date: new Date(trader.fecha).getTime(),
                        // close: trader.free_margin,
                        // medium: trader.equity,
                        open: trader.balance,
                    });
                });

                series1.data.setAll(data);
                series2.data.setAll(data);
                series3.data.setAll(data);
            },
            error: function (error) {
                console.log(error);
            },
        });
    }

    function setDataEquity(traderID, inicio, fin) {
        $.get({
            url: "/admin/getTrader",
            data: {
                id: traderID,
                inicio: inicio,
                fin: fin,
            },
            success: function (response) {
                var data = [];
                $("#numeroTrader").text(response.tradersNombre[0].nombre);

                response.traders.map(function (trader) {
                    data.push({
                        date: new Date(trader.fecha).getTime(),
                        // close: trader.free_margin,
                        medium: trader.equity,
                        // open: trader.balance,
                    });
                });

                series1.data.setAll(data);
                series2.data.setAll(data);
                series3.data.setAll(data);
            },
            error: function (error) {
                console.log(error);
            },
        });
    }

    function setDataMargenLibre(traderID, inicio, fin) {
        $.get({
            url: "/admin/getTrader",
            data: {
                id: traderID,
                inicio: inicio,
                fin: fin,
            },
            success: function (response) {
                var data = [];
                $("#numeroTrader").text(response.tradersNombre[0].nombre);

                response.traders.map(function (trader) {
                    data.push({
                        date: new Date(trader.fecha).getTime(),
                        close: trader.free_margin,
                        // medium: trader.equity,
                        // open: trader.balance,
                    });
                });

                series1.data.setAll(data);
                series2.data.setAll(data);
                series3.data.setAll(data);
            },
            error: function (error) {
                console.log(error);
            },
        });
    }

    // create ranges
    var i = 0;
    var baseInterval = xAxis.get("baseInterval");
    var baseDuration = xAxis.baseDuration();
    var rangeDataItem;

    am5.array.each(series1.dataItems, function (s1DataItem) {
        var s1PreviousDataItem;
        var s2PreviousDataItem;
        var s3PreviousDataItem;

        var s2DataItem = series2.dataItems[i];

        if (i > 0) {
            s1PreviousDataItem = series1.dataItems[i - 1];
            s2PreviousDataItem = series2.dataItems[i - 1];
            s3PreviousDataItem = series3.dataItems[i - 1];
        }

        var startTime = am5.time
            .round(
                new Date(s1DataItem.get("valueX")),
                baseInterval.timeUnit,
                baseInterval.count
            )
            .getTime();

        // intersections
        if (s1PreviousDataItem && s2PreviousDataItem) {
            var x0 =
                am5.time
                    .round(
                        new Date(s1PreviousDataItem.get("valueX")),
                        baseInterval.timeUnit,
                        baseInterval.count
                    )
                    .getTime() +
                baseDuration / 2;
            var y01 = s1PreviousDataItem.get("valueY");
            var y02 = s2PreviousDataItem.get("valueY");

            var x1 = startTime + baseDuration / 2;
            var y11 = s1DataItem.get("valueY");
            var y12 = s2DataItem.get("valueY");

            var intersection = getLineIntersection(
                {
                    x: x0,
                    y: y01,
                },
                {
                    x: x1,
                    y: y11,
                },
                {
                    x: x0,
                    y: y02,
                },
                {
                    x: x1,
                    y: y12,
                }
            );

            startTime = Math.round(intersection.x);
        }

        // start range here
        if (s2DataItem.get("valueY") > s1DataItem.get("valueY")) {
            if (!rangeDataItem) {
                rangeDataItem = xAxis.makeDataItem({});
                var range = series1.createAxisRange(rangeDataItem);
                rangeDataItem.set("value", startTime);
                range.fills.template.setAll({
                    fill: series2.get("fill"),
                    fillOpacity: 0.6,
                    visible: true,
                });
                range.strokes.template.setAll({
                    stroke: series1.get("stroke"),
                    strokeWidth: 1,
                });
            }
        } else {
            // if negative range started
            if (rangeDataItem) {
                rangeDataItem.set("endValue", startTime);
            }

            rangeDataItem = undefined;
        }
        // end if last
        if (i == series1.dataItems.length - 1) {
            if (rangeDataItem) {
                rangeDataItem.set(
                    "endValue",
                    s1DataItem.get("valueX") + baseDuration / 2
                );
                rangeDataItem = undefined;
            }
        }

        i++;
    });

    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    series1.appear(1000);
    series2.appear(1000);
    series3.appear(1000);
    chart.appear(1000, 100);

    function getLineIntersection(pointA1, pointA2, pointB1, pointB2) {
        let x =
            ((pointA1.x * pointA2.y - pointA2.x * pointA1.y) *
                (pointB1.x - pointB2.x) -
                (pointA1.x - pointA2.x) *
                    (pointB1.x * pointB2.y - pointB1.y * pointB2.x)) /
            ((pointA1.x - pointA2.x) * (pointB1.y - pointB2.y) -
                (pointA1.y - pointA2.y) * (pointB1.x - pointB2.x));
        let y =
            ((pointA1.x * pointA2.y - pointA2.x * pointA1.y) *
                (pointB1.y - pointB2.y) -
                (pointA1.y - pointA2.y) *
                    (pointB1.x * pointB2.y - pointB1.y * pointB2.x)) /
            ((pointA1.x - pointA2.x) * (pointB1.y - pointB2.y) -
                (pointA1.y - pointA2.y) * (pointB1.x - pointB2.x));
        return {
            x: x,
            y: y,
        };
    }

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
                if (boton_select == "todo") {
                    setData(traderID, fecha_inicio, fecha_fin);
                } else if (boton_select == "balance_equity") {
                    setDataBalanceEquity(traderID, fecha_inicio, fecha_fin);
                } else if (boton_select == "balance_margen_libre") {
                    setDataBalanceMargenLibre(
                        traderID,
                        fecha_inicio,
                        fecha_fin
                    );
                } else if (boton_select == "equity_margen_libre") {
                    setDataEquityMargenLibre(traderID, fecha_inicio, fecha_fin);
                } else if (boton_select == "balance") {
                    setDataBalance(traderID, fecha_inicio, fecha_fin);
                } else if (boton_select == "equity") {
                    setDataEquity(traderID, fecha_inicio, fecha_fin);
                } else if (boton_select == "margen_libre") {
                    setDataMargenLibre(traderID, fecha_inicio, fecha_fin);
                } else {
                    setData(traderID, fecha_inicio, fecha_fin);
                }
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

    $(document).on("click", "#mostrarTodo", () => {
        let fecha_inicio = $("#fechaDesdeInput").val();
        let fecha_fin = $("#fechaHastaInput").val();
        boton_select = "todo";

        $("#mostrarTodo").addClass("btn-dark");
        $("#mostrarTodo").removeClass("btn-outline-dark");

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

        $("#mostrarBalance").addClass("btn-outline-primary");
        $("#mostrarBalance").removeClass("btn-primary");

        $("#mostrarEquity").addClass("btn-outline-success");
        $("#mostrarEquity").removeClass("btn-success");

        $("#mostrarMargenLibre").addClass("btn-outline-warning");
        $("#mostrarMargenLibre").removeClass("btn-warning");

        setData(traderID, fecha_inicio, fecha_fin);
    });

    $(document).on("click", "#mostrarBlanceEquity", () => {
        let fecha_inicio = $("#fechaDesdeInput").val();
        let fecha_fin = $("#fechaHastaInput").val();
        boton_select = "balance_equity";

        $("#mostrarBlanceEquity").addClass("btn_balance_equity_active");
        $("#mostrarBlanceEquity").removeClass("btn_balance_equity");

        $("#mostrarTodo").addClass("btn-outline-dark");
        $("#mostrarTodo").removeClass("btn-dark");

        $("#mostrarEquityMargenLibre").addClass("btn_equity_margen_libre");
        $("#mostrarEquityMargenLibre").removeClass(
            "btn_equity_margen_libre_active"
        );

        $("#mostrarBalanceMargenLibre").addClass("btn_balance_margen_libre");
        $("#mostrarBalanceMargenLibre").removeClass(
            "btn_balance_margen_libre_active"
        );

        $("#mostrarBalance").addClass("btn-outline-primary");
        $("#mostrarBalance").removeClass("btn-primary");

        $("#mostrarEquity").addClass("btn-outline-success");
        $("#mostrarEquity").removeClass("btn-success");

        $("#mostrarMargenLibre").addClass("btn-outline-warning");
        $("#mostrarMargenLibre").removeClass("btn-warning");

        setDataBalanceEquity(traderID, fecha_inicio, fecha_fin);
    });

    $(document).on("click", "#mostrarBalanceMargenLibre", () => {
        let fecha_inicio = $("#fechaDesdeInput").val();
        let fecha_fin = $("#fechaHastaInput").val();
        boton_select = "balance_margen_libre";

        $("#mostrarBalanceMargenLibre").addClass(
            "btn_balance_margen_libre_active"
        );
        $("#mostrarBalanceMargenLibre").removeClass("btn_balance_margen_libre");

        $("#mostrarBlanceEquity").addClass("btn_balance_equity");
        $("#mostrarBlanceEquity").removeClass("btn_balance_equity_active");

        $("#mostrarTodo").addClass("btn-outline-dark");
        $("#mostrarTodo").removeClass("btn-dark");

        $("#mostrarEquityMargenLibre").addClass("btn_equity_margen_libre");
        $("#mostrarEquityMargenLibre").removeClass(
            "btn_equity_margen_libre_active"
        );

        $("#mostrarBalance").addClass("btn-outline-primary");
        $("#mostrarBalance").removeClass("btn-primary");

        $("#mostrarEquity").addClass("btn-outline-success");
        $("#mostrarEquity").removeClass("btn-success");

        $("#mostrarMargenLibre").addClass("btn-outline-warning");
        $("#mostrarMargenLibre").removeClass("btn-warning");

        setDataBalanceMargenLibre(traderID, fecha_inicio, fecha_fin);
    });

    $(document).on("click", "#mostrarEquityMargenLibre", () => {
        let fecha_inicio = $("#fechaDesdeInput").val();
        let fecha_fin = $("#fechaHastaInput").val();
        boton_select = "equity_margen_libre";

        $("#mostrarEquityMargenLibre").addClass(
            "btn_equity_margen_libre_active"
        );
        $("#mostrarEquityMargenLibre").removeClass("btn_equity_margen_libre");

        $("#mostrarBlanceEquity").addClass("btn_balance_equity");
        $("#mostrarBlanceEquity").removeClass("btn_balance_equity_active");

        $("#mostrarBalanceMargenLibre").addClass("btn_balance_margen_libre");
        $("#mostrarBalanceMargenLibre").removeClass(
            "btn_balance_margen_libre_active"
        );

        $("#mostrarTodo").addClass("btn-outline-dark");
        $("#mostrarTodo").removeClass("btn-dark");

        $("#mostrarBalance").addClass("btn-outline-primary");
        $("#mostrarBalance").removeClass("btn-primary");

        $("#mostrarEquity").addClass("btn-outline-success");
        $("#mostrarEquity").removeClass("btn-success");

        $("#mostrarMargenLibre").addClass("btn-outline-warning");
        $("#mostrarMargenLibre").removeClass("btn-warning");

        setDataEquityMargenLibre(traderID, fecha_inicio, fecha_fin);
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

    $(document).on("click", "#mostrarEquity", () => {
        let fecha_inicio = $("#fechaDesdeInput").val();
        let fecha_fin = $("#fechaHastaInput").val();
        boton_select = "equity";

        $("#mostrarEquity").addClass("btn-success");
        $("#mostrarEquity").removeClass("btn-outline-success");

        $("#mostrarBlanceEquity").addClass("btn_balance_equity");
        $("#mostrarBlanceEquity").removeClass("btn_balance_equity_active");

        $("#mostrarBalanceMargenLibre").addClass("btn_balance_margen_libre");
        $("#mostrarBalanceMargenLibre").removeClass(
            "btn_balance_margen_libre_active"
        );

        $("#mostrarEquityMargenLibre").addClass("btn_equity_margen_libre");
        $("#mostrarEquityMargenLibre").removeClass(
            "btn_equity_margen_libre_active"
        );

        $("#mostrarBalance").addClass("btn-outline-primary");
        $("#mostrarBalance").removeClass("btn-primary");

        $("#mostrarTodo").addClass("btn-outline-dark");
        $("#mostrarTodo").removeClass("btn-dark");

        $("#mostrarMargenLibre").addClass("btn-outline-warning");
        $("#mostrarMargenLibre").removeClass("btn-warning");

        setDataEquity(traderID, fecha_inicio, fecha_fin);
    });

    $(document).on("click", "#mostrarMargenLibre", () => {
        let fecha_inicio = $("#fechaDesdeInput").val();
        let fecha_fin = $("#fechaHastaInput").val();
        boton_select = "margen_libre";

        $("#mostrarMargenLibre").addClass("btn-warning");
        $("#mostrarMargenLibre").removeClass("btn-outline-warning");

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

        $("#mostrarBalance").addClass("btn-outline-primary");
        $("#mostrarBalance").removeClass("btn-primary");

        $("#mostrarEquity").addClass("btn-outline-success");
        $("#mostrarEquity").removeClass("btn-success");

        $("#mostrarTodo").addClass("btn-outline-dark");
        $("#mostrarTodo").removeClass("btn-dark");

        setDataMargenLibre(traderID, fecha_inicio, fecha_fin);
    });
}); // end am5.ready()
