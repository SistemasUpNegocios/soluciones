// $("#fechasForm").on("submit", function (e) {
//     e.preventDefault();

//     var fecha_desde = $("#fechaDesdeInput").val();
//     var fecha_eje = $("#fechaEjeInput").val();

//     let labels = [];

//     let valores_eurusd = [];
//     let valor_eurusd = 0;

//     let valores_gbpusd = [];
//     let valor_gbpusd = 0;

//     let valores_audusd = [];
//     let valor_audusd = 0;

//     let valores_nzdusd = [];
//     let valor_nzdusd = 0;

//     let valores_usdcad = [];
//     let valor_usdcad = 0;

//     let valores_usdchf = [];
//     let valor_usdchf = 0;

//     let valores_usdjpy = [];
//     let valor_usdjpy = 0;

//     $("#spinner").html(`
//         <div class="spinner-border text-primary" role="status">
//             <span class="visually-hidden">Cargando gráfica...</span>
//         </div>
//     `);

//     $.get({
//         url: "/admin/getIndexUSD",
//         data: {
//             fecha_desde: fecha_desde,
//             fecha_eje: fecha_eje,
//             moneda: "EURUSD",
//         },
//         success: function (response) {
//             response.currencies.map(function (currency, i, row) {
//                 eje = response.valor_eje;

//                 var moneda = currency.moneda;

//                 if (moneda.substring(0, 3) == "USD") {
//                     valor_eurusd = (currency.valor / eje - 1) * 100 * -1;
//                 } else {
//                     valor_eurusd = (currency.valor / eje - 1) * 100;
//                 }

//                 labels.push(moment(currency.hora).format("DD/MM/YYYY hh:mm a"));
//                 valores_eurusd.push(valor_eurusd);
//             });

//             $.get({
//                 url: "/admin/getIndexUSD",
//                 data: {
//                     fecha_desde: fecha_desde,
//                     fecha_eje: fecha_eje,
//                     moneda: "GBPUSD",
//                 },
//                 success: function (response) {
//                     response.currencies.map(function (currency, i, row) {
//                         eje = response.valor_eje;

//                         var moneda = currency.moneda;

//                         if (moneda.substring(0, 3) == "USD") {
//                             valor_gbpusd =
//                                 (currency.valor / eje - 1) * 100 * -1;
//                         } else {
//                             valor_gbpusd = (currency.valor / eje - 1) * 100;
//                         }

//                         valores_gbpusd.push(valor_gbpusd);
//                     });

//                     $.get({
//                         url: "/admin/getIndexUSD",
//                         data: {
//                             fecha_desde: fecha_desde,
//                             fecha_eje: fecha_eje,
//                             moneda: "AUDUSD",
//                         },
//                         success: function (response) {
//                             response.currencies.map(function (
//                                 currency,
//                                 i,
//                                 row
//                             ) {
//                                 eje = response.valor_eje;

//                                 var moneda = currency.moneda;

//                                 if (moneda.substring(0, 3) == "USD") {
//                                     valor_audusd =
//                                         (currency.valor / eje - 1) * 100 * -1;
//                                 } else {
//                                     valor_audusd =
//                                         (currency.valor / eje - 1) * 100;
//                                 }

//                                 valores_audusd.push(valor_audusd);
//                             });

//                             $.get({
//                                 url: "/admin/getIndexUSD",
//                                 data: {
//                                     fecha_desde: fecha_desde,
//                                     fecha_eje: "2023-07-25 09:00:00",
//                                     moneda: "NZDUSD",
//                                 },
//                                 success: function (response) {
//                                     response.currencies.map(function (
//                                         currency,
//                                         i,
//                                         row
//                                     ) {
//                                         eje = response.valor_eje;

//                                         var moneda = currency.moneda;

//                                         if (moneda.substring(0, 3) == "USD") {
//                                             valor_nzdusd =
//                                                 (currency.valor / eje - 1) *
//                                                 100 *
//                                                 -1;
//                                         } else {
//                                             valor_nzdusd =
//                                                 (currency.valor / eje - 1) *
//                                                 100;
//                                         }

//                                         valores_nzdusd.push(valor_nzdusd);
//                                     });

//                                     $.get({
//                                         url: "/admin/getIndexUSD",
//                                         data: {
//                                             fecha_desde: fecha_desde,
//                                             fecha_eje: fecha_eje,
//                                             moneda: "USDCAD",
//                                         },
//                                         success: function (response) {
//                                             response.currencies.map(function (
//                                                 currency,
//                                                 i,
//                                                 row
//                                             ) {
//                                                 eje = response.valor_eje;

//                                                 var moneda = currency.moneda;

//                                                 if (
//                                                     moneda.substring(0, 3) ==
//                                                     "USD"
//                                                 ) {
//                                                     valor_usdcad =
//                                                         (currency.valor / eje -
//                                                             1) *
//                                                         100 *
//                                                         -1;
//                                                 } else {
//                                                     valor_usdcad =
//                                                         (currency.valor / eje -
//                                                             1) *
//                                                         100;
//                                                 }

//                                                 valores_usdcad.push(
//                                                     valor_usdcad
//                                                 );
//                                             });

//                                             $.get({
//                                                 url: "/admin/getIndexUSD",
//                                                 data: {
//                                                     fecha_desde: fecha_desde,
//                                                     fecha_eje: fecha_eje,
//                                                     moneda: "USDCHF",
//                                                 },
//                                                 success: function (response) {
//                                                     response.currencies.map(
//                                                         function (
//                                                             currency,
//                                                             i,
//                                                             row
//                                                         ) {
//                                                             eje =
//                                                                 response.valor_eje;

//                                                             var moneda =
//                                                                 currency.moneda;

