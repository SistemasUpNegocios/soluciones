$(document).ready(function () {
    var fecha = new Date();
    fecha.setHours(fecha.getHours() - 5);

    $("#fromInput").attr(
        "max",
        new Date()
            .toISOString()
            .slice(0, new Date().toISOString().lastIndexOf(":"))
    );
    $("#toInput").attr(
        "max",
        new Date()
            .toISOString()
            .slice(0, new Date().toISOString().lastIndexOf(":"))
    );

    $("#toInput").val(
        fecha.toISOString().slice(0, new Date().toISOString().lastIndexOf(":"))
    );

    //Se obtiene el valor de la URL desde el navegador
    var url = window.location + "";
    var separador = url.split("/");
    var id = separador[separador.length - 1];
    $("#idInput").val(id);
    var root = "";
    var root2 = "";
    var root3 = "";
    var root4 = "";
    var root5 = "";
    var root6 = "";

    const graficas = (url, inicio, fin) => {
        //gráfica de balance
        am5.ready(function () {
            if (root != "") {
                root.dispose();
            }
            // Create root element
            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
            root = am5.Root.new("chartdivBalance");

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
                    maxDeviation: 0.2,
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

            // Add series
            // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
            var series = chart.series.push(
                am5xy.LineSeries.new(root, {
                    name: "Series",
                    xAxis: xAxis,
                    yAxis: yAxis,
                    valueYField: "value",
                    valueXField: "date",
                    stroke: "#00f",
                    fill: "#00f4",
                    tooltip: am5.Tooltip.new(root, {
                        labelText: "{valueY}",
                    }),
                })
            );

            // Add scrollbar
            // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
            chart.set(
                "scrollbarX",
                am5.Scrollbar.new(root, {
                    orientation: "horizontal",
                })
            );

            // obtener data al iniciar
            const balanceFunction = () => {
                if (url == "showTraderReport") {
                    $.get({
                        url: `/admin/${url}`,
                        data: {
                            id: id,
                            inicio: inicio,
                            fin: fin,
                        },
                        success: function (response) {
                            console.log(response);
                            var data = [];
                            $("#numeroTrader").text(
                                `Reporte de ${response.tradersNombre[0].nombre}`
                            );
                            response.traders.map(function (trader) {
                                data.push({
                                    date: new Date(trader.fecha).getTime(),
                                    value: trader.balance,
                                });
                                series.data.setAll(data);
                            });
                        },
                        error: function (error) {
                            console.log(error);
                        },
                    });
                } else {
                    $.get({
                        url: `/admin/${url}`,
                        data: {
                            id: id,
                        },
                        success: function (response) {
                            console.log(response);
                            var data = [];
                            $("#numeroTrader").text(
                                `Reporte de ${response.tradersNombre[0].nombre} (Última hora)`
                            );
                            response.traders.map(function (trader) {
                                data.push({
                                    date: new Date(trader.fecha).getTime(),
                                    value: trader.balance,
                                });
                                series.data.setAll(data);
                            });
                        },
                        error: function (error) {
                            console.log(error);
                        },
                    });
                }
            };

            setInterval(function () {
                balanceFunction();
            }, 60000);

            balanceFunction();

            // Make stuff animate on load
            // https://www.amcharts.com/docs/v5/concepts/animations/
            series.appear(1000);
            chart.appear(1000, 100);
        });

        // //gráfica de equity
        am5.ready(function () {
            if (root2 != "") {
                root2.dispose();
            }
            // Create root2 element
            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
            root2 = am5.Root.new("chartdivEquity");

            // Set themes
            // https://www.amcharts.com/docs/v5/concepts/themes/
            root2.setThemes([am5themes_Animated.new(root2)]);

            // Create chart
            // https://www.amcharts.com/docs/v5/charts/xy-chart/
            var chart = root2.container.children.push(
                am5xy.XYChart.new(root2, {
                    panX: true,
                    panY: true,
                    wheelX: "panX",
                    wheelY: "zoomX",
                    pinchZoomX: true,
                })
            );

            // Add cursor
            // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
            var cursor = chart.set(
                "cursor",
                am5xy.XYCursor.new(root2, {
                    behavior: "none",
                })
            );
            cursor.lineY.set("visible", false);

            // Create axes
            // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
            var xAxis = chart.xAxes.push(
                am5xy.DateAxis.new(root2, {
                    maxDeviation: 0.2,
                    baseInterval: {
                        timeUnit: "minute",
                        count: 1,
                    },
                    renderer: am5xy.AxisRendererX.new(root2, {}),
                    tooltip: am5.Tooltip.new(root2, {}),
                })
            );

            var yAxis = chart.yAxes.push(
                am5xy.ValueAxis.new(root2, {
                    renderer: am5xy.AxisRendererY.new(root2, {}),
                })
            );

            // Add series
            // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
            var series = chart.series.push(
                am5xy.LineSeries.new(root2, {
                    name: "Series",
                    xAxis: xAxis,
                    yAxis: yAxis,
                    valueYField: "value",
                    valueXField: "date",
                    stroke: "#6a972f",
                    fill: "#6a972f8e",
                    tooltip: am5.Tooltip.new(root2, {
                        labelText: "{valueY}",
                    }),
                })
            );

            // Add scrollbar
            // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
            chart.set(
                "scrollbarX",
                am5.Scrollbar.new(root2, {
                    orientation: "horizontal",
                })
            );

            // obtener data al iniciar
            const equityFunction = () => {
                if (url == "showTraderReport") {
                    $.get({
                        url: `/admin/${url}`,
                        data: {
                            id: id,
                            inicio: inicio,
                            fin: fin,
                        },
                        success: function (response) {
                            var data = [];
                            response.traders.map(function (trader) {
                                data.push({
                                    date: new Date(trader.fecha).getTime(),
                                    value: trader.equity,
                                });
                                series.data.setAll(data);
                            });
                        },
                        error: function (error) {
                            console.log(error);
                        },
                    });
                } else {
                    $.get({
                        url: `/admin/${url}`,
                        data: {
                            id: id,
                        },
                        success: function (response) {
                            var data = [];
                            response.traders.map(function (trader) {
                                data.push({
                                    date: new Date(trader.fecha).getTime(),
                                    value: trader.equity,
                                });
                                series.data.setAll(data);
                            });
                        },
                        error: function (error) {
                            console.log(error);
                        },
                    });
                }
            };
            setInterval(function () {
                equityFunction();
            }, 60000);

            equityFunction();

            // Make stuff animate on load
            // https://www.amcharts.com/docs/v5/concepts/animations/
            series.appear(1000);
            chart.appear(1000, 100);
        });

        //gráfica de margen
        am5.ready(function () {
            if (root3 != "") {
                root3.dispose();
            }
            // Create root3 element
            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
            root3 = am5.Root.new("chartdivMargen");

            // Set themes
            // https://www.amcharts.com/docs/v5/concepts/themes/
            root3.setThemes([am5themes_Animated.new(root3)]);

            // Create chart
            // https://www.amcharts.com/docs/v5/charts/xy-chart/
            var chart = root3.container.children.push(
                am5xy.XYChart.new(root3, {
                    panX: true,
                    panY: true,
                    wheelX: "panX",
                    wheelY: "zoomX",
                    pinchZoomX: true,
                })
            );

            // Add cursor
            // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
            var cursor = chart.set(
                "cursor",
                am5xy.XYCursor.new(root3, {
                    behavior: "none",
                })
            );
            cursor.lineY.set("visible", false);

            // Create axes
            // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
            var xAxis = chart.xAxes.push(
                am5xy.DateAxis.new(root3, {
                    maxDeviation: 0.2,
                    baseInterval: {
                        timeUnit: "minute",
                        count: 1,
                    },
                    renderer: am5xy.AxisRendererX.new(root3, {}),
                    tooltip: am5.Tooltip.new(root3, {}),
                })
            );

            var yAxis = chart.yAxes.push(
                am5xy.ValueAxis.new(root3, {
                    renderer: am5xy.AxisRendererY.new(root3, {}),
                })
            );

            // Add series
            // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
            var series = chart.series.push(
                am5xy.LineSeries.new(root3, {
                    name: "Series",
                    xAxis: xAxis,
                    yAxis: yAxis,
                    valueYField: "value",
                    valueXField: "date",
                    tooltip: am5.Tooltip.new(root3, {
                        labelText: "{valueY}",
                    }),
                })
            );

            // Add scrollbar
            // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
            chart.set(
                "scrollbarX",
                am5.Scrollbar.new(root3, {
                    orientation: "horizontal",
                })
            );

            // obtener data al iniciar

            const margenFunction = () => {
                if (url == "showTraderReport") {
                    $.get({
                        url: `/admin/${url}`,
                        data: {
                            id: id,
                            inicio: inicio,
                            fin: fin,
                        },
                        success: function (response) {
                            var data = [];
                            response.traders.map(function (trader) {
                                data.push({
                                    date: new Date(trader.fecha).getTime(),
                                    value: trader.margin,
                                });
                                series.data.setAll(data);
                            });
                        },
                        error: function (error) {
                            console.log(error);
                        },
                    });
                } else {
                    $.get({
                        url: `/admin/${url}`,
                        data: {
                            id: id,
                        },
                        success: function (response) {
                            var data = [];
                            response.traders.map(function (trader) {
                                data.push({
                                    date: new Date(trader.fecha).getTime(),
                                    value: trader.margin,
                                });
                                series.data.setAll(data);
                            });
                        },
                        error: function (error) {
                            console.log(error);
                        },
                    });
                }
            };

            setInterval(function () {
                margenFunction();
            }, 60000);

            margenFunction();

            // Make stuff animate on load
            // https://www.amcharts.com/docs/v5/concepts/animations/
            series.appear(1000);
            chart.appear(1000, 100);
        });

        //gráfica de risk
        am5.ready(function () {
            if (root4 != "") {
                root4.dispose();
            }
            // Create root4 element
            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
            root4 = am5.Root.new("chartdivRisk");

            // Set themes
            // https://www.amcharts.com/docs/v5/concepts/themes/
            root4.setThemes([am5themes_Animated.new(root4)]);

            // Create chart
            // https://www.amcharts.com/docs/v5/charts/xy-chart/
            var chart = root4.container.children.push(
                am5xy.XYChart.new(root4, {
                    panX: true,
                    panY: true,
                    wheelX: "panX",
                    wheelY: "zoomX",
                    pinchZoomX: true,
                })
            );

            // Add cursor
            // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
            var cursor = chart.set(
                "cursor",
                am5xy.XYCursor.new(root4, {
                    behavior: "none",
                })
            );
            cursor.lineY.set("visible", false);

            // Create axes
            // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
            var xAxis = chart.xAxes.push(
                am5xy.DateAxis.new(root4, {
                    maxDeviation: 0.2,
                    baseInterval: {
                        timeUnit: "minute",
                        count: 1,
                    },
                    renderer: am5xy.AxisRendererX.new(root4, {}),
                    tooltip: am5.Tooltip.new(root4, {}),
                })
            );

            var yAxis = chart.yAxes.push(
                am5xy.ValueAxis.new(root4, {
                    renderer: am5xy.AxisRendererY.new(root4, {}),
                })
            );

            // Add series
            // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
            var series = chart.series.push(
                am5xy.LineSeries.new(root4, {
                    name: "Series",
                    xAxis: xAxis,
                    yAxis: yAxis,
                    valueYField: "value",
                    valueXField: "date",
                    stroke: "#C21010",
                    fill: "#C21010B4",
                    tooltip: am5.Tooltip.new(root4, {
                        labelText: "{valueY}",
                    }),
                })
            );

            // Add scrollbar
            // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
            chart.set(
                "scrollbarX",
                am5.Scrollbar.new(root4, {
                    orientation: "horizontal",
                })
            );

            // obtener data al iniciar
            const riskFunction = () => {
                if (url == "showTraderReport") {
                    $.get({
                        url: `/admin/${url}`,
                        data: {
                            id: id,
                            inicio: inicio,
                            fin: fin,
                        },
                        success: function (response) {
                            var data = [];
                            response.traders.map(function (trader) {
                                data.push({
                                    date: new Date(trader.fecha).getTime(),
                                    value: trader.risk,
                                });
                                series.data.setAll(data);
                            });
                        },
                        error: function (error) {
                            console.log(error);
                        },
                    });
                } else {
                    $.get({
                        url: `/admin/${url}`,
                        data: {
                            id: id,
                        },
                        success: function (response) {
                            var data = [];
                            response.traders.map(function (trader) {
                                data.push({
                                    date: new Date(trader.fecha).getTime(),
                                    value: trader.risk,
                                });
                                series.data.setAll(data);
                            });
                        },
                        error: function (error) {
                            console.log(error);
                        },
                    });
                }
            };

            setInterval(function () {
                riskFunction();
            }, 60000);

            riskFunction();

            // Make stuff animate on load
            // https://www.amcharts.com/docs/v5/concepts/animations/
            series.appear(1000);
            chart.appear(1000, 100);
        });

        //gráfica de profit
        am5.ready(function () {
            if (root5 != "") {
                root5.dispose();
            }
            // Create root5 element
            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
            root5 = am5.Root.new("chartdivProfit");

            // Set themes
            // https://www.amcharts.com/docs/v5/concepts/themes/
            root5.setThemes([am5themes_Animated.new(root5)]);

            // Create chart
            // https://www.amcharts.com/docs/v5/charts/xy-chart/
            var chart = root5.container.children.push(
                am5xy.XYChart.new(root5, {
                    panX: true,
                    panY: true,
                    wheelX: "panX",
                    wheelY: "zoomX",
                    pinchZoomX: true,
                })
            );

            // Add cursor
            // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
            var cursor = chart.set(
                "cursor",
                am5xy.XYCursor.new(root5, {
                    behavior: "none",
                })
            );
            cursor.lineY.set("visible", false);

            // Create axes
            // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
            var xAxis = chart.xAxes.push(
                am5xy.DateAxis.new(root5, {
                    maxDeviation: 0.2,
                    baseInterval: {
                        timeUnit: "minute",
                        count: 1,
                    },
                    renderer: am5xy.AxisRendererX.new(root5, {}),
                    tooltip: am5.Tooltip.new(root5, {}),
                })
            );

            var yAxis = chart.yAxes.push(
                am5xy.ValueAxis.new(root5, {
                    renderer: am5xy.AxisRendererY.new(root5, {}),
                })
            );

            // Add series
            // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
            var series = chart.series.push(
                am5xy.LineSeries.new(root5, {
                    name: "Series",
                    xAxis: xAxis,
                    yAxis: yAxis,
                    valueYField: "value",
                    valueXField: "date",
                    stroke: "#FEC260",
                    fill: "#FEC260B4",
                    tooltip: am5.Tooltip.new(root5, {
                        labelText: "{valueY}",
                    }),
                })
            );

            // Add scrollbar
            // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
            chart.set(
                "scrollbarX",
                am5.Scrollbar.new(root5, {
                    orientation: "horizontal",
                })
            );

            // obtener data al iniciar
            const profitFunction = () => {
                if (url == "showTraderReport") {
                    $.get({
                        url: `/admin/${url}`,
                        data: {
                            id: id,
                        },
                        data: {
                            id: id,
                            inicio: inicio,
                            fin: fin,
                        },
                        success: function (response) {
                            var data = [];
                            response.traders.map(function (trader) {
                                data.push({
                                    date: new Date(trader.fecha).getTime(),
                                    value: trader.profit,
                                });
                                series.data.setAll(data);
                            });
                        },
                        error: function (error) {
                            console.log(error);
                        },
                    });
                } else {
                    $.get({
                        url: `/admin/${url}`,
                        data: {
                            id: id,
                        },
                        success: function (response) {
                            var data = [];
                            response.traders.map(function (trader) {
                                data.push({
                                    date: new Date(trader.fecha).getTime(),
                                    value: trader.profit,
                                });
                                series.data.setAll(data);
                            });
                        },
                        error: function (error) {
                            console.log(error);
                        },
                    });
                }
            };

            setInterval(function () {
                profitFunction();
            }, 60000);

            profitFunction();

            // Make stuff animate on load
            // https://www.amcharts.com/docs/v5/concepts/animations/
            series.appear(1000);
            chart.appear(1000, 100);
        });

        //gráfica de ratio
        am5.ready(function () {
            if (root6 != "") {
                root6.dispose();
            }
            // Create root6 element
            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
            root6 = am5.Root.new("chartdivRatio");

            // Set themes
            // https://www.amcharts.com/docs/v5/concepts/themes/
            root6.setThemes([am5themes_Animated.new(root6)]);

            // Create chart
            // https://www.amcharts.com/docs/v5/charts/xy-chart/
            var chart = root6.container.children.push(
                am5xy.XYChart.new(root6, {
                    panX: true,
                    panY: true,
                    wheelX: "panX",
                    wheelY: "zoomX",
                    pinchZoomX: true,
                })
            );

            // Add cursor
            // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
            var cursor = chart.set(
                "cursor",
                am5xy.XYCursor.new(root6, {
                    behavior: "none",
                })
            );
            cursor.lineY.set("visible", false);

            // Create axes
            // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
            var xAxis = chart.xAxes.push(
                am5xy.DateAxis.new(root6, {
                    maxDeviation: 0.2,
                    baseInterval: {
                        timeUnit: "minute",
                        count: 1,
                    },
                    renderer: am5xy.AxisRendererX.new(root6, {}),
                    tooltip: am5.Tooltip.new(root6, {}),
                })
            );

            var yAxis = chart.yAxes.push(
                am5xy.ValueAxis.new(root6, {
                    renderer: am5xy.AxisRendererY.new(root6, {}),
                })
            );

            // Add series
            // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
            var series = chart.series.push(
                am5xy.LineSeries.new(root6, {
                    name: "Series",
                    xAxis: xAxis,
                    yAxis: yAxis,
                    valueYField: "value",
                    valueXField: "date",
                    stroke: "#94B49F",
                    fill: "#94B49FB4",
                    tooltip: am5.Tooltip.new(root6, {
                        labelText: "{valueY}",
                    }),
                })
            );

            // Add scrollbar
            // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
            chart.set(
                "scrollbarX",
                am5.Scrollbar.new(root6, {
                    orientation: "horizontal",
                })
            );

            // obtener data al iniciar
            const ratioFunction = () => {
                if (url == "showTraderReport") {
                    $.get({
                        url: `/admin/${url}`,
                        data: {
                            id: id,
                            inicio: inicio,
                            fin: fin,
                        },
                        success: function (response) {
                            var data = [];
                            response.traders.map(function (trader) {
                                data.push({
                                    date: new Date(trader.fecha).getTime(),
                                    value: trader.ratio,
                                });
                                series.data.setAll(data);
                            });
                        },
                        error: function (error) {
                            console.log(error);
                        },
                    });
                } else {
                    $.get({
                        url: `/admin/${url}`,
                        data: {
                            id: id,
                        },
                        success: function (response) {
                            var data = [];
                            response.traders.map(function (trader) {
                                data.push({
                                    date: new Date(trader.fecha).getTime(),
                                    value: trader.ratio,
                                });
                                series.data.setAll(data);
                            });
                        },
                        error: function (error) {
                            console.log(error);
                        },
                    });
                }
            };
            setInterval(function () {
                ratioFunction();
            }, 60000);

            ratioFunction();

            // Make stuff animate on load
            // https://www.amcharts.com/docs/v5/concepts/animations/
            series.appear(1000);
            chart.appear(1000, 100);
        });
    };

    graficas("showReport");

    $("#filtrar").on("click", function () {
        let fechaInicio = $("#fromInput").val();
        let fechaFin = $("#toInput").val();
        graficas("showTraderReport", fechaInicio, fechaFin);
    });
});
