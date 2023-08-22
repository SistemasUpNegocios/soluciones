am5.ready(function () {
    var root = am5.Root.new("statusequity");
    root.setThemes([am5themes_Animated.new(root)]);
    function generateChartData() {
        var chartData = [];
        var firstDate = new Date();
        firstDate.setDate(firstDate.getDate() - 1000);
        firstDate.setHours(0, 0, 0, 0);
        var value = 1200;
        for (var i = 0; i < 5000; i++) {
            var newDate = new Date(firstDate);
            newDate.setDate(newDate.getDate() + i);

            value += Math.round(
                (Math.random() < 0.5 ? 1 : -1) * Math.random() * 10
            );
            var open = value + Math.round(Math.random() * 16 - 8);
            var low = Math.min(value, open) - Math.round(Math.random() * 5);
            var high = Math.max(value, open) + Math.round(Math.random() * 5);

            chartData.push({
                date: newDate.getTime(),
                value: value,
                open: open,
                low: low,
                high: high,
            });
        }
        return chartData;
    }
    var data = generateChartData();
    var chart = root.container.children.push(
        am5xy.XYChart.new(root, {
            focusable: true,
            panX: true,
            panY: true,
            wheelX: "panX",
            wheelY: "zoomX",
        })
    );
    var xAxis = chart.xAxes.push(
        am5xy.DateAxis.new(root, {
            maxDeviation: 0.5,
            groupData: true,
            baseInterval: { timeUnit: "day", count: 1 },
            renderer: am5xy.AxisRendererX.new(root, { pan: "zoom" }),
            tooltip: am5.Tooltip.new(root, {}),
        })
    );
    var yAxis = chart.yAxes.push(
        am5xy.ValueAxis.new(root, {
            maxDeviation: 1,
            renderer: am5xy.AxisRendererY.new(root, { pan: "zoom" }),
        })
    );
    var color = root.interfaceColors.get("background");
    var series = chart.series.push(
        am5xy.OHLCSeries.new(root, {
            fill: color,
            calculateAggregates: true,
            stroke: color,
            name: "MDXI",
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
            legendValueText:
                "open: {openValueY} low: {lowValueY} high: {highValueY} close: {valueY}",
            legendRangeValueText: "{valueYClose}",
            tooltip: am5.Tooltip.new(root, {
                pointerOrientation: "horizontal",
                labelText:
                    "open: {openValueY}\nlow: {lowValueY}\nhigh: {highValueY}\nclose: {valueY}",
            }),
        })
    );
    var cursor = chart.set(
        "cursor",
        am5xy.XYCursor.new(root, {
            xAxis: xAxis,
        })
    );
    cursor.lineY.set("visible", false);
    chart.leftAxesContainer.set("layout", root.verticalLayout);
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
    series.data.setAll(data);
    sbseries.data.setAll(data);
    series.appear(1000);
    chart.appear(1000, 100);
});