//                                                             if (
//                                                                 moneda.substring(
//                                                                     0,
//                                                                     3
//                                                                 ) == "USD"
//                                                             ) {
//                                                                 valor_usdchf =
//                                                                     (currency.valor /
//                                                                         eje -
//                                                                         1) *
//                                                                     100 *
//                                                                     -1;
//                                                             } else {
//                                                                 valor_usdchf =
//                                                                     (currency.valor /
//                                                                         eje -
//                                                                         1) *
//                                                                     100;
//                                                             }

//                                                             valores_usdchf.push(
//                                                                 valor_usdchf
//                                                             );
//                                                         }
//                                                     );

//                                                     $.get({
//                                                         url: "/admin/getIndexUSD",
//                                                         data: {
//                                                             fecha_desde:
//                                                                 fecha_desde,
//                                                             fecha_eje:
//                                                                 fecha_eje,
//                                                             moneda: "USDJPY",
//                                                         },
//                                                         success: function (
//                                                             response
//                                                         ) {
//                                                             response.currencies.map(
//                                                                 function (
//                                                                     currency,
//                                                                     i,
//                                                                     row
//                                                                 ) {
//                                                                     eje =
//                                                                         response.valor_eje;

//                                                                     var moneda =
//                                                                         currency.moneda;

//                                                                     if (
//                                                                         moneda.substring(
//                                                                             0,
//                                                                             3
//                                                                         ) ==
//                                                                         "USD"
//                                                                     ) {
//                                                                         valor_usdjpy =
//                                                                             (currency.valor /
//                                                                                 eje -
//                                                                                 1) *
//                                                                             100 *
//                                                                             -1;
//                                                                     } else {
//                                                                         valor_usdjpy =
//                                                                             (currency.valor /
//                                                                                 eje -
//                                                                                 1) *
//                                                                             100;
//                                                                     }

//                                                                     valores_usdjpy.push(
//                                                                         valor_usdjpy
//                                                                     );
//                                                                 }
//                                                             );

//                                                             // <button id="reset" class="btn btn-primary">Resetear zoom</button>

//                                                             $("#spinner").html(`
//                                                                 <canvas id="myChart" class="mt-3"></canvas>
//                                                             `);

//                                                             const ctx =
//                                                                 document.getElementById(
//                                                                     "myChart"
//                                                                 );

//                                                             const data = {
//                                                                 labels: labels,
//                                                                 datasets: [
//                                                                     {
//                                                                         label: "EURUSD",
//                                                                         data: valores_eurusd,
//                                                                         borderColor:
//                                                                             "#A2FF86",
//                                                                         backgroundColor:
//                                                                             "#A2FF86",
//                                                                         pointRadius: 0.2,
//                                                                         borderWidth: 1,
//                                                                     },
//                                                                     {
//                                                                         label: "GBPUSD",
//                                                                         data: valores_gbpusd,
//                                                                         borderColor:
//                                                                             "#C51605",
//                                                                         backgroundColor:
//                                                                             "#C51605",
//                                                                         pointRadius: 0.2,
//                                                                         borderWidth: 1,
//                                                                     },
//                                                                     {
//                                                                         label: "AUDUSD",
//                                                                         data: valores_audusd,
//                                                                         borderColor:
//                                                                             "#0A6EBD",
//                                                                         backgroundColor:
//                                                                             "#0A6EBD",
//                                                                         pointRadius: 0.2,
//                                                                         borderWidth: 1,
//                                                                     },
//                                                                     {
//                                                                         label: "NZDUSD",
//                                                                         data: valores_nzdusd,
//                                                                         borderColor:
//                                                                             "#F1C93B",
//                                                                         backgroundColor:
//                                                                             "#F1C93B",
//                                                                         pointRadius: 0.2,
//                                                                         borderWidth: 1,
//                                                                     },
//                                                                     {
//                                                                         label: "USDCAD",
//                                                                         data: valores_usdcad,
//                                                                         borderColor:
//                                                                             "#97FEED",
//                                                                         backgroundColor:
//                                                                             "#97FEED",
//                                                                         pointRadius: 0.2,
//                                                                         borderWidth: 1,
//                                                                     },
//                                                                     {
//                                                                         label: "USDCHF",
//                                                                         data: valores_usdchf,
//                                                                         borderColor:
//                                                                             "#F86F03",
//                                                                         backgroundColor:
//                                                                             "#F86F03",
//                                                                         pointRadius: 0.2,
//                                                                         borderWidth: 1,
//                                                                     },
//                                                                     {
//                                                                         label: "USDJPY",
//                                                                         data: valores_usdjpy,
//                                                                         borderColor:
//                                                                             "#1A5D1A",
//                                                                         backgroundColor:
//                                                                             "#1A5D1A",
//                                                                         pointRadius: 0.2,
//                                                                         borderWidth: 1,
//                                                                     },
//                                                                 ],
//                                                             };

//                                                             const config = {
//                                                                 type: "line",
//                                                                 data: data,
//                                                                 options: {
//                                                                     responsive: true,
//                                                                     interaction:
//                                                                         {
//                                                                             mode: "index",
//                                                                             intersect: false,
//                                                                         },
//                                                                     stacked: false,
//                                                                     // plugins: {
//                                                                     //     zoom: {
//                                                                     //         zoom: {
//                                                                     //             wheel: {
//                                                                     //                 enabled: true,
//                                                                     //             },
//                                                                     //             pinch: {
//                                                                     //                 enabled: true,
//                                                                     //             },
//                                                                     //             mode: "xy",
//                                                                     //         },
//                                                                     //     },
//                                                                     // },
//                                                                     scales: {
//                                                                         y: {
//                                                                             type: "linear",
//                                                                             display: true,
//                                                                             position:
//                                                                                 "left",
//                                                                         },
//                                                                         y1: {
//                                                                             type: "linear",
//                                                                             display: true,
//                                                                             position:
//                                                                                 "right",

