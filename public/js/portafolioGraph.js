am5.ready(function () {
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("chartdiv");

    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([am5themes_Animated.new(root)]);

    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(
        am5xy.XYChart.new(root, {
            focusable: true,
            panX: true,
            panY: true,
            wheelX: "panX",
            wheelY: "zoomX",
        })
    );

    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xAxis = chart.xAxes.push(
        am5xy.DateAxis.new(root, {
            maxDeviation: 0.5,
            groupData: true,
            baseInterval: { timeUnit: "minute", count: 1 },
            renderer: am5xy.AxisRendererX.new(root, { pan: "zoom" }),
            tooltip: am5.Tooltip.new(root, {
                themeTags: ["axis"],
                animationDuration: 300,
            }),
        })
    );

    var yAxis = chart.yAxes.push(
        am5xy.ValueAxis.new(root, {
            maxDeviation: 1,
            renderer: am5xy.AxisRendererY.new(root, { pan: "zoom" }),
        })
    );

    var color = root.interfaceColors.get("background");

    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    var series = chart.series.push(
        am5xy.CandlestickSeries.new(root, {
            fill: color,
            calculateAggregates: true,
            stroke: color,
            name: "",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "value",
            openValueYField: "open",
            lowValueYField: "low",
            highValueYField: "high",
            valueXField: "date",
            lowValueYGrouped: "low",
            highValueYGrouped: "high",
            openValueYGrouped: "open",
            valueYGrouped: "close",
          
            tooltip: am5.Tooltip.new(root, {
                pointerOrientation: "horizontal",
                labelText:
                    "open: {openValueY}\nlow: {lowValueY}\nhigh: {highValueY}\nclose: {valueY}",
            }),
        })
    );

 

    // Add cursor
    // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
    var cursor = chart.set(
        "cursor",
        am5xy.XYCursor.new(root, {
            xAxis: xAxis,
        })
    );
    cursor.lineY.set("visible", false);

    // Stack axes vertically
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/#Stacked_axes
    chart.leftAxesContainer.set("layout", root.verticalLayout);

    // Add scrollbar
    // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
    var scrollbar = am5xy.XYChartScrollbar.new(root, {
        orientation: "horizontal",
        height: 50,
    });
    chart.set("scrollbarX", scrollbar);

    var sbxAxis = scrollbar.chart.xAxes.push(
        am5xy.DateAxis.new(root, {
            groupData: true,
            groupIntervals: [{ timeUnit: "week", count: 1 }],
            baseInterval: { timeUnit: "day", count: 1 },
            renderer: am5xy.AxisRendererX.new(root, {
                opposite: false,
                strokeOpacity: 0,
            }),
        })
    );

    var sbyAxis = scrollbar.chart.yAxes.push(
        am5xy.ValueAxis.new(root, {
            renderer: am5xy.AxisRendererY.new(root, {}),
        })
    );

    var sbseries = scrollbar.chart.series.push(
        am5xy.LineSeries.new(root, {
            xAxis: sbxAxis,
            yAxis: sbyAxis,
            valueYField: "value",
            valueXField: "date",
        })
    );

    // Add legend
    // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
    var legend = yAxis.axisHeader.children.push(am5.Legend.new(root, {}));

    legend.data.push(series);

    legend.markers.template.setAll({
        width: 10,
    });

    legend.markerRectangles.template.setAll({
        cornerRadiusTR: 0,
        cornerRadiusBR: 0,
        cornerRadiusTL: 0,
        cornerRadiusBL: 0,
    });

    // Hacer aparecer la serie y el gráfico
    series.appear(1000);
    chart.appear(1000, 100);

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

    function setData(portafolioGraph) {
        $.get({
            url: "/admin/getPortafolioGraph", 
            data: {
                // inicio: inicio,
                // fin: fin,
                portafolioGraph: portafolioGraph,
            },
            success: function (response) {
                var chartData = [];

                if (response.chartData.length == 0) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "No hay registros para mostrar",
                    });
                }

                response.chartData.map(function (item) {
                    chartData.push({
                        date: new Date(item.time).getTime(),
                        open: item.open,
                        high: item.high,
                        low: item.low,
                        value: item.close,
                    });
                });

                // Configurar los datos en las series del gráfico
                sbseries.data.setAll(chartData);
                series.data.setAll(chartData);
            },
            error: function (error) {
                console.log(error);
            },
        });
    }

    $(document).on("click", "#obtenerRegistros", () => {
        // let fecha_inicio = $("#fechaDesdeInput").val();
        // let fecha_fin = $("#fechaHastaInput").val();
        let portafolioGraph = $("#portafolioGraph").val();

        // if (fecha_inicio.length > 0 && fecha_fin.length > 0) {
        //     if (fecha_inicio > fecha_fin) {
        //         $("#fechaDesdeInput").val(0);
        //         $("#fechaHastaInput").val(0);
        //         $("#portafolioGraph").val(0);
        //         Swal.fire({
        //             icon: "warning",
        //             title: '<h1 style="font-family: Poppins; font-weight: 700;">Error en fechas</h1>',
        //             html: '<p style="font-family: Poppins">La fecha de inicio debe de ser menor a la fecha de fin.</p>',
        //             confirmButtonText:
        //                 '<a style="font-family: Poppins">Aceptar</a>',
        //             confirmButtonColor: "#01bbcc",
        //         });
        //     } else {
                setData(portafolioGraph);
        //     }
        // } else {
        //     Swal.fire({
        //         icon: "warning",
        //         title: '<h1 style="font-family: Poppins; font-weight: 700;">Advertencia</h1>',
        //         html: '<p style="font-family: Poppins">Debes de seleccionar dos fechas.</p>',
        //         confirmButtonText:
        //             '<a style="font-family: Poppins">Aceptar</a>',
        //         confirmButtonColor: "#01bbcc",
        //     });
        // }
    });
}); // end am5.ready()
