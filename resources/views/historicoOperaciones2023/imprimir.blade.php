<!DOCTYPE html>

<html lang="es">



<head>

    <meta charset="utf-8">

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1" name="viewport">

    <meta name="csrf-token" content="{{ csrf_token() }}">



    <title>Gráfica Balance/Equity</title>

    <meta content="" name="description">



    <link rel="shortcut icon" href="{{ url('img/favicon.png') }}" type="image/x-icon">

    <link rel="icon" href="{{ url('img/favicon.png') }}" type="image/x-icon">

    <link href="{{ url('img/favicon.png') }}" rel="apple-touch-icon">



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">





    <style>
        hr {

            page-break-after: always;

            border: none;

            margin: 0;

            padding: 0;

        }



        .imgUP_superior {

            position: absolute;

            width: 200px;

            left: -45px;

            top: -46px;

        }



        .observaciones {

            padding: 4rem;

            width: 70%;

            margin: 2rem auto;

            border: 3px solid #000;

        }
    </style>

</head>



<body class="analisis-imprimir">





    <img class="imgUP_superior" src="{{ url('img/logo_sup.png') }}" alt="Logo uptrading">



    <div class="mt-4" style=" overflow-x: auto;">

        <table class="table table-striped table-bordered nowrap text-center"
            style="width: 100%; font-size: 12px !important; vertical-align: middle !important;" id="historicos">

            <thead style="vertical-align: middle !important;">

                <tr>

                    <th data-priority="0" scope="col">Order Number</th>

                    <th data-priority="0" scope="col">Time Open</th>

                    <th data-priority="0" scope="col">Type</th>

                    <th data-priority="0" scope="col">Volume</th>

                    <th data-priority="0" scope="col">Symbol</th>

                    <th data-priority="0" scope="col">Price Open</th>

                    <th data-priority="0" scope="col">SL</th>

                    <th data-priority="0" scope="col">TP</th>

                    <th data-priority="0" scope="col">Time Close</th>

                    <th data-priority="0" scope="col">Price Close</th>

                    <th data-priority="0" scope="col">Commision</th>

                    <th data-priority="0" scope="col">Swap</th>

                    <th data-priority="0" scope="col">Profit</th>

                    <th data-priority="0" scope="col">Comment</th>

                </tr>

            </thead>

            <tbody>

                @foreach ($historico as $historico)
                    <tr>



                        <td>{{ $historico->order_number }}</td>

                        <td>{{ \Carbon\Carbon::parse($historico->time_open)->format('d/m/Y') }}</td>

                        <td>{{ $historico->type_operation }}</td>

                        <td>{{ number_format($historico->volume ,2)}}</td>

                        <td>{{ $historico->symbol }}</td>

                        <td>{{ number_format($historico->price_open,2) }}</td>

                        <td>{{ number_format($historico->stop_loss,2)}}</td>

                        <td>{{ number_format($historico->take_profit,2) }}</td>

                        <td>{{ \Carbon\Carbon::parse($historico->time_open)->format('d/m/Y') }}</td>

                        <td>{{ number_format($historico->price_close,2) }}</td>

                        <td>{{ number_format($historico->commission,2) }}</td>

                        <td>{{ number_format($historico->swap,2) }}</td>





                        @if ($historico->profit > 0)
                            <td class="bg-success text-white">
                                {{ number_format($historico->profit,2)}}</td>
                        @elseif($historico->profit < 0)
                            <td class="bg-danger text-white">
                                {{ number_format($historico->profit,2) }}</td>
                        @endif



                        <td>{{ $historico->comment }}</td>

                    </tr>
                @endforeach


            </tbody>

        </table>

    </div>










</body>



</html>