//                                                                             // grid line settings
//                                                                             grid: {
//                                                                                 drawOnChartArea: false, // only want the grid lines for one axis to show up
//                                                                             },
//                                                                         },
//                                                                     },
//                                                                 },
//                                                             };

//                                                             let myChart =
//                                                                 new Chart(
//                                                                     ctx,
//                                                                     config
//                                                                 );

//                                                             $("#reset").click(
//                                                                 function () {
//                                                                     myChart.resetZoom();
//                                                                 }
//                                                             );
//                                                         },
//                                                         error: function (
//                                                             error
//                                                         ) {
//                                                             console.log(error);
//                                                         },
//                                                     });
//                                                 },
//                                                 error: function (error) {
//                                                     console.log(error);
//                                                 },
//                                             });
//                                         },
//                                         error: function (error) {
//                                             console.log(error);
//                                         },
//                                     });
//                                 },
//                                 error: function (error) {
//                                     console.log(error);
//                                 },
//                             });
//                         },
//                         error: function (error) {
//                             console.log(error);
//                         },
//                     });
//                 },
//                 error: function (error) {
//                     console.log(error);
//                 },
//             });
//         },
//         error: function (error) {
//             console.log(error);
//         },
//     });
// });

// $("#fechasForm").on("submit", function (e) {
//         e.preventDefault();

//         var fecha_desde = $("#fechaDesdeInput").val();
//         var fecha_eje = $("#fechaEjeInput").val();

//         let labels = [];

//         let valores_eurusd = [];
//         let valor_eurusd = 0;

//         let valores_gbpusd = [];
//         let valor_gbpusd = 0;

//         let valores_audusd = [];
//         let valor_audusd = 0;

//         let valores_nzdusd = [];
//         let valor_nzdusd = 0;

//         let valores_usdcad = [];
//         let valor_usdcad = 0;

//         let valores_usdchf = [];
//         let valor_usdchf = 0;

//         let valores_usdjpy = [];
//         let valor_usdjpy = 0;

//         $("#spinner").html(`
//             <div class="spinner-border text-primary" role="status">
//                 <span class="visually-hidden">Cargando gráfica...</span>
//             </div>
//         `);

//         $.get({
//             url: "/admin/getIndexUSD",
//             data: {
//                 fecha_desde: fecha_desde,
//                 fecha_eje: fecha_eje,
//                 moneda: "EURUSD",
//             },
//             success: function (response) {
//                 response.currencies.map(function (currency, i, row) {
//                     eje = response.valor_eje;

//                     var moneda = currency.moneda;

//                     if (moneda.substring(0, 3) == "USD") {
//                         valor_eurusd = (currency.valor / eje - 1) * 100 * -1;
//                     } else {
//                         valor_eurusd = (currency.valor / eje - 1) * 100;
//                     }

//                     labels.push(moment(currency.hora).format("DD/MM/YYYY hh:mm a"));
//                     valores_eurusd.push(valor_eurusd);
//                 });

//                 $.get({
//                     url: "/admin/getIndexUSD",
//                     data: {
//                         fecha_desde: fecha_desde,
//                         fecha_eje: fecha_eje,
//                         moneda: "GBPUSD",
//                     },
//                     success: function (response) {
//                         response.currencies.map(function (currency, i, row) {
//                             eje = response.valor_eje;

//                             var moneda = currency.moneda;

//                             if (moneda.substring(0, 3) == "USD") {
//                                 valor_gbpusd =
//                                     (currency.valor / eje - 1) * 100 * -1;
//                             } else {
//                                 valor_gbpusd = (currency.valor / eje - 1) * 100;
//                             }

//                             valores_gbpusd.push(valor_gbpusd);
//                         });

//                         $.get({
//                             url: "/admin/getIndexUSD",
//                             data: {
//                                 fecha_desde: fecha_desde,
//                                 fecha_eje: fecha_eje,
//                                 moneda: "AUDUSD",
//                             },
//                             success: function (response) {
//                                 response.currencies.map(function (
//                                     currency,
//                                     i,
//                                     row
//                                 ) {
//                                     eje = response.valor_eje;

//                                     var moneda = currency.moneda;

//                                     if (moneda.substring(0, 3) == "USD") {
//                                         valor_audusd =
//                                             (currency.valor / eje - 1) * 100 * -1;
//                                     } else {
//                                         valor_audusd =
//                                             (currency.valor / eje - 1) * 100;
//                                     }

//                                     valores_audusd.push(valor_audusd);
//                                 });

//                                 $.get({
//                                     url: "/admin/getIndexUSD",
//                                     data: {
//                                         fecha_desde: fecha_desde,
//                                         fecha_eje: "2023-07-25 09:00:00",
//                                         moneda: "NZDUSD",
//                                     },
//                                     success: function (response) {
//                                         response.currencies.map(function (
//                                             currency,
//                                             i,
//                                             row
//                                         ) {
//                                             eje = response.valor_eje;

//                                             var moneda = currency.moneda;

//                                             if (moneda.substring(0, 3) == "USD") {
//                                                 valor_nzdusd =
//                                                     (currency.valor / eje - 1) *
//                                                     100 *
//                                                     -1;
//                                             } else {
//                                                 valor_nzdusd =
//                                                     (currency.valor / eje - 1) *
//                                                     100;
//                                             }

//                                             valores_nzdusd.push(valor_nzdusd);
//                                         });

