var url = window.location + "";
var separador = url.split("/");
var pair = separador[separador.length - 1];

am5.ready(function () {
    var root = am5.Root.new("velocimetro1");
    root.setThemes([am5themes_Animated.new(root)]);
    var chart = root.container.children.push(
        am5radar.RadarChart.new(root, {
            panX: false,
            panY: false,
            startAngle: 180,
            endAngle: 360,
        })
    );
    var axisRenderer = am5radar.AxisRendererCircular.new(root, {
        innerRadius: -30,
        strokeOpacity: 0.1,
    });
    axisRenderer.labels.template.set("forceHidden", true);
    axisRenderer.grid.template.set("forceHidden", true);
    var xAxis = chart.xAxes.push(
        am5xy.ValueAxis.new(root, {
            maxDeviation: 0,
            min: 0,
            max: 1,
            strictMinMax: true,
            renderer: axisRenderer,
        })
    );
    var yesDataItem = xAxis.makeDataItem({});
    yesDataItem.set("value", 0);
    yesDataItem.set("endValue", 0.5);
    xAxis.createAxisRange(yesDataItem);
    yesDataItem.get("label").setAll({ text: "NO", forceHidden: false });
    yesDataItem.get("axisFill").setAll({
        visible: true,
        fillOpacity: 1,
        fill: root.interfaceColors.get("negative"),
    });
    var noDataItem = xAxis.makeDataItem({});
    noDataItem.set("value", 1);
    noDataItem.set("endValue", 0.5);
    xAxis.createAxisRange(noDataItem);
    noDataItem.get("label").setAll({ text: "YES", forceHidden: false });
    noDataItem.get("axisFill").setAll({
        visible: true,
        fillOpacity: 1,
        fill: root.interfaceColors.get("positive"),
    });
    var axisDataItem = xAxis.makeDataItem({});
    axisDataItem.set("value", 0.25);
    var bullet = axisDataItem.set(
        "bullet",
        am5xy.AxisBullet.new(root, {
            sprite: am5radar.ClockHand.new(root, {
                radius: am5.percent(99),
            }),
        })
    );
    xAxis.createAxisRange(axisDataItem);
    axisDataItem.get("grid").set("visible", false);
    let value;

    const getData = () => {
        $.ajax({
            type: "GET",
            url: "/admin/cleoDataShow",
            data: { pair: pair },
            success: function (data) {
                if (data.pair != null) {
                    value = data.pair.market;

                    if (value == 1) {
                        value = 0.75;
                    } else {
                        value = 0.25;
                    }
                } else {
                    value = 0.5;
                }
                axisDataItem.animate({
                    key: "value",
                    to: value,
                    duration: 800,
                    easing: am5.ease.out(am5.ease.cubic),
                });
            },
            error: function (response) {
                console.log(response);
            },
        });
    };

    getData();

    setInterval(function () {
        getData();
    }, 20000);
    chart.appear(1000, 100);
});

