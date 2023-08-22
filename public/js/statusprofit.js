//Se obtiene el valor de la URL desde el navegador
var url = window.location + "";
var separador = url.split("/");
var traderID = separador[separador.length - 1];

am5.ready(function () {
    var root = am5.Root.new("statusprofit");
    root.setThemes([am5themes_Animated.new(root)]);
    var chart = root.container.children.push(
        am5xy.XYChart.new(root, {
            panX: true,
            panY: true,
            wheelX: "panX",
            wheelY: "zoomX",
            pinchZoomX: true,
        })
    );
    var cursor = chart.set(
        "cursor",
        am5xy.XYCursor.new(root, {
            behavior: "zoomX",
        })
    );
    cursor.lineY.set("visible", false);

    var xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 30 });
    xRenderer.labels.template.setAll({
        rotation: -90,
        centerY: am5.p50,
        centerX: am5.p100,
    });

    var xAxis = chart.xAxes.push(
        am5xy.CategoryAxis.new(root, {
            categoryField: "par",
            renderer: xRenderer,
        })
    );

    var yAxis = chart.yAxes.push(
        am5xy.ValueAxis.new(root, {
            renderer: am5xy.AxisRendererY.new(root, {}),
        })
    );

    var series = chart.series.push(
        am5xy.ColumnSeries.new(root, {
            name: "Series 1",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "value",
            sequencedInterpolation: true,
            categoryXField: "par",
            tooltip: am5.Tooltip.new(root, {
                labelText: "{valueY}",
            }),
        })
    );

    series.columns.template.setAll({ strokeOpacity: 0 });

    // Add scrollbar
    // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
    chart.set(
        "scrollbarX",
        am5.Scrollbar.new(root, {
            orientation: "horizontal",
        })
    );

    let data = [];
    let pares = [
        "eurusd",
        "gbpusd",
        "audusd",
        "nzdusd",
        "usdcad",
        "usdchf",
        "usdjpy",
        "eurgbp",
        "euraud",
        "eurnzd",
        "gbpaud",
        "gbpnzd",
        "audnzd",
        "eurcad",
        "eurchf",
        "eurjpy",
        "gbpcad",
        "gbpchf",
        "gbpjpy",
        "audcad",
        "audchf",
        "audjpy",
        "nzdcad",
        "nzdchf",
        "nzdjpy",
        "cadchf",
        "cadjpy",
        "chfjpy",
    ];

    for (let i = 0; i < pares.length; i++) {
        $.get({
            url: "/admin/getStatusGraficaProfit",
            data: {
                id: traderID,
                par: pares[i],
            },
            success: function (response) {
                let par = pares[i].toUpperCase();
                let valor = parseFloat(response).toFixed(2);
                data.push({
                    par: par,
                    value: parseFloat(valor),
                });

                if (i == pares.length - 1) {
                    xAxis.data.setAll(data);
                    series.data.setAll(data);
                }
            },
            error: function (error) {
                console.log(error);
            },
        });
    }

    series.appear(1000);
    chart.appear(1000, 100);
});