//                                         $.get({
//                                             url: "/admin/getIndexUSD",
//                                             data: {
//                                                 fecha_desde: fecha_desde,
//                                                 fecha_eje: fecha_eje,
//                                                 moneda: "USDCAD",
//                                             },
//                                             success: function (response) {
//                                                 response.currencies.map(function (
//                                                     currency,
//                                                     i,
//                                                     row
//                                                 ) {
//                                                     eje = response.valor_eje;

//                                                     var moneda = currency.moneda;

//                                                     if (
//                                                         moneda.substring(0, 3) ==
//                                                         "USD"
//                                                     ) {
//                                                         valor_usdcad =
//                                                             (currency.valor / eje -
//                                                                 1) *
//                                                             100 *
//                                                             -1;
//                                                     } else {
//                                                         valor_usdcad =
//                                                             (currency.valor / eje -
//                                                                 1) *
//                                                             100;
//                                                     }

//                                                     valores_usdcad.push(
//                                                         valor_usdcad
//                                                     );
//                                                 });

//                                                 $.get({
//                                                     url: "/admin/getIndexUSD",
//                                                     data: {
//                                                         fecha_desde: fecha_desde,
//                                                         fecha_eje: fecha_eje,
//                                                         moneda: "USDCHF",
//                                                     },
//                                                     success: function (response) {
//                                                         response.currencies.map(
//                                                             function (
//                                                                 currency,
//                                                                 i,
//                                                                 row
//                                                             ) {
//                                                                 eje =
//                                                                     response.valor_eje;

//                                                                 var moneda =
//                                                                     currency.moneda;

//                                                                 if (
//                                                                     moneda.substring(
//                                                                         0,
//                                                                         3
//                                                                     ) == "USD"
//                                                                 ) {
//                                                                     valor_usdchf =
//                                                                         (currency.valor /
//                                                                             eje -
//                                                                             1) *
//                                                                         100 *
//                                                                         -1;
//                                                                 } else {
//                                                                     valor_usdchf =
//                                                                         (currency.valor /
//                                                                             eje -
//                                                                             1) *
//                                                                         100;
//                                                                 }

//                                                                 valores_usdchf.push(
//                                                                     valor_usdchf
//                                                                 );
//                                                             }
//                                                         );

//                                                         $.get({
//                                                             url: "/admin/getIndexUSD",
//                                                             data: {
//                                                                 fecha_desde:
//                                                                     fecha_desde,
//                                                                 fecha_eje:
//                                                                     fecha_eje,
//                                                                 moneda: "USDJPY",
//                                                             },
//                                                             success: function (
//                                                                 response
//                                                             ) {
//                                                                 response.currencies.map(
//                                                                     function (
//                                                                         currency,
//                                                                         i,
//                                                                         row
//                                                                     ) {
//                                                                         eje =
//                                                                             response.valor_eje;

//                                                                         var moneda =
//                                                                             currency.moneda;

//                                                                         if (
//                                                                             moneda.substring(
//                                                                                 0,
//                                                                                 3
//                                                                             ) ==
//                                                                             "USD"
//                                                                         ) {
//                                                                             valor_usdjpy =
//                                                                                 (currency.valor /
//                                                                                     eje -
//                                                                                     1) *
//                                                                                 100 *
//                                                                                 -1;
//                                                                         } else {
//                                                                             valor_usdjpy =
//                                                                                 (currency.valor /
//                                                                                     eje -
//                                                                                     1) *
//                                                                                 100;
//                                                                         }

//                                                                         valores_usdjpy.push(
//                                                                             valor_usdjpy
//                                                                         );
//                                                                     }
//                                                                 );

//                                                                 // <button id="reset" class="btn btn-primary">Resetear zoom</button>

//                                                                 $("#spinner").html(`
//                                                                     <canvas id="myChart" class="mt-3"></canvas>
//                                                                 `);

//                                                                 const ctx =
//                                                                     document.getElementById(
//                                                                         "myChart"
//                                                                     );

//                                                                 const data = {
//                                                                     labels: labels,
//                                                                     datasets: [
//                                                                         {
//                                                                             label: "EURUSD",
//                                                                             data: valores_eurusd,
//                                                                             borderColor:
//                                                                                 "#A2FF86",
//                                                                             backgroundColor:
//                                                                                 "#A2FF86",
//                                                                             pointRadius: 0.2,
//                                                                             borderWidth: 1,
//                                                                         },
//                                                                         {
//                                                                             label: "GBPUSD",
//                                                                             data: valores_gbpusd,
//                                                                             borderColor:
//                                                                                 "#C51605",
//                                                                             backgroundColor:
//                                                                                 "#C51605",
//                                                                             pointRadius: 0.2,
//                                                                             borderWidth: 1,
//                                                                         },
//                                                                         {
//                                                                             label: "AUDUSD",
//                                                                             data: valores_audusd,
//                                                                             borderColor:
//                                                                                 "#0A6EBD",
//                                                                             backgroundColor:
//                                                                                 "#0A6EBD",
//                                                                             pointRadius: 0.2,
//                                                                             borderWidth: 1,
//                                                                         },
//                                                                         {
//                                                                             label: "NZDUSD",
//                                                                             data: valores_nzdusd,
//                                                                             borderColor:
//                                                                                 "#F1C93B",
//                                                                             backgroundColor:
//                                                                                 "#F1C93B",
//                                                                             pointRadius: 0.2,
//                                                                             borderWidth: 1,
//                                                                         },
//                                                                         {
//                                                                             label: "USDCAD",
//                                                                             data: valores_usdcad,
//                                                                             borderColor:
//                                                                                 "#97FEED",
//                                                                             backgroundColor:
//                                                                                 "#97FEED",
//                                                                             pointRadius: 0.2,
//                                                                             borderWidth: 1,
//                                                                         },
//                                                                         {
//                                                                             label: "USDCHF",
//                                                                             data: valores_usdchf,
//                                                                             borderColor:
//                                                                                 "#F86F03",
//                                                                             backgroundColor:
//                                                                                 "#F86F03",
//                                                                             pointRadius: 0.2,
//                                                                             borderWidth: 1,
//                                                                         },
//                                                                         {
//                                                                             label: "USDJPY",
//                                                                             data: valores_usdjpy,
//                                                                             borderColor:
//                                                                                 "#1A5D1A",
//                                                                             backgroundColor:
//                                                                                 "#1A5D1A",
//                                                                             pointRadius: 0.2,
//                                                                             borderWidth: 1,
//                                                                         },
//                                                                     ],
//                                                                 };

