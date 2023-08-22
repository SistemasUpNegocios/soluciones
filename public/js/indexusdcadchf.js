var root = null;
$("#fechasForm").on("submit", function (e) {
    e.preventDefault();

    if (root !== null) {
        root.dispose();
    }
    am5.ready(function () {
        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        root = am5.Root.new("indexUSDCADCHF");

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

        var series;
        var eje;
        var valor;

        var fecha_desde = $("#fechaDesdeInput").val();
        var fecha_eje = $("#fechaEjeInput").val();

        function setData() {
            $.get({
                url: "/admin/getMonedasUSDCADCHF",
                success: function (response) {
                    response.monedas.map(function (moneda, i, row) {
                        $.get({
                            url: "/admin/getIndexUSDUSDCADCHF",
                            data: {
                                fecha_desde: fecha_desde,
                                fecha_eje: fecha_eje,
                                moneda: moneda.moneda,
                            },
                            success: function (response) {
                                var data = [];

                                series = chart.series.push(
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

                                response.currencies.map(function (
                                    currency,
                                    i,
                                    row
                                ) {
                                    eje = response.valor_eje;

                                    var moneda = currency.moneda;

                                    if (moneda.substring(0, 3) == "USD") {
                                        valor =
                                            (currency.valor / eje - 1) *
                                            100 *
                                            -1;
                                    } else {
                                        valor =
                                            (currency.valor / eje - 1) * 100;
                                    }

                                    data.push({
                                        date: new Date(currency.hora).getTime(),
                                        value: valor,
                                    });
                                });

                                series.data.setAll(data);

                                series.appear();

                                if (i + 1 === row.length) {
                                    // Add cursor
                                    // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
                                    var cursor = chart.set(
                                        "cursor",
                                        am5xy.XYCursor.new(root, {
                                            behavior: "none",
                                        })
                                    );
                                    cursor.lineY.set("visible", false);

                                    // Add scrollbar
                                    // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
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

                                    // Add legend
                                    // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
                                    var legend =
                                        chart.rightAxesContainer.children.push(
                                            am5.Legend.new(root, {
                                                width: 200,
                                                paddingLeft: 15,
                                                height: am5.percent(100),
                                            })
                                        );

                                    // When legend item container is hovered, dim all the series except the hovered one
                                    legend.itemContainers.template.events.on(
                                        "pointerover",
                                        function (e) {
                                            var itemContainer = e.target;

                                            // As series list is data of a legend, dataContext is series
                                            var series =
                                                itemContainer.dataItem
                                                    .dataContext;

                                            chart.series.each(function (
                                                chartSeries
                                            ) {
                                                if (chartSeries != series) {
                                                    chartSeries.strokes.template.setAll(
                                                        {
                                                            strokeOpacity: 0.15,
                                                            stroke: am5.color(
                                                                0x000000
                                                            ),
                                                        }
                                                    );
                                                } else {
                                                    chartSeries.strokes.template.setAll(
                                                        {
                                                            strokeWidth: 3,
                                                        }
                                                    );
                                                }
                                            });
                                        }
                                    );

                                    // When legend item container is unhovered, make all series as they are
                                    legend.itemContainers.template.events.on(
                                        "pointerout",
                                        function (e) {
                                            var itemContainer = e.target;
                                            var series =
                                                itemContainer.dataItem
                                                    .dataContext;

                                            chart.series.each(function (
                                                chartSeries
                                            ) {
                                                chartSeries.strokes.template.setAll(
                                                    {
                                                        strokeOpacity: 1,
                                                        strokeWidth: 1,
                                                        stroke: chartSeries.get(
                                                            "fill"
                                                        ),
                                                    }
                                                );
                                            });
                                        }
                                    );

                                    legend.itemContainers.template.set(
                                        "width",
                                        am5.p100
                                    );
                                    legend.valueLabels.template.setAll({
                                        width: am5.p100,
                                        textAlign: "right",
                                    });

                                    // It's is important to set legend data after all the events are set on template, otherwise events won't be copied
                                    legend.data.setAll(chart.series.values);
                                }
                            },
                            error: function (error) {
                                console.log(error);
                            },
                        });
                    });
                },
            });
        }

        setData();
        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        chart.appear(1000, 100);
    });
});
