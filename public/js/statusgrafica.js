var root = null;
var url = window.location + "";
var separador = url.split("/");
var traderID = separador[separador.length - 1];

$("#fechasForm").on("submit", function (e) {
    e.preventDefault();

    if (root !== null) {
        root.dispose();
    }
    am5.ready(function () {
        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        root = am5.Root.new("statusgrafica");

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
                maxTooltipDistance: 0,
                pinchZoomX: true,
            })
        );

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

        var series1;
        var series2;
        var series3;
        var series4;
        var series5;
        var series6;
        var series7;
        var series8;
        var series9;
        var series10;
        var series11;
        var series12;
        var series13;
        var series14;
        var series15;
        var series16;
        var series17;
        var series18;
        var series19;
        var series20;
        var series21;
        var series22;
        var series23;
        var series24;
        var series25;
        var series26;
        var series27;
        var series28;

        var fecha_inicio = $("#fechaInicioInput").val();
        var fecha_fin = $("#fechaFinInput").val();

        function setData() {
            // $.get({
            //     url: "/admin/getMonedasStatus",
            //     success: function (response) {
            //         response.monedas.map(function (moneda, i, row) {
            $.get({
                url: "/admin/getStatusGraficaProfit",
                data: {
                    fecha_inicio: fecha_inicio,
                    fecha_fin: fecha_fin,
                    id: traderID,
                },
                success: function (response) {
                    console.log(response);
                    var data = [];

                    series1 = chart.series.push(
                        am5xy.LineSeries.new(root, {
                            name: moneda.moneda,
                            xAxis: xAxis,
                            yAxis: yAxis,
                            valueYField: "value",
                            valueXField: "date",
                            legendValueText: "{valueY}",
                            tooltip: am5.Tooltip.new(root, {
                                pointerOrientation: "horizontal",
                                labelText: "EURUSD: {valueY}",
                            }),
                        })
                    );

                    series2 = chart.series.push(
                        am5xy.LineSeries.new(root, {
                            name: moneda.moneda,
                            xAxis: xAxis,
                            yAxis: yAxis,
                            valueYField: "value",
                            valueXField: "date",
                            legendValueText: "{valueY}",
                            tooltip: am5.Tooltip.new(root, {
                                pointerOrientation: "horizontal",
                                labelText: "GBPUSD: {valueY}",
                            }),
                        })
                    );

                    series3 = chart.series.push(
                        am5xy.LineSeries.new(root, {
                            name: moneda.moneda,
                            xAxis: xAxis,
                            yAxis: yAxis,
                            valueYField: "value",
                            valueXField: "date",
                            legendValueText: "{valueY}",
                            tooltip: am5.Tooltip.new(root, {
                                pointerOrientation: "horizontal",
                                labelText: "AUDUSD: {valueY}",
                            }),
                        })
                    );

                    series4 = chart.series.push(
                        am5xy.LineSeries.new(root, {
                            name: moneda.moneda,
                            xAxis: xAxis,
                            yAxis: yAxis,
                            valueYField: "value",
                            valueXField: "date",
                            legendValueText: "{valueY}",
                            tooltip: am5.Tooltip.new(root, {
                                pointerOrientation: "horizontal",
                                labelText: "NZDUSD: {valueY}",
                            }),
                        })
                    );

                    series5 = chart.series.push(
                        am5xy.LineSeries.new(root, {
                            name: moneda.moneda,
                            xAxis: xAxis,
                            yAxis: yAxis,
                            valueYField: "value",
                            valueXField: "date",
                            legendValueText: "{valueY}",
                            tooltip: am5.Tooltip.new(root, {
                                pointerOrientation: "horizontal",
                                labelText: "USDCAD: {valueY}",
                            }),
                        })
                    );

                    series6 = chart.series.push(
                        am5xy.LineSeries.new(root, {
                            name: moneda.moneda,
                            xAxis: xAxis,
                            yAxis: yAxis,
                            valueYField: "value",
                            valueXField: "date",
                            legendValueText: "{valueY}",
                            tooltip: am5.Tooltip.new(root, {
                                pointerOrientation: "horizontal",
                                labelText: "USDCHF: {valueY}",
                            }),
                        })
                    );

                    series7 = chart.series.push(
                        am5xy.LineSeries.new(root, {
                            name: moneda.moneda,
                            xAxis: xAxis,
                            yAxis: yAxis,
                            valueYField: "value",
                            valueXField: "date",
                            legendValueText: "{valueY}",
                            tooltip: am5.Tooltip.new(root, {
                                pointerOrientation: "horizontal",
                                labelText: "USDJPY: {valueY}",
                            }),
                        })
                    );

                    series8 = chart.series.push(
                        am5xy.LineSeries.new(root, {
                            name: moneda.moneda,
                            xAxis: xAxis,
                            yAxis: yAxis,
                            valueYField: "value",
                            valueXField: "date",
                            legendValueText: "{valueY}",
                            tooltip: am5.Tooltip.new(root, {
                                pointerOrientation: "horizontal",
                                labelText: "{valueY}",
                            }),
                        })
                    );

                    series9 = chart.series.push(
                        am5xy.LineSeries.new(root, {
                            name: moneda.moneda,
                            xAxis: xAxis,
                            yAxis: yAxis,
                            valueYField: "value",
                            valueXField: "date",
                            legendValueText: "{valueY}",
                            tooltip: am5.Tooltip.new(root, {
                                pointerOrientation: "horizontal",
                                labelText: "{valueY}",
                            }),
                        })
                    );

                    series10 = chart.series.push(
                        am5xy.LineSeries.new(root, {
                            name: moneda.moneda,
                            xAxis: xAxis,
                            yAxis: yAxis,
                            valueYField: "value",
                            valueXField: "date",
                            legendValueText: "{valueY}",
                            tooltip: am5.Tooltip.new(root, {
                                pointerOrientation: "horizontal",
                                labelText: "{valueY}",
                            }),
                        })
                    );

                    series11 = chart.series.push(
                        am5xy.LineSeries.new(root, {
                            name: moneda.moneda,
                            xAxis: xAxis,
                            yAxis: yAxis,
                            valueYField: "value",
                            valueXField: "date",
                            legendValueText: "{valueY}",
                            tooltip: am5.Tooltip.new(root, {
                                pointerOrientation: "horizontal",
                                labelText: "{valueY}",
                            }),
                        })
                    );

                    series12 = chart.series.push(
                        am5xy.LineSeries.new(root, {
                            name: moneda.moneda,
                            xAxis: xAxis,
                            yAxis: yAxis,
                            valueYField: "value",
                            valueXField: "date",
                            legendValueText: "{valueY}",
                            tooltip: am5.Tooltip.new(root, {
                                pointerOrientation: "horizontal",
                                labelText: "{valueY}",
                            }),
                        })
                    );

                    series13 = chart.series.push(
                        am5xy.LineSeries.new(root, {
                            name: moneda.moneda,
                            xAxis: xAxis,
                            yAxis: yAxis,
                            valueYField: "value",
                            valueXField: "date",
                            legendValueText: "{valueY}",
                            tooltip: am5.Tooltip.new(root, {
                                pointerOrientation: "horizontal",
                                labelText: "{valueY}",
                            }),
                        })
                    );

                    series14 = chart.series.push(
                        am5xy.LineSeries.new(root, {
                            name: moneda.moneda,
                            xAxis: xAxis,
                            yAxis: yAxis,
                            valueYField: "value",
                            valueXField: "date",
                            legendValueText: "{valueY}",
                            tooltip: am5.Tooltip.new(root, {
                                pointerOrientation: "horizontal",
                                labelText: "{valueY}",
                            }),
                        })
                    );

                    series15 = chart.series.push(
                        am5xy.LineSeries.new(root, {
                            name: moneda.moneda,
                            xAxis: xAxis,
                            yAxis: yAxis,
                            valueYField: "value",
                            valueXField: "date",
                            legendValueText: "{valueY}",
                            tooltip: am5.Tooltip.new(root, {
                                pointerOrientation: "horizontal",
                                labelText: "{valueY}",
                            }),
                        })
                    );

                    series16 = chart.series.push(
                        am5xy.LineSeries.new(root, {
                            name: moneda.moneda,
                            xAxis: xAxis,
                            yAxis: yAxis,
                            valueYField: "value",
                            valueXField: "date",
                            legendValueText: "{valueY}",
                            tooltip: am5.Tooltip.new(root, {
                                pointerOrientation: "horizontal",
                                labelText: "{valueY}",
                            }),
                        })
                    );

                    series17 = chart.series.push(
                        am5xy.LineSeries.new(root, {
                            name: moneda.moneda,
                            xAxis: xAxis,
                            yAxis: yAxis,
                            valueYField: "value",
                            valueXField: "date",
                            legendValueText: "{valueY}",
                            tooltip: am5.Tooltip.new(root, {
                                pointerOrientation: "horizontal",
                                labelText: "{valueY}",
                            }),
                        })
                    );

                    series18 = chart.series.push(
                        am5xy.LineSeries.new(root, {
                            name: moneda.moneda,
                            xAxis: xAxis,
                            yAxis: yAxis,
                            valueYField: "value",
                            valueXField: "date",
                            legendValueText: "{valueY}",
                            tooltip: am5.Tooltip.new(root, {
                                pointerOrientation: "horizontal",
                                labelText: "{valueY}",
                            }),
                        })
                    );

                    series19 = chart.series.push(
                        am5xy.LineSeries.new(root, {
                            name: moneda.moneda,
                            xAxis: xAxis,
                            yAxis: yAxis,
                            valueYField: "value",
                            valueXField: "date",
                            legendValueText: "{valueY}",
                            tooltip: am5.Tooltip.new(root, {
                                pointerOrientation: "horizontal",
                                labelText: "{valueY}",
                            }),
                        })
                    );

                    series20 = chart.series.push(
                        am5xy.LineSeries.new(root, {
                            name: moneda.moneda,
                            xAxis: xAxis,
                            yAxis: yAxis,
                            valueYField: "value",
                            valueXField: "date",
                            legendValueText: "{valueY}",
                            tooltip: am5.Tooltip.new(root, {
                                pointerOrientation: "horizontal",
                                labelText: "{valueY}",
                            }),
                        })
                    );

                    series21 = chart.series.push(
                        am5xy.LineSeries.new(root, {
                            name: moneda.moneda,
                            xAxis: xAxis,
                            yAxis: yAxis,
                            valueYField: "value",
                            valueXField: "date",
                            legendValueText: "{valueY}",
                            tooltip: am5.Tooltip.new(root, {
                                pointerOrientation: "horizontal",
                                labelText: "{valueY}",
                            }),
                        })
                    );

                    series22 = chart.series.push(
                        am5xy.LineSeries.new(root, {
                            name: moneda.moneda,
                            xAxis: xAxis,
                            yAxis: yAxis,
                            valueYField: "value",
                            valueXField: "date",
                            legendValueText: "{valueY}",
                            tooltip: am5.Tooltip.new(root, {
                                pointerOrientation: "horizontal",
                                labelText: "{valueY}",
                            }),
                        })
                    );

                    series23 = chart.series.push(
                        am5xy.LineSeries.new(root, {
                            name: moneda.moneda,
                            xAxis: xAxis,
                            yAxis: yAxis,
                            valueYField: "value",
                            valueXField: "date",
                            legendValueText: "{valueY}",
                            tooltip: am5.Tooltip.new(root, {
                                pointerOrientation: "horizontal",
                                labelText: "{valueY}",
                            }),
                        })
                    );

                    series24 = chart.series.push(
                        am5xy.LineSeries.new(root, {
                            name: moneda.moneda,
                            xAxis: xAxis,
                            yAxis: yAxis,
                            valueYField: "value",
                            valueXField: "date",
                            legendValueText: "{valueY}",
                            tooltip: am5.Tooltip.new(root, {
                                pointerOrientation: "horizontal",
                                labelText: "{valueY}",
                            }),
                        })
                    );

                    series25 = chart.series.push(
                        am5xy.LineSeries.new(root, {
                            name: moneda.moneda,
                            xAxis: xAxis,
                            yAxis: yAxis,
                            valueYField: "value",
                            valueXField: "date",
                            legendValueText: "{valueY}",
                            tooltip: am5.Tooltip.new(root, {
                                pointerOrientation: "horizontal",
                                labelText: "{valueY}",
                            }),
                        })
                    );

                    series26 = chart.series.push(
                        am5xy.LineSeries.new(root, {
                            name: moneda.moneda,
                            xAxis: xAxis,
                            yAxis: yAxis,
                            valueYField: "value",
                            valueXField: "date",
                            legendValueText: "{valueY}",
                            tooltip: am5.Tooltip.new(root, {
                                pointerOrientation: "horizontal",
                                labelText: "{valueY}",
                            }),
                        })
                    );

                    series27 = chart.series.push(
                        am5xy.LineSeries.new(root, {
                            name: moneda.moneda,
                            xAxis: xAxis,
                            yAxis: yAxis,
                            valueYField: "value",
                            valueXField: "date",
                            legendValueText: "{valueY}",
                            tooltip: am5.Tooltip.new(root, {
                                pointerOrientation: "horizontal",
                                labelText: "{valueY}",
                            }),
                        })
                    );

                    series28 = chart.series.push(
                        am5xy.LineSeries.new(root, {
                            name: moneda.moneda,
                            xAxis: xAxis,
                            yAxis: yAxis,
                            valueYField: "value",
                            valueXField: "date",
                            legendValueText: "{valueY}",
                            tooltip: am5.Tooltip.new(root, {
                                pointerOrientation: "horizontal",
                                labelText: "EURUSD: {valueY}",
                            }),
                        })
                    );

                    response.monedas.map(function (valor) {
                        eje = response.valor_eje;

                        var moneda = currency.moneda;

                        if (moneda.substring(0, 3) == "USD") {
                            valor = (currency.valor / eje - 1) * 100 * -1;
                        } else {
                            valor = (currency.valor / eje - 1) * 100;
                        }

                        data.push({
                            date: new Date(currency.hora).getTime(),
                            value: valor,
                        });
                    });

                    series.data.setAll(data);

                    series.appear();

                    // if (i + 1 === row.length) {
                    var cursor = chart.set(
                        "cursor",
                        am5xy.XYCursor.new(root, {
                            behavior: "none",
                        })
                    );
                    cursor.lineY.set("visible", false);
                    chart.set(
                        "scrollbarX",
                        am5.Scrollbar.new(root, {
                            orientation: "horizontal",
                        })
                    );
                    chart.set(
                        "scrollbarY",
                        am5.Scrollbar.new(root, {
                            orientation: "vertical",
                        })
                    );
                    var legend = chart.rightAxesContainer.children.push(
                        am5.Legend.new(root, {
                            width: 200,
                            paddingLeft: 15,
                            height: am5.percent(100),
                        })
                    );
                    legend.itemContainers.template.events.on(
                        "pointerover",
                        function (e) {
                            var itemContainer = e.target;

                            // As series list is data of a legend, dataContext is series
                            var series = itemContainer.dataItem.dataContext;

                            chart.series.each(function (chartSeries) {
                                if (chartSeries != series) {
                                    chartSeries.strokes.template.setAll({
                                        strokeOpacity: 0.15,
                                        stroke: am5.color(0x000000),
                                    });
                                } else {
                                    chartSeries.strokes.template.setAll({
                                        strokeWidth: 3,
                                    });
                                }
                            });
                        }
                    );
                    legend.itemContainers.template.events.on(
                        "pointerout",
                        function (e) {
                            var itemContainer = e.target;
                            var series = itemContainer.dataItem.dataContext;

                            chart.series.each(function (chartSeries) {
                                chartSeries.strokes.template.setAll({
                                    strokeOpacity: 1,
                                    strokeWidth: 1,
                                    stroke: chartSeries.get("fill"),
                                });
                            });
                        }
                    );
                    legend.itemContainers.template.set("width", am5.p100);
                    legend.valueLabels.template.setAll({
                        width: am5.p100,
                        textAlign: "right",
                    });
                    legend.data.setAll(chart.series.values);
                    // }
                },
                error: function (error) {
                    console.log(error);
                },
            });
            //         });
            //     },
            // });
        }

        setData();
        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        chart.appear(1000, 100);
    });
});