am5.ready(function () {
    var root = am5.Root.new("velocimetro2");
    root.setThemes([am5themes_Animated.new(root)]);
    var chart = root.container.children.push(
        am5radar.RadarChart.new(root, {
            panX: false,
            panY: false,
            startAngle: 180,
            endAngle: 360,
        })
    );
    var axisRenderer = am5radar.AxisRendererCircular.new(root, {
        innerRadius: -30,
        strokeOpacity: 0.1,
    });
    axisRenderer.labels.template.set("forceHidden", true);
    axisRenderer.grid.template.set("forceHidden", true);
    var xAxis = chart.xAxes.push(
        am5xy.ValueAxis.new(root, {
            maxDeviation: 0,
            min: 0,
            max: 1,
            strictMinMax: true,
            renderer: axisRenderer,
        })
    );
    var yesDataItem = xAxis.makeDataItem({});
    yesDataItem.set("value", 0);
    yesDataItem.set("endValue", 0.5);
    xAxis.createAxisRange(yesDataItem);
    yesDataItem.get("label").setAll({ text: "BUY", forceHidden: false });
    yesDataItem.get("axisFill").setAll({
        visible: true,
        fillOpacity: 1,
        fill: root.interfaceColors.get("negative"),
    });
    var noDataItem = xAxis.makeDataItem({});
    noDataItem.set("value", 1);
    noDataItem.set("endValue", 0.5);
    xAxis.createAxisRange(noDataItem);
    noDataItem.get("label").setAll({ text: "SELL", forceHidden: false });
    noDataItem.get("axisFill").setAll({
        visible: true,
        fillOpacity: 1,
        fill: root.interfaceColors.get("positive"),
    });
    var axisDataItem = xAxis.makeDataItem({});
    axisDataItem.set("value", 0.25);
    var bullet = axisDataItem.set(
        "bullet",
        am5xy.AxisBullet.new(root, {
            sprite: am5radar.ClockHand.new(root, {
                radius: am5.percent(99),
            }),
        })
    );
    xAxis.createAxisRange(axisDataItem);
    axisDataItem.get("grid").set("visible", false);
    let value;

    const getData = () => {
        $.ajax({
            type: "GET",
            url: "/admin/cleoDataShow",
            data: { pair: pair },
            success: function (data) {
                if (data.pair != null) {
                    value = data.pair.direction;

                    if (value == -1) {
                        value = 0.75;
                    } else if (value == 0) {
                        value = 0.5;
                    } else {
                        value = 0.25;
                    }
                } else {
                    value = 0.5;
                }
                axisDataItem.animate({
                    key: "value",
                    to: value,
                    duration: 800,
                    easing: am5.ease.out(am5.ease.cubic),
                });
            },
            error: function (response) {
                console.log(response);
            },
        });
    };

    getData();

    setInterval(function () {
        getData();
    }, 20000);
    chart.appear(1000, 100);
});

am5.ready(function () {
    var root = am5.Root.new("velocimetro3");
    root.setThemes([am5themes_Animated.new(root)]);
    var chart = root.container.children.push(
        am5radar.RadarChart.new(root, {
            panX: false,
            panY: false,
            startAngle: 180,
            endAngle: 360,
        })
    );
    var axisRenderer = am5radar.AxisRendererCircular.new(root, {
        innerRadius: -10,
        strokeOpacity: 1,
        strokeWidth: 15,
        strokeGradient: am5.LinearGradient.new(root, {
            rotation: 0,
            stops: [
                { color: am5.color(0x19d228) },
                { color: am5.color(0xf4fb16) },
                { color: am5.color(0xf6d32b) },
                { color: am5.color(0xfb7116) },
            ],
        }),
    });
    var xAxis = chart.xAxes.push(
        am5xy.ValueAxis.new(root, {
            maxDeviation: 0,
            min: 1,
            max: 9,
            strictMinMax: true,
            renderer: axisRenderer,
        })
    );
    var axisDataItem = xAxis.makeDataItem({});
    axisDataItem.set("value", 0);
    var bullet = axisDataItem.set(
        "bullet",
        am5xy.AxisBullet.new(root, {
            sprite: am5radar.ClockHand.new(root, {
                radius: am5.percent(99),
            }),
        })
    );
    xAxis.createAxisRange(axisDataItem);
    axisDataItem.get("grid").set("visible", false);

    const getData = () => {
        $.ajax({
            type: "GET",
            url: "/admin/cleoDataShow",
            data: { pair: pair },
            success: function (data) {
                // if (data.pair != null) {
                value = data.pair.shot;
                compra = data.pair.direction;

                let fecha = moment(
                    data.pair.fecha,
                    "YYYY-MM-DD hh:mm:ss"
                ).fromNow();

                $("#ultimaHora").text(`Última actualización: ${fecha}`);

                if (compra == 1) {
                    if (
                        value != 1 &&
                        value != 2 &&
                        value != 3 &&
                        value != 4 &&
                        value != 5 &&
                        value != 6 &&
                        value != 7 &&
                        value != 8
                    ) {
                        value = 2.5;
                    }
                } else {
                    value = 1;
                }
                // } else {
                //     value = 1;
                // }

                axisDataItem.animate({
                    key: "value",
                    to: value,
                    duration: 800,
                    easing: am5.ease.out(am5.ease.cubic),
                });
            },
            error: function (response) {
                console.log(response);
            },
        });
    };

    getData();

    setInterval(function () {
        getData();
    }, 5000);
    chart.appear(1000, 100);
});