//                                                                 const config = {
//                                                                     type: "line",
//                                                                     data: data,
//                                                                     options: {
//                                                                         responsive: true,
//                                                                         interaction:
//                                                                             {
//                                                                                 mode: "index",
//                                                                                 intersect: false,
//                                                                             },
//                                                                         stacked: false,
//                                                                         // plugins: {
//                                                                         //     zoom: {
//                                                                         //         zoom: {
//                                                                         //             wheel: {
//                                                                         //                 enabled: true,
//                                                                         //             },
//                                                                         //             pinch: {
//                                                                         //                 enabled: true,
//                                                                         //             },
//                                                                         //             mode: "xy",
//                                                                         //         },
//                                                                         //     },
//                                                                         // },
//                                                                         scales: {
//                                                                             y: {
//                                                                                 type: "linear",
//                                                                                 display: true,
//                                                                                 position:
//                                                                                     "left",
//                                                                             },
//                                                                             y1: {
//                                                                                 type: "linear",
//                                                                                 display: true,
//                                                                                 position:
//                                                                                     "right",

//                                                                                 // grid line settings
//                                                                                 grid: {
//                                                                                     drawOnChartArea: false, // only want the grid lines for one axis to show up
//                                                                                 },
//                                                                             },
//                                                                         },
//                                                                     },
//                                                                 };

//                                                                 let myChart =
//                                                                     new Chart(
//                                                                         ctx,
//                                                                         config
//                                                                     );

//                                                                 $("#reset").click(
//                                                                     function () {
//                                                                         myChart.resetZoom();
//                                                                     }
//                                                                 );
//                                                             },
//                                                             error: function (
//                                                                 error
//                                                             ) {
//                                                                 console.log(error);
//                                                             },
//                                                         });
//                                                     },
//                                                     error: function (error) {
//                                                         console.log(error);
//                                                     },
//                                                 });
//                                             },
//                                             error: function (error) {
//                                                 console.log(error);
//                                             },
//                                         });
//                                     },
//                                     error: function (error) {
//                                         console.log(error);
//                                     },
//                                 });
//                             },
//                             error: function (error) {
//                                 console.log(error);
//                             },
//                         });
//                     },
//                     error: function (error) {
//                         console.log(error);
//                     },
//                 });
//             },
//             error: function (error) {
//                 console.log(error);
//             },
//         });
//     });

$("#fechasForm").on("submit", function (e) {
    e.preventDefault();

    var fecha_desde = $("#fechaDesdeInput").val();
    var fecha_eje = $("#fechaEjeInput").val();

    let labels = [];

    let valores_eurusd = [];
    let valor_eurusd = 0;

    let valores_gbpusd = [];
    let valor_gbpusd = 0;

    let valores_audusd = [];
    let valor_audusd = 0;

    let valores_nzdusd = [];
    let valor_nzdusd = 0;

    let valores_usdcad = [];
    let valor_usdcad = 0;

    let valores_usdchf = [];
    let valor_usdchf = 0;

    let valores_usdjpy = [];
    let valor_usdjpy = 0;

    $("#spinner").html(`
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Cargando gráfica...</span>
        </div>
    `);

    $.get({
        url: "/admin/getIndexUSD",
        data: {
            fecha_desde: fecha_desde,
            fecha_eje: fecha_eje,
            moneda: "EURUSD",
        },
        success: function (response) {
            response.currencies.map(function (currency, i, row) {
                eje = response.valor_eje;

                var moneda = currency.moneda;

                if (moneda.substring(0, 3) == "USD") {
                    valor_eurusd = (currency.valor / eje - 1) * 100 * -1;
                } else {
                    valor_eurusd = (currency.valor / eje - 1) * 100;
                }

                labels.push(moment(currency.hora).format("DD/MM/YYYY HH:mm"));
                valores_eurusd.push(valor_eurusd);
            });

            $.get({
                url: "/admin/getIndexUSD",
                data: {
                    fecha_desde: fecha_desde,
                    fecha_eje: fecha_eje,
                    moneda: "GBPUSD",
                },
                success: function (response) {
                    response.currencies.map(function (currency, i, row) {
                        eje = response.valor_eje;

                        var moneda = currency.moneda;

                        if (moneda.substring(0, 3) == "USD") {
                            valor_gbpusd =
                                (currency.valor / eje - 1) * 100 * -1;
                        } else {
                            valor_gbpusd = (currency.valor / eje - 1) * 100;
                        }

                        valores_gbpusd.push(valor_gbpusd);
                    });

                    $.get({
                        url: "/admin/getIndexUSD",
                        data: {
                            fecha_desde: fecha_desde,
                            fecha_eje: fecha_eje,
                            moneda: "AUDUSD",
                        },
                        success: function (response) {
                            response.currencies.map(function (
                                currency,
                                i,
                                row
                            ) {
                                eje = response.valor_eje;

                                var moneda = currency.moneda;

                                if (moneda.substring(0, 3) == "USD") {
                                    valor_audusd =
                                        (currency.valor / eje - 1) * 100 * -1;
                                } else {
                                    valor_audusd =
                                        (currency.valor / eje - 1) * 100;
                                }

                                valores_audusd.push(valor_audusd);
                            });

                            $.get({
                                url: "/admin/getIndexUSD",
                                data: {
                                    fecha_desde: fecha_desde,
                                    fecha_eje: "2023-07-25 09:00:00",
                                    moneda: "NZDUSD",
                                },
                                success: function (response) {
                                    response.currencies.map(function (
                                        currency,
                                        i,
                                        row
                                    ) {
                                        eje = response.valor_eje;

                                        var moneda = currency.moneda;

                                        if (moneda.substring(0, 3) == "USD") {
                                            valor_nzdusd =
                                                (currency.valor / eje - 1) *
                                                100 *
                                                -1;
                                        } else {
                                            valor_nzdusd =
                                                (currency.valor / eje - 1) *
                                                100;
                                        }

                                        valores_nzdusd.push(valor_nzdusd);
                                    });

                                    $.get({
                                        url: "/admin/getIndexUSD",
                                        data: {
                                            fecha_desde: fecha_desde,
                                            fecha_eje: fecha_eje,
                                            moneda: "USDCAD",
                                        },
                                        success: function (response) {
                                            response.currencies.map(function (
                                                currency,
                                                i,
                                                row
                                            ) {
                                                eje = response.valor_eje;

                                                var moneda = currency.moneda;

                                                if (
                                                    moneda.substring(0, 3) ==
                                                    "USD"
                                                ) {
                                                    valor_usdcad =
                                                        (currency.valor / eje -
                                                            1) *
                                                        100 *
                                                        -1;
                                                } else {
                                                    valor_usdcad =
                                                        (currency.valor / eje -
                                                            1) *
                                                        100;
                                                }

                                                valores_usdcad.push(
                                                    valor_usdcad
                                                );
                                            });

                                            $.get({
                                                url: "/admin/getIndexUSD",
                                                data: {
                                                    fecha_desde: fecha_desde,
                                                    fecha_eje: fecha_eje,
                                                    moneda: "USDCHF",
                                                },
                                                success: function (response) {
                                                    response.currencies.map(
                                                        function (
                                                            currency,
                                                            i,
                                                            row
                                                        ) {
                                                            eje =
                                                                response.valor_eje;

                                                            var moneda =
                                                                currency.moneda;

                                                            if (
                                                                moneda.substring(
                                                                    0,
                                                                    3
                                                                ) == "USD"
                                                            ) {
                                                                valor_usdchf =
                                                                    (currency.valor /
                                                                        eje -
                                                                        1) *
                                                                    100 *
                                                                    -1;
                                                            } else {
                                                                valor_usdchf =
                                                                    (currency.valor /
                                                                        eje -
                                                                        1) *
                                                                    100;
                                                            }

                                                            valores_usdchf.push(
                                                                valor_usdchf
                                                            );
                                                        }
                                                    );

                                                    $.get({
                                                        url: "/admin/getIndexUSD",
                                                        data: {
                                                            fecha_desde:
                                                                fecha_desde,
                                                            fecha_eje:
                                                                fecha_eje,
                                                            moneda: "USDJPY",
                                                        },
                                                        success: function (
                                                            response
                                                        ) {
                                                            response.currencies.map(
                                                                function (
                                                                    currency,
                                                                    i,
                                                                    row
                                                                ) {
                                                                    eje =
                                                                        response.valor_eje;

                                                                    var moneda =
                                                                        currency.moneda;

                                                                    if (
                                                                        moneda.substring(
                                                                            0,
                                                                            3
                                                                        ) ==
                                                                        "USD"
                                                                    ) {
                                                                        valor_usdjpy =
                                                                            (currency.valor /
                                                                                eje -
                                                                                1) *
                                                                            100 *
                                                                            -1;
                                                                    } else {
                                                                        valor_usdjpy =
                                                                            (currency.valor /
                                                                                eje -
                                                                                1) *
                                                                            100;
                                                                    }

                                                                    valores_usdjpy.push(
                                                                        valor_usdjpy
                                                                    );
                                                                }
                                                            );

                                                            // <button id="reset" class="btn btn-primary">Resetear zoom</button>

                                                            $("#spinner").html(`
                                                                <canvas id="myChart" class="mt-3"></canvas>
                                                            `);

                                                            const chart =
                                                                new CanvasJS.Chart(
                                                                    "chartContainer",
                                                                    {
                                                                        animationEnabled: true,
                                                                        zoomEnabled: true,
                                                                        title: {
                                                                            text: "Forex Chart",
                                                                         
                                                                        },
                                                                        axisX: {
                                                                         
                                                                            valueFormatString:
                                                                                "MMM DD",
                                                                              
                                                                        },
                                                                        axisY: {
                                                                            title: "Valor", // Título del eje Y
                                                                            
                                                                        },

                                                                        legend: {
                                                                            cursor: "pointer",
                                                                            itemclick:
                                                                                toggleDataSeries,
                                                                        },
                                                                        data: [
                                                                            {
                                                                                type: "line",
                                                                                lineColor:
                                                                                    "#A2FF86",
                                                                                color: "#A2FF86",
                                                                                name: "EURUSD",
                                                                                showInLegend: true,
                                                                               
                                                                                dataPoints:
                                                                                    valores_eurusd.map(
                                                                                        (
                                                                                            value,

                                                                                            index
                                                                                        ) => {
                                                                                            const dateParts = labels[index].split(/[\s/:]+/); // Dividir la cadena de fecha
                                                                                            const year = parseInt(dateParts[2]);
                                                                                            const month = parseInt(dateParts[1]) - 1;
                                                                                            const day = parseInt(dateParts[0]);
                                                                                            const hour = parseInt(dateParts[3]);
                                                                                            const minute = parseInt(dateParts[4]);
                                                                                            const dateObject = new Date(year, month, day, hour, minute);
                                                                                            
                                                                                            const formattedHour = hour.toString().padStart(2, '0'); // Formatear horas con dos dígitos
                                                                                            const formattedMinute = minute.toString().padStart(2, '0'); // Formatear minutos con dos dígitos
                                                                                            const timeString = `${formattedHour}:${formattedMinute} hrs`;
                                                                                            
                                                                                            return {
                                                                                                label: `${dateObject.toLocaleDateString()} ${timeString}`,
                                                                                                y: value,
                                                                                            };
                                                                                        }
                                                                                    ),
                                                                            },
                                                                            {
                                                                                type: "line",
                                                                                name: "GBPUSD",
                                                                                lineColor:
                                                                                    "#C51605",
                                                                                    color: "#C51605",   
                                                                                showInLegend: true,
                                                                             
                                                                                dataPoints:
                                                                                    valores_gbpusd.map(
                                                                                        (
                                                                                            value,

                                                                                            index
                                                                                        ) => {
                                                                                            const dateParts = labels[index].split(/[\s/:]+/); // Dividir la cadena de fecha
                                                                                            const year = parseInt(dateParts[2]);
                                                                                            const month = parseInt(dateParts[1]) - 1;
                                                                                            const day = parseInt(dateParts[0]);
                                                                                            const hour = parseInt(dateParts[3]);
                                                                                            const minute = parseInt(dateParts[4]);
                                                                                            const dateObject = new Date(year, month, day, hour, minute);
                                                                                            
                                                                                            const formattedHour = hour.toString().padStart(2, '0'); // Formatear horas con dos dígitos
                                                                                            const formattedMinute = minute.toString().padStart(2, '0'); // Formatear minutos con dos dígitos
                                                                                            const timeString = `${formattedHour}:${formattedMinute} hrs`;
                                                                                            
                                                                                            return {
                                                                                                label: `${dateObject.toLocaleDateString()} ${timeString}`,
                                                                                                y: value,
                                                                                            };
                                                                                        }
                                                                                    ),
                                                                            },
                                                                            {
                                                                                type: "line",
                                                                                name: "AUDUSD",
                                                                                lineColor:
                                                                                    "#0A6EBD",
                                                                                color: "#0A6EBD",
                                                                                showInLegend: true,
                                                                              
                                                                                dataPoints:
                                                                                    valores_audusd.map(
                                                                                        (
                                                                                            value,

                                                                                            index
                                                                                        ) => {
                                                                                          const dateParts = labels[index].split(/[\s/:]+/); // Dividir la cadena de fecha
const year = parseInt(dateParts[2]);
const month = parseInt(dateParts[1]) - 1;
const day = parseInt(dateParts[0]);
const hour = parseInt(dateParts[3]);
const minute = parseInt(dateParts[4]);
const dateObject = new Date(year, month, day, hour, minute);

const formattedHour = hour.toString().padStart(2, '0'); // Formatear horas con dos dígitos
const formattedMinute = minute.toString().padStart(2, '0'); // Formatear minutos con dos dígitos
const timeString = `${formattedHour}:${formattedMinute} hrs`;

return {
    label: `${dateObject.toLocaleDateString()} ${timeString}`,
    y: value,
};
                                                                                        }
                                                                                    ),
                                                                            },
                                                                            {
                                                                                type: "line",
                                                                                name: "NZDUSD",
                                                                                lineColor:
                                                                                    "#F1C93B",
                                                                                color: "#F1C93B",
                                                                                showInLegend: true,
                                                                               
                                                                                dataPoints:
                                                                                    valores_nzdusd.map(
                                                                                        (
                                                                                            value,

                                                                                            index
                                                                                        ) => {
                                                                                            const dateParts = labels[index].split(/[\s/:]+/); // Dividir la cadena de fecha
                                                                                            const year = parseInt(dateParts[2]);
                                                                                            const month = parseInt(dateParts[1]) - 1;
                                                                                            const day = parseInt(dateParts[0]);
                                                                                            const hour = parseInt(dateParts[3]);
                                                                                            const minute = parseInt(dateParts[4]);
                                                                                            const dateObject = new Date(year, month, day, hour, minute);
                                                                                            
                                                                                            const formattedHour = hour.toString().padStart(2, '0'); // Formatear horas con dos dígitos
                                                                                            const formattedMinute = minute.toString().padStart(2, '0'); // Formatear minutos con dos dígitos
                                                                                            const timeString = `${formattedHour}:${formattedMinute} hrs`;
                                                                                            
                                                                                            return {
                                                                                                label: `${dateObject.toLocaleDateString()} ${timeString}`,
                                                                                                y: value,
                                                                                            };
                                                                                        }
                                                                                    ),
                                                                            },
                                                                            {
                                                                                type: "line",
                                                                                name: "USDCAD",
                                                                                lineColor:
                                                                                    "#97FEED",
                                                                                color: "#97FEED",   
                                                                                showInLegend: true,
                                                                               
                                                                                dataPoints:
                                                                                    valores_usdcad.map(
                                                                                        (
                                                                                            value,

                                                                                            index
                                                                                        ) => {
                                                                                            const dateParts = labels[index].split(/[\s/:]+/); // Dividir la cadena de fecha
                                                                                            const year = parseInt(dateParts[2]);
                                                                                            const month = parseInt(dateParts[1]) - 1;
                                                                                            const day = parseInt(dateParts[0]);
                                                                                            const hour = parseInt(dateParts[3]);
                                                                                            const minute = parseInt(dateParts[4]);
                                                                                            const dateObject = new Date(year, month, day, hour, minute);
                                                                                            
                                                                                            const formattedHour = hour.toString().padStart(2, '0'); // Formatear horas con dos dígitos
                                                                                            const formattedMinute = minute.toString().padStart(2, '0'); // Formatear minutos con dos dígitos
                                                                                            const timeString = `${formattedHour}:${formattedMinute} hrs`;
                                                                                            
                                                                                            return {
                                                                                                label: `${dateObject.toLocaleDateString()} ${timeString}`,
                                                                                                y: value,
                                                                                            };
                                                                                        }
                                                                                    ),
                                                                            },
                                                                            {
                                                                                type: "line",
                                                                                name: "USDCHF",
                                                                                lineColor:
                                                                                    "#F86F03",
                                                                                color: "#F86F03",
                                                                                showInLegend: true,
                                                                              
                                                                                dataPoints:
                                                                                    valores_usdchf.map(
                                                                                        (
                                                                                            value,

                                                                                            index
                                                                                        ) => {
                                                                                            const dateParts = labels[index].split(/[\s/:]+/); // Dividir la cadena de fecha
                                                                                            const year = parseInt(dateParts[2]);
                                                                                            const month = parseInt(dateParts[1]) - 1;
                                                                                            const day = parseInt(dateParts[0]);
                                                                                            const hour = parseInt(dateParts[3]);
                                                                                            const minute = parseInt(dateParts[4]);
                                                                                            const dateObject = new Date(year, month, day, hour, minute);
                                                                                            
                                                                                            const formattedHour = hour.toString().padStart(2, '0'); // Formatear horas con dos dígitos
                                                                                            const formattedMinute = minute.toString().padStart(2, '0'); // Formatear minutos con dos dígitos
                                                                                            const timeString = `${formattedHour}:${formattedMinute} hrs`;
                                                                                            
                                                                                            return {
                                                                                                label: `${dateObject.toLocaleDateString()} ${timeString}`,
                                                                                                y: value,
                                                                                            };
                                                                                        }
                                                                                    ),
                                                                            },
                                                                            {
                                                                                type: "line",
                                                                                name: "USDJPY",
                                                                                lineColor:
                                                                                    "#1A5D1A",
                                                                                    color: "#1A5D1A",
                                                                                showInLegend: true,
                                                                               
                                                                                dataPoints:
                                                                                    valores_usdjpy.map(
                                                                                        (
                                                                                            value,

                                                                                            index
                                                                                        ) => {
                                                                                            const dateParts =
                                                                                                labels[
                                                                                                    index
                                                                                                ].split(
                                                                                                    /[\s/:]+/
                                                                                                ); // Dividir la cadena de fecha
                                                                                            const year =
                                                                                                parseInt(
                                                                                                    dateParts[2]
                                                                                                );
                                                                                            const month =
                                                                                                parseInt(
                                                                                                    dateParts[1]
                                                                                                ) -
                                                                                                1;
                                                                                            const day =
                                                                                                parseInt(
                                                                                                    dateParts[0]
                                                                                                );
                                                                                            const hour =
                                                                                                parseInt(
                                                                                                    dateParts[3]
                                                                                                ) +
                                                                                                (dateParts[4].toLowerCase() ===
                                                                                                "pm"
                                                                                                    ? 12
                                                                                                    : 0);
                                                                                            const minute =
                                                                                                parseInt(
                                                                                                    dateParts[4]
                                                                                                );
                                                                                            const dateObject =
                                                                                                new Date(
                                                                                                    year,
                                                                                                    month,
                                                                                                    day,
                                                                                                    hour,
                                                                                                    minute
                                                                                                );

                                                                                            const options =
                                                                                                {
                                                                                                    hour12: true,
                                                                                                    hour: "numeric",
                                                                                                    minute: "numeric",
                                                                                                    second: "numeric",
                                                                                                };
                                                                                            const timeString =
                                                                                                dateObject.toLocaleTimeString(
                                                                                                    undefined,
                                                                                                    options
                                                                                                );

                                                                                            return {
                                                                                                label: `${dateObject.toLocaleDateString()} ${timeString}`, // Mostrar fecha y hora con AM/PM en el tooltip
                                                                                                y: value,
                                                                                            };
                                                                                        }
                                                                                    ),
                                                                            },
                                                                        ],
                                                                    }
                                                                );

                                                            chart.render();
                                                            console.log(labels);

                                                            function toggleDataSeries(
                                                                e
                                                            ) {
                                                                if (
                                                                    typeof e
                                                                        .dataSeries
                                                                        .visible ===
                                                                        "undefined" ||
                                                                    e.dataSeries
                                                                        .visible
                                                                ) {
                                                                    e.dataSeries.visible = false;
                                                                } else {
                                                                    e.dataSeries.visible = true;
                                                                }
                                                                chart.render();
                                                            }
                                                        },
                                                        error: function (
                                                            error
                                                        ) {
                                                            console.log(error);
                                                        },
                                                    });
                                                },
                                                error: function (error) {
                                                    console.log(error);
                                                },
                                            });
                                        },
                                        error: function (error) {
                                            console.log(error);
                                        },
                                    });
                                },
                                error: function (error) {
                                    console.log(error);
                                },
                            });
                        },
                        error: function (error) {
                            console.log(error);
                        },
                    });
                },
                error: function (error) {
                    console.log(error);
                },
            });
        },
        error: function (error) {
            console.log(error);
        },
    });
});
