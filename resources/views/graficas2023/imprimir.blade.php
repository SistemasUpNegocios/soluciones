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

            width: 320px;

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







    <div class="pagetitle d-flex justify-content-between">

        <div style="margin: 16rem" class="text-center">






            <h1 style="font-size: 30px !important"> INFORME UP TRADING</h1>
            @foreach ($tradersNombre as $trader)
                <h1 style="font-size: 30px !important">ID: {{ $trader['id'] }}</h1>
            @endforeach
            <h1 style="font-size: 30px !important">Fecha de Inicio: {{ $fecha_inicio }}</h1>
            <h1 style="font-family: sans-serif !important; font-size: 30px !important">Fecha de Fin: {{ $fecha_fin }}
            </h1>


        </div>

    </div>






    <div class="table-responsive text-center">
        <h6>Balance</h6>
        <table class="table table-striped table-bordered nowrap text-center"
            style="width: 100%; font-size: 14px !important; vertical-align: middle !important;" id="dataBalance">

            <thead style="vertical-align: middle !important;">
                <tr>
                    <th>Balance Inicial</th>
                    <th>Balance Final</th>

                </tr>
            </thead>

            <tbody>


                <tr>
                    <td>{{ number_format($balanceInicialFiltro->balance, 2) }}</td>
                    <td>{{ number_format($balanceFinalFiltro->balance, 2) }}</td>
                </tr>

            </tbody>

        </table>
    </div>



    <div class="row justify-content-center mt-2 mb-4 text-center">
        <div class="table-responsive">
            <h6 id="table-title">Rendimiento mensual sobre saldo en cuenta</h6>
            <table class="table table-striped table-bordered nowrap text-center"
                style="width: 100%; font-size: 14px !important; vertical-align: middle !important;" id="incremento">


                <thead style="vertical-align: middle !important;">

                    <tr>

                        <th data-priority="0" scope="col">Año</th>

                        <th data-priority="0" scope="col">Ene</th>

                        <th data-priority="0" scope="col">Feb</th>

                        <th data-priority="0" scope="col">Mar</th>

                        <th data-priority="0" scope="col">Abr</th>

                        <th data-priority="0" scope="col">May</th>

                        <th data-priority="0" scope="col">Jun</th>

                        <th data-priority="0" scope="col">Jul</th>

                        <th data-priority="0" scope="col">Ago</th>

                        <th data-priority="0" scope="col">Sep</th>

                        <th data-priority="0" scope="col">Oct</th>

                        <th data-priority="0" scope="col">Nov</th>

                        <th data-priority="0" scope="col">Dic</th>

                        <th data-priority="0" scope="col">Año total</th>

                    </tr>



                </thead>

                <tbody>
                    <tr id="veintidos">
                        <td>2022</td>
                        @php
                            $rendimientoInicialEnero = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2022-01-01', '2022-01-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'asc')
                                ->limit(1)
                                ->first();

                            $rendimientoFinalEnero = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2022-01-01', '2022-01-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'desc')
                                ->limit(1)
                                ->first();

                            if ($rendimientoInicialEnero == '') {
                                $rendimientoPorcentualEnero = 0;
                            } else {
                                $rendimientoPorcentualEnero = (($rendimientoInicialEnero->balance - $rendimientoFinalEnero->balance) / $rendimientoInicialEnero->balance) * -100;
                            }
                        @endphp
                        @if ($rendimientoPorcentualEnero == 0)
                            <td></td>
                        @else
                            <td>{{ number_format($rendimientoPorcentualEnero, 2) }}%

                            </td>
                        @endif
                        @php
                            $rendimientoInicialFebrero = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2022-02-01', '2022-02-28'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'asc')
                                ->limit(1)
                                ->first();

                            $rendimientoFinalFebrero = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2022-02-01', '2022-02-28'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'desc')
                                ->limit(1)
                                ->first();

                            if ($rendimientoInicialFebrero == '') {
                                $rendimientoPorcentualFebrero = 0;
                            } else {
                                $rendimientoPorcentualFebrero = (($rendimientoInicialFebrero->balance - $rendimientoFinalFebrero->balance) / $rendimientoInicialFebrero->balance) * -100;
                            }
                        @endphp
                        @if ($rendimientoPorcentualFebrero == 0)
                            <td></td>
                        @else
                            <td>{{ number_format($rendimientoPorcentualFebrero, 2) }}%</td>
                        @endif
                        @php
                            $rendimientoInicialMarzo = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2022-03-01', '2022-03-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'asc')
                                ->limit(1)
                                ->first();

                            $rendimientoFinalMarzo = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2022-03-01', '2022-03-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'desc')
                                ->limit(1)
                                ->first();

                            if ($rendimientoInicialMarzo == '') {
                                $rendimientoPorcentualMarzo = 0;
                            } else {
                                $rendimientoPorcentualMarzo = (($rendimientoInicialMarzo->balance - $rendimientoFinalMarzo->balance) / $rendimientoInicialMarzo->balance) * -100;
                            }
                        @endphp
                        @if ($rendimientoPorcentualMarzo == 0)
                            <td></td>
                        @else
                            <td>{{ number_format($rendimientoPorcentualMarzo, 2) }}%</td>
                        @endif
                        @php
                            $rendimientoInicialAbril = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2022-04-01', '2022-04-30'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'asc')
                                ->limit(1)
                                ->first();

                            $rendimientoFinalAbril = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2022-04-01', '2022-04-30'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'desc')
                                ->limit(1)
                                ->first();

                            if ($rendimientoInicialAbril == '') {
                                $rendimientoPorcentualAbril = 0;
                            } else {
                                $rendimientoPorcentualAbril = (($rendimientoInicialAbril->balance - $rendimientoFinalAbril->balance) / $rendimientoInicialAbril->balance) * -100;
                            }
                        @endphp
                        @if ($rendimientoPorcentualAbril == 0)
                            <td></td>
                        @else
                            <td>{{ number_format($rendimientoPorcentualAbril, 2) }}%</td>
                        @endif
                        @php
                            $rendimientoInicialMayo = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2022-05-01', '2022-05-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'asc')
                                ->limit(1)
                                ->first();

                            $rendimientoFinalMayo = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2022-05-01', '2022-05-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'desc')
                                ->limit(1)
                                ->first();

                            if ($rendimientoInicialMayo == '') {
                                $rendimientoPorcentualMayo = 0;
                            } else {
                                $rendimientoPorcentualMayo = (($rendimientoInicialMayo->balance - $rendimientoFinalMayo->balance) / $rendimientoInicialMayo->balance) * -100;
                            }
                        @endphp
                        @if ($rendimientoPorcentualMayo == 0)
                            <td></td>
                        @else
                            <td>{{ number_format($rendimientoPorcentualMayo, 2) }}%</td>
                        @endif
                        @php
                            $rendimientoInicialJunio = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2022-06-01', '2022-06-30'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'asc')
                                ->limit(1)
                                ->first();

                            $rendimientoFinalJunio = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2022-06-01', '2022-06-30'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'desc')
                                ->limit(1)
                                ->first();

                            if ($rendimientoInicialJunio == '') {
                                $rendimientoPorcentualJunio = 0;
                            } else {
                                $rendimientoPorcentualJunio = (($rendimientoInicialJunio->balance - $rendimientoFinalJunio->balance) / $rendimientoInicialJunio->balance) * -100;
                            }
                        @endphp
                        @if ($rendimientoPorcentualJunio == 0)
                            <td></td>
                        @else
                            <td>{{ number_format($rendimientoPorcentualJunio, 2) }}%</td>
                        @endif
                        @php
                            $rendimientoInicialJulio = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2022-07-01', '2022-07-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'asc')
                                ->limit(1)
                                ->first();

                            $rendimientoFinalJulio = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2022-07-01', '2022-07-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'desc')
                                ->limit(1)
                                ->first();

                            if ($rendimientoInicialJulio == '') {
                                $rendimientoPorcentualJulio = 0;
                            } else {
                                $rendimientoPorcentualJulio = (($rendimientoInicialJulio->balance - $rendimientoFinalJulio->balance) / $rendimientoInicialJulio->balance) * -100;
                            }
                        @endphp
                        @if ($rendimientoPorcentualJulio == 0)
                            <td></td>
                        @else
                            <td>{{ number_format($rendimientoPorcentualJulio, 2) }}%</td>
                        @endif
                        @php
                            $rendimientoInicialAgosto = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2022-08-01', '2022-08-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'asc')
                                ->limit(1)
                                ->first();

                            $rendimientoFinalAgosto = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2022-08-01', '2022-08-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'desc')
                                ->limit(1)
                                ->first();

                            if ($rendimientoInicialAgosto == '') {
                                $rendimientoPorcentualAgosto = 0;
                            } else {
                                $rendimientoPorcentualAgosto = (($rendimientoInicialAgosto->balance - $rendimientoFinalAgosto->balance) / $rendimientoInicialAgosto->balance) * -100;
                            }
                        @endphp
                        @if ($rendimientoPorcentualAgosto == 0)
                            <td></td>
                        @else
                            <td>{{ number_format($rendimientoPorcentualAgosto, 2) }}%</td>
                        @endif
                        @php
                            $rendimientoInicialSeptiembre = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2022-09-01', '2022-09-30'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'asc')
                                ->limit(1)
                                ->first();

                            $rendimientoFinalSeptiembre = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2022-09-01', '2022-09-30'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'desc')
                                ->limit(1)
                                ->first();

                            if ($rendimientoInicialSeptiembre == '') {
                                $rendimientoPorcentualSeptiembre = 0;
                            } else {
                                $rendimientoPorcentualSeptiembre = (($rendimientoInicialSeptiembre->balance - $rendimientoFinalSeptiembre->balance) / $rendimientoInicialSeptiembre->balance) * -100;
                            }
                        @endphp
                        @if ($rendimientoPorcentualSeptiembre == 0)
                            <td></td>
                        @else
                            <td>{{ number_format($rendimientoPorcentualSeptiembre, 2) }}%</td>
                        @endif
                        @php
                            $rendimientoInicialOctubre = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2022-10-01', '2022-10-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'asc')
                                ->limit(1)
                                ->first();

                            $rendimientoFinalOctubre = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2022-10-01', '2022-10-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'desc')
                                ->limit(1)
                                ->first();

                            if ($rendimientoInicialOctubre == '') {
                                $rendimientoPorcentualOctubre = 0;
                            } else {
                                $rendimientoPorcentualOctubre = (($rendimientoInicialOctubre->balance - $rendimientoFinalOctubre->balance) / $rendimientoInicialOctubre->balance) * -100;
                            }
                        @endphp
                        @if ($rendimientoPorcentualOctubre == 0)
                            <td></td>
                        @else
                            <td>{{ number_format($rendimientoPorcentualOctubre, 2) }}%</td>
                        @endif
                        @php
                            $rendimientoInicialNoviembre = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2022-11-01', '2022-11-30'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'asc')
                                ->limit(1)
                                ->first();

                            $rendimientoFinalNoviembre = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2022-11-01', '2022-11-30'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'desc')
                                ->limit(1)
                                ->first();

                            if ($rendimientoInicialNoviembre == '') {
                                $rendimientoPorcentualNoviembre = 0;
                            } else {
                                $rendimientoPorcentualNoviembre = (($rendimientoInicialNoviembre->balance - $rendimientoFinalNoviembre->balance) / $rendimientoInicialNoviembre->balance) * -100;
                            }
                        @endphp
                        @if ($rendimientoPorcentualNoviembre == 0)
                            <td></td>
                        @else
                            <td>{{ number_format($rendimientoPorcentualNoviembre, 2) }}%</td>
                        @endif
                        @php
                            $rendimientoInicialDiciembre = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2022-12-01', '2022-12-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'asc')
                                ->limit(1)
                                ->first();

                            $rendimientoFinalDiciembre = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2022-12-01', '2022-12-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'desc')
                                ->limit(1)
                                ->first();

                            if ($rendimientoInicialDiciembre == '') {
                                $rendimientoPorcentualDiciembre = 0;
                            } else {
                                $rendimientoPorcentualDiciembre = (($rendimientoInicialDiciembre->balance - $rendimientoFinalDiciembre->balance) / $rendimientoInicialDiciembre->balance) * -100;
                            }
                        @endphp
                        @if ($rendimientoPorcentualDiciembre == 0)
                            <td></td>
                        @else
                            <td>{{ number_format($rendimientoPorcentualDiciembre, 2) }}%</td>
                        @endif
                        @php
                            $rendimientoInicialAnual = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2022-01-01', '2022-12-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'asc')
                                ->limit(1)
                                ->first();

                            $rendimientoFinalAnual = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2022-01-01', '2022-12-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'desc')
                                ->limit(1)
                                ->first();

                            if ($rendimientoInicialAnual == '') {
                                $rendimientoPorcentualAnual = 0;
                            } else {
                                $rendimientoPorcentualAnual = (($rendimientoInicialAnual->balance - $rendimientoFinalAnual->balance) / $rendimientoInicialAnual->balance) * -100;
                            }
                        @endphp
                        @if ($rendimientoPorcentualAnual == 0)
                            <td></td>
                        @else
                            <td>{{ number_format($rendimientoPorcentualAnual, 2) }}%</td>
                        @endif


                    </tr>
                    <tr id="veintitres">
                        <td>2023</td>
                        @php
                            $rendimientoInicialEnero = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2023-01-01', '2023-01-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'asc')
                                ->limit(1)
                                ->first();

                            $rendimientoFinalEnero = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2023-01-01', '2023-01-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'desc')
                                ->limit(1)
                                ->first();

                            if ($rendimientoInicialEnero == '') {
                                $rendimientoPorcentualEnero = 0;
                            } else {
                                $rendimientoPorcentualEnero = (($rendimientoInicialEnero->balance - $rendimientoFinalEnero->balance) / $rendimientoInicialEnero->balance) * -100;
                            }
                        @endphp
                        @if ($rendimientoPorcentualEnero == 0)
                            <td></td>
                        @else
                            <td>{{ number_format($rendimientoPorcentualEnero, 2) }}%</td>
                        @endif
                        @php
                            $rendimientoInicialFebrero = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2023-02-01', '2023-02-28'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'asc')
                                ->limit(1)
                                ->first();

                            $rendimientoFinalFebrero = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2023-02-01', '2023-02-28'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'desc')
                                ->limit(1)
                                ->first();

                            if ($rendimientoInicialFebrero == '') {
                                $rendimientoPorcentualFebrero = 0;
                            } else {
                                $rendimientoPorcentualFebrero = (($rendimientoInicialFebrero->balance - $rendimientoFinalFebrero->balance) / $rendimientoInicialFebrero->balance) * -100;
                            }
                        @endphp
                        @if ($rendimientoPorcentualFebrero == 0)
                            <td></td>
                        @else
                            <td>{{ number_format($rendimientoPorcentualFebrero, 2) }}%</td>
                        @endif
                        @php
                            $rendimientoInicialMarzo = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2023-03-01', '2023-03-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'asc')
                                ->limit(1)
                                ->first();

                            $rendimientoFinalMarzo = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2023-03-01', '2023-03-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'desc')
                                ->limit(1)
                                ->first();

                            if ($rendimientoInicialMarzo == '') {
                                $rendimientoPorcentualMarzo = 0;
                            } else {
                                $rendimientoPorcentualMarzo = (($rendimientoInicialMarzo->balance - $rendimientoFinalMarzo->balance) / $rendimientoInicialMarzo->balance) * -100;
                            }
                        @endphp
                        @if ($rendimientoPorcentualMarzo == 0)
                            <td></td>
                        @else
                            <td>{{ number_format($rendimientoPorcentualMarzo, 2) }}%</td>
                        @endif
                        @php
                            $rendimientoInicialAbril = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2023-04-01', '2023-04-30'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'asc')
                                ->limit(1)
                                ->first();

                            $rendimientoFinalAbril = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2023-04-01', '2023-04-30'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'desc')
                                ->limit(1)
                                ->first();

                            if ($rendimientoInicialAbril == '') {
                                $rendimientoPorcentualAbril = 0;
                            } else {
                                $rendimientoPorcentualAbril = (($rendimientoInicialAbril->balance - $rendimientoFinalAbril->balance) / $rendimientoInicialAbril->balance) * -100;
                            }
                        @endphp
                        @if ($rendimientoPorcentualAbril == 0)
                            <td></td>
                        @else
                            <td>{{ number_format($rendimientoPorcentualAbril, 2) }}%</td>
                        @endif
                        @php
                            $rendimientoInicialMayo = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2023-05-01', '2023-05-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'asc')
                                ->limit(1)
                                ->first();

                            $rendimientoFinalMayo = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2023-05-01', '2023-05-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'desc')
                                ->limit(1)
                                ->first();

                            if ($rendimientoInicialMayo == '') {
                                $rendimientoPorcentualMayo = 0;
                            } else {
                                $rendimientoPorcentualMayo = (($rendimientoInicialMayo->balance - $rendimientoFinalMayo->balance) / $rendimientoInicialMayo->balance) * -100;
                            }
                        @endphp
                        @if ($rendimientoPorcentualMayo == 0)
                            <td></td>
                        @else
                            <td>{{ number_format($rendimientoPorcentualMayo, 2) }}%</td>
                        @endif
                        @php
                            $rendimientoInicialJunio = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2023-06-01', '2023-06-30'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'asc')
                                ->limit(1)
                                ->first();

                            $rendimientoFinalJunio = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2023-06-01', '2023-06-30'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'desc')
                                ->limit(1)
                                ->first();

                            if ($rendimientoInicialJunio == '') {
                                $rendimientoPorcentualJunio = 0;
                            } else {
                                $rendimientoPorcentualJunio = (($rendimientoInicialJunio->balance - $rendimientoFinalJunio->balance) / $rendimientoInicialJunio->balance) * -100;
                            }
                        @endphp
                        @if ($rendimientoPorcentualJunio == 0)
                            <td></td>
                        @else
                            <td>{{ number_format($rendimientoPorcentualJunio, 2) }}%</td>
                        @endif
                        @php
                            $rendimientoInicialJulio = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2023-07-01', '2023-07-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'asc')
                                ->limit(1)
                                ->first();

                            $rendimientoFinalJulio = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2023-07-01', '2023-07-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'desc')
                                ->limit(1)
                                ->first();

                            if ($rendimientoInicialJulio == '') {
                                $rendimientoPorcentualJulio = 0;
                            } else {
                                $rendimientoPorcentualJulio = (($rendimientoInicialJulio->balance - $rendimientoFinalJulio->balance) / $rendimientoInicialJulio->balance) * -100;
                            }
                        @endphp
                        @if ($rendimientoPorcentualJulio == 0)
                            <td></td>
                        @else
                            <td>{{ number_format($rendimientoPorcentualJulio, 2) }}%</td>
                        @endif
                        @php
                            $rendimientoInicialAgosto = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2023-08-01', '2023-08-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'asc')
                                ->limit(1)
                                ->first();

                            $rendimientoFinalAgosto = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2023-08-01', '2023-08-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'desc')
                                ->limit(1)
                                ->first();

                            if ($rendimientoInicialAgosto == '') {
                                $rendimientoPorcentualAgosto = 0;
                            } else {
                                $rendimientoPorcentualAgosto = (($rendimientoInicialAgosto->balance - $rendimientoFinalAgosto->balance) / $rendimientoInicialAgosto->balance) * -100;
                            }
                        @endphp
                        @if ($rendimientoPorcentualAgosto == 0)
                            <td></td>
                        @else
                            <td>{{ number_format($rendimientoPorcentualAgosto, 2) }}%</td>
                        @endif
                        @php
                            $rendimientoInicialSeptiembre = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2023-09-01', '2023-09-30'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'asc')
                                ->limit(1)
                                ->first();

                            $rendimientoFinalSeptiembre = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2023-09-01', '2023-09-30'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'desc')
                                ->limit(1)
                                ->first();

                            if ($rendimientoInicialSeptiembre == '') {
                                $rendimientoPorcentualSeptiembre = 0;
                            } else {
                                $rendimientoPorcentualSeptiembre = (($rendimientoInicialSeptiembre->balance - $rendimientoFinalSeptiembre->balance) / $rendimientoInicialSeptiembre->balance) * -100;
                            }
                        @endphp
                        @if ($rendimientoPorcentualSeptiembre == 0)
                            <td></td>
                        @else
                            <td>{{ number_format($rendimientoPorcentualSeptiembre, 2) }}%</td>
                        @endif
                        @php
                            $rendimientoInicialOctubre = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2023-10-01', '2023-10-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'asc')
                                ->limit(1)
                                ->first();

                            $rendimientoFinalOctubre = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2023-10-01', '2023-10-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'desc')
                                ->limit(1)
                                ->first();

                            if ($rendimientoInicialOctubre == '') {
                                $rendimientoPorcentualOctubre = 0;
                            } else {
                                $rendimientoPorcentualOctubre = (($rendimientoInicialOctubre->balance - $rendimientoFinalOctubre->balance) / $rendimientoInicialOctubre->balance) * -100;
                            }
                        @endphp
                        @if ($rendimientoPorcentualOctubre == 0)
                            <td></td>
                        @else
                            <td>{{ number_format($rendimientoPorcentualOctubre, 2) }}%</td>
                        @endif
                        @php
                            $rendimientoInicialNoviembre = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2023-11-01', '2023-11-30'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'asc')
                                ->limit(1)
                                ->first();

                            $rendimientoFinalNoviembre = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2023-11-01', '2023-11-30'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'desc')
                                ->limit(1)
                                ->first();

                            if ($rendimientoInicialNoviembre == '') {
                                $rendimientoPorcentualNoviembre = 0;
                            } else {
                                $rendimientoPorcentualNoviembre = (($rendimientoInicialNoviembre->balance - $rendimientoFinalNoviembre->balance) / $rendimientoInicialNoviembre->balance) * -100;
                            }
                        @endphp
                        @if ($rendimientoPorcentualNoviembre == 0)
                            <td></td>
                        @else
                            <td>{{ number_format($rendimientoPorcentualNoviembre, 2) }}%</td>
                        @endif
                        @php
                            $rendimientoInicialDiciembre = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2023-12-01', '2023-12-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'asc')
                                ->limit(1)
                                ->first();

                            $rendimientoFinalDiciembre = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2023-12-01', '2023-12-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'desc')
                                ->limit(1)
                                ->first();

                            if ($rendimientoInicialDiciembre == '') {
                                $rendimientoPorcentualDiciembre = 0;
                            } else {
                                $rendimientoPorcentualDiciembre = (($rendimientoInicialDiciembre->balance - $rendimientoFinalDiciembre->balance) / $rendimientoInicialDiciembre->balance) * -100;
                            }
                        @endphp
                        @if ($rendimientoPorcentualDiciembre == 0)
                            <td></td>
                        @else
                            <td>{{ number_format($rendimientoPorcentualDiciembre, 2) }}%</td>
                        @endif

                        @php
                            $rendimientoInicial = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2023-01-01', '2023-12-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'asc')
                                ->limit(1)
                                ->first();

                            $rendimientoFinal = DB::table('general')
                                ->select('balance')
                                ->whereBetween('fecha', ['2023-01-01', '2023-12-31'])
                                ->where('trader_id', '=', $id)
                                ->orderBy('balance', 'desc')
                                ->limit(1)
                                ->first();

                            $rendimientoPorcentual = (($rendimientoInicial->balance - $rendimientoFinal->balance) / $rendimientoInicial->balance) * -100;

                        @endphp
                        @if ($rendimientoPorcentual == 0)
                            <td></td>
                        @else
                            <td>{{ number_format($rendimientoPorcentual, 2) }}% </td>
                        @endif


                    </tr>
                </tbody>

            </table>
        </div>

        <div class="row justify-content-center mt-2 mb-4 text-center">
            <div class="table-responsive">
                <h6 id="table-title3">Rendimiento mensual neto después de comisiones UP
                </h6>
                <table class="table table-striped table-bordered nowrap text-center"
                    style="width: 100%; font-size: 14px !important; vertical-align: middle !important;"
                    id="incremento3">



                    <thead style="vertical-align: middle !important;">

                        <tr>

                            <th data-priority="0" scope="col">Año</th>

                            <th data-priority="0" scope="col">Ene</th>

                            <th data-priority="0" scope="col">Feb</th>

                            <th data-priority="0" scope="col">Mar</th>

                            <th data-priority="0" scope="col">Abr</th>

                            <th data-priority="0" scope="col">May</th>

                            <th data-priority="0" scope="col">Jun</th>

                            <th data-priority="0" scope="col">Jul</th>

                            <th data-priority="0" scope="col">Ago</th>

                            <th data-priority="0" scope="col">Sep</th>

                            <th data-priority="0" scope="col">Oct</th>

                            <th data-priority="0" scope="col">Nov</th>

                            <th data-priority="0" scope="col">Dic</th>

                            <th data-priority="0" scope="col">Año total</th>

                        </tr>



                    </thead>

                    <tbody>
                        <tr id="veintidos3">
                            <td>2022</td>
                            @php
                                $rendimientoInicialEnero = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-01-01', '2022-01-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalEnero = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-01-01', '2022-01-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialEnero == '') {
                                    $rendimientoPorcentualEnero = 0;
                                } else {
                                    $rendimientoPorcentualEnero = (($rendimientoInicialEnero->balance - $rendimientoFinalEnero->balance) / $rendimientoInicialEnero->balance) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualEnero == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualEnero / 2, 2) }}%

                                </td>
                            @endif
                            @php
                                $rendimientoInicialFebrero = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-02-01', '2022-02-28'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalFebrero = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-02-01', '2022-02-28'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialFebrero == '') {
                                    $rendimientoPorcentualFebrero = 0;
                                } else {
                                    $rendimientoPorcentualFebrero = (($rendimientoInicialFebrero->balance - $rendimientoFinalFebrero->balance) / $rendimientoInicialFebrero->balance) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualFebrero == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualFebrero / 2, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialMarzo = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-03-01', '2022-03-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalMarzo = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-03-01', '2022-03-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialMarzo == '') {
                                    $rendimientoPorcentualMarzo = 0;
                                } else {
                                    $rendimientoPorcentualMarzo = (($rendimientoInicialMarzo->balance - $rendimientoFinalMarzo->balance) / $rendimientoInicialMarzo->balance) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualMarzo == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualMarzo / 2, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialAbril = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-04-01', '2022-04-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalAbril = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-04-01', '2022-04-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialAbril == '') {
                                    $rendimientoPorcentualAbril = 0;
                                } else {
                                    $rendimientoPorcentualAbril = (($rendimientoInicialAbril->balance - $rendimientoFinalAbril->balance) / $rendimientoInicialAbril->balance) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualAbril == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualAbril / 2, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialMayo = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-05-01', '2022-05-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalMayo = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-05-01', '2022-05-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialMayo == '') {
                                    $rendimientoPorcentualMayo = 0;
                                } else {
                                    $rendimientoPorcentualMayo = (($rendimientoInicialMayo->balance - $rendimientoFinalMayo->balance) / $rendimientoInicialMayo->balance) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualMayo == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualMayo / 2, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialJunio = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-06-01', '2022-06-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalJunio = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-06-01', '2022-06-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialJunio == '') {
                                    $rendimientoPorcentualJunio = 0;
                                } else {
                                    $rendimientoPorcentualJunio = (($rendimientoInicialJunio->balance - $rendimientoFinalJunio->balance) / $rendimientoInicialJunio->balance) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualJunio == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualJunio / 2, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialJulio = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-07-01', '2022-07-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalJulio = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-07-01', '2022-07-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialJulio == '') {
                                    $rendimientoPorcentualJulio = 0;
                                } else {
                                    $rendimientoPorcentualJulio = (($rendimientoInicialJulio->balance - $rendimientoFinalJulio->balance) / $rendimientoInicialJulio->balance) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualJulio == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualJulio / 2, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialAgosto = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-08-01', '2022-08-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalAgosto = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-08-01', '2022-08-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialAgosto == '') {
                                    $rendimientoPorcentualAgosto = 0;
                                } else {
                                    $rendimientoPorcentualAgosto = (($rendimientoInicialAgosto->balance - $rendimientoFinalAgosto->balance) / $rendimientoInicialAgosto->balance) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualAgosto == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualAgosto / 2, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialSeptiembre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-09-01', '2022-09-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalSeptiembre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-09-01', '2022-09-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialSeptiembre == '') {
                                    $rendimientoPorcentualSeptiembre = 0;
                                } else {
                                    $rendimientoPorcentualSeptiembre = (($rendimientoInicialSeptiembre->balance - $rendimientoFinalSeptiembre->balance) / $rendimientoInicialSeptiembre->balance) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualSeptiembre == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualSeptiembre / 2, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialOctubre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-10-01', '2022-10-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalOctubre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-10-01', '2022-10-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialOctubre == '') {
                                    $rendimientoPorcentualOctubre = 0;
                                } else {
                                    $rendimientoPorcentualOctubre = (($rendimientoInicialOctubre->balance - $rendimientoFinalOctubre->balance) / $rendimientoInicialOctubre->balance) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualOctubre == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualOctubre / 2, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialNoviembre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-11-01', '2022-11-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalNoviembre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-11-01', '2022-11-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialNoviembre == '') {
                                    $rendimientoPorcentualNoviembre = 0;
                                } else {
                                    $rendimientoPorcentualNoviembre = (($rendimientoInicialNoviembre->balance - $rendimientoFinalNoviembre->balance) / $rendimientoInicialNoviembre->balance) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualNoviembre == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualNoviembre / 2, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialDiciembre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-12-01', '2022-12-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalDiciembre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-12-01', '2022-12-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialDiciembre == '') {
                                    $rendimientoPorcentualDiciembre = 0;
                                } else {
                                    $rendimientoPorcentualDiciembre = (($rendimientoInicialDiciembre->balance - $rendimientoFinalDiciembre->balance) / $rendimientoInicialDiciembre->balance) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualDiciembre == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualDiciembre / 2, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialAnual = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-01-01', '2022-12-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalAnual = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-01-01', '2022-12-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialAnual == '') {
                                    $rendimientoPorcentualAnual = 0;
                                } else {
                                    $rendimientoPorcentualAnual = (($rendimientoInicialAnual->balance - $rendimientoFinalAnual->balance) / $rendimientoInicialAnual->balance) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualAnual == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualAnual / 2, 2) }}%</td>
                            @endif


                        </tr>
                        <tr id="veintitres3">
                            <td>2023</td>
                            @php
                                $rendimientoInicialEnero = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-01-01', '2023-01-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalEnero = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-01-01', '2023-01-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialEnero == '') {
                                    $rendimientoPorcentualEnero = 0;
                                } else {
                                    $rendimientoPorcentualEnero = (($rendimientoInicialEnero->balance - $rendimientoFinalEnero->balance) / $rendimientoInicialEnero->balance) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualEnero == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualEnero / 2, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialFebrero = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-02-01', '2023-02-28'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalFebrero = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-02-01', '2023-02-28'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialFebrero == '') {
                                    $rendimientoPorcentualFebrero = 0;
                                } else {
                                    $rendimientoPorcentualFebrero = (($rendimientoInicialFebrero->balance - $rendimientoFinalFebrero->balance) / $rendimientoInicialFebrero->balance) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualFebrero == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualFebrero / 2, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialMarzo = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-03-01', '2023-03-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalMarzo = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-03-01', '2023-03-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialMarzo == '') {
                                    $rendimientoPorcentualMarzo = 0;
                                } else {
                                    $rendimientoPorcentualMarzo = (($rendimientoInicialMarzo->balance - $rendimientoFinalMarzo->balance) / $rendimientoInicialMarzo->balance) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualMarzo == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualMarzo / 2, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialAbril = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-04-01', '2023-04-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalAbril = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-04-01', '2023-04-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialAbril == '') {
                                    $rendimientoPorcentualAbril = 0;
                                } else {
                                    $rendimientoPorcentualAbril = (($rendimientoInicialAbril->balance - $rendimientoFinalAbril->balance) / $rendimientoInicialAbril->balance) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualAbril == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualAbril / 2, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialMayo = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-05-01', '2023-05-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalMayo = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-05-01', '2023-05-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialMayo == '') {
                                    $rendimientoPorcentualMayo = 0;
                                } else {
                                    $rendimientoPorcentualMayo = (($rendimientoInicialMayo->balance - $rendimientoFinalMayo->balance) / $rendimientoInicialMayo->balance) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualMayo == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualMayo / 2, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialJunio = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-06-01', '2023-06-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalJunio = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-06-01', '2023-06-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialJunio == '') {
                                    $rendimientoPorcentualJunio = 0;
                                } else {
                                    $rendimientoPorcentualJunio = (($rendimientoInicialJunio->balance - $rendimientoFinalJunio->balance) / $rendimientoInicialJunio->balance) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualJunio == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualJunio / 2, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialJulio = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-07-01', '2023-07-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalJulio = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-07-01', '2023-07-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialJulio == '') {
                                    $rendimientoPorcentualJulio = 0;
                                } else {
                                    $rendimientoPorcentualJulio = (($rendimientoInicialJulio->balance - $rendimientoFinalJulio->balance) / $rendimientoInicialJulio->balance) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualJulio == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualJulio / 2, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialAgosto = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-08-01', '2023-08-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalAgosto = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-08-01', '2023-08-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialAgosto == '') {
                                    $rendimientoPorcentualAgosto = 0;
                                } else {
                                    $rendimientoPorcentualAgosto = (($rendimientoInicialAgosto->balance - $rendimientoFinalAgosto->balance) / $rendimientoInicialAgosto->balance) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualAgosto == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualAgosto / 2, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialSeptiembre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-09-01', '2023-09-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalSeptiembre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-09-01', '2023-09-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialSeptiembre == '') {
                                    $rendimientoPorcentualSeptiembre = 0;
                                } else {
                                    $rendimientoPorcentualSeptiembre = (($rendimientoInicialSeptiembre->balance - $rendimientoFinalSeptiembre->balance) / $rendimientoInicialSeptiembre->balance) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualSeptiembre == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualSeptiembre / 2, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialOctubre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-10-01', '2023-10-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalOctubre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-10-01', '2023-10-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialOctubre == '') {
                                    $rendimientoPorcentualOctubre = 0;
                                } else {
                                    $rendimientoPorcentualOctubre = (($rendimientoInicialOctubre->balance - $rendimientoFinalOctubre->balance) / $rendimientoInicialOctubre->balance) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualOctubre == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualOctubre / 2, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialNoviembre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-11-01', '2023-11-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalNoviembre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-11-01', '2023-11-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialNoviembre == '') {
                                    $rendimientoPorcentualNoviembre = 0;
                                } else {
                                    $rendimientoPorcentualNoviembre = (($rendimientoInicialNoviembre->balance - $rendimientoFinalNoviembre->balance) / $rendimientoInicialNoviembre->balance) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualNoviembre == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualNoviembre / 2, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialDiciembre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-12-01', '2023-12-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalDiciembre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-12-01', '2023-12-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialDiciembre == '') {
                                    $rendimientoPorcentualDiciembre = 0;
                                } else {
                                    $rendimientoPorcentualDiciembre = (($rendimientoInicialDiciembre->balance - $rendimientoFinalDiciembre->balance) / $rendimientoInicialDiciembre->balance) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualDiciembre == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualDiciembre / 2, 2) }}%</td>
                            @endif

                            @php
                                $rendimientoInicial = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-01-01', '2023-12-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinal = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-01-01', '2023-12-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoPorcentual = (($rendimientoInicial->balance - $rendimientoFinal->balance) / $rendimientoInicial->balance) * -100;

                            @endphp
                            @if ($rendimientoPorcentual == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentual / 2, 2) }}% </td>
                            @endif


                        </tr>
                    </tbody>

                </table>
            </div>





        </div>



        <br> <br />



        <div class="row justify-content-center mt-2 mb-4 text-center">
            <div class="table-responsive">
                <h6 id="table-title2">Rendimiento mensual sobre saldo autorizado operado en MAM
                </h6>
                <table class="table table-striped table-bordered nowrap text-center"
                    style="width: 100%; font-size: 14px !important; vertical-align: middle !important;"
                    id="incremento2">



                    <thead style="vertical-align: middle !important;">

                        <tr>

                            <th data-priority="0" scope="col">Año</th>

                            <th data-priority="0" scope="col">Ene</th>

                            <th data-priority="0" scope="col">Feb</th>

                            <th data-priority="0" scope="col">Mar</th>

                            <th data-priority="0" scope="col">Abr</th>

                            <th data-priority="0" scope="col">May</th>

                            <th data-priority="0" scope="col">Jun</th>

                            <th data-priority="0" scope="col">Jul</th>

                            <th data-priority="0" scope="col">Ago</th>

                            <th data-priority="0" scope="col">Sep</th>

                            <th data-priority="0" scope="col">Oct</th>

                            <th data-priority="0" scope="col">Nov</th>

                            <th data-priority="0" scope="col">Dic</th>

                            <th data-priority="0" scope="col">Año total</th>

                        </tr>



                    </thead>

                    <tbody>
                        <tr id="veintidos2">
                            <td>2022</td>
                            @php
                                $rendimientoInicialEnero = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-01-01', '2022-01-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalEnero = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-01-01', '2022-01-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialEnero == '') {
                                    $rendimientoPorcentualEnero = 0;
                                } else {
                                    $rendimientoPorcentualEnero = (($rendimientoInicialEnero->balance - $rendimientoFinalEnero->balance) / 100000) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualEnero == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualEnero, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialFebrero = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-02-01', '2022-02-28'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalFebrero = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-02-01', '2022-02-28'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialFebrero == '') {
                                    $rendimientoPorcentualFebrero = 0;
                                } else {
                                    $rendimientoPorcentualFebrero = (($rendimientoInicialFebrero->balance - $rendimientoFinalFebrero->balance) / 100000) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualFebrero == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualFebrero, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialMarzo = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-03-01', '2022-03-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalMarzo = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-03-01', '2022-03-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialMarzo == '') {
                                    $rendimientoPorcentualMarzo = 0;
                                } else {
                                    $rendimientoPorcentualMarzo = (($rendimientoInicialMarzo->balance - $rendimientoFinalMarzo->balance) / 100000) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualMarzo == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualMarzo, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialAbril = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-04-01', '2022-04-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalAbril = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-04-01', '2022-04-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialAbril == '') {
                                    $rendimientoPorcentualAbril = 0;
                                } else {
                                    $rendimientoPorcentualAbril = (($rendimientoInicialAbril->balance - $rendimientoFinalAbril->balance) / 100000) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualAbril == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualAbril, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialMayo = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-05-01', '2022-05-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalMayo = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-05-01', '2022-05-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialMayo == '') {
                                    $rendimientoPorcentualMayo = 0;
                                } else {
                                    $rendimientoPorcentualMayo = (($rendimientoInicialMayo->balance - $rendimientoFinalMayo->balance) / 100000) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualMayo == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualMayo, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialJunio = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-06-01', '2022-06-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalJunio = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-06-01', '2022-06-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialJunio == '') {
                                    $rendimientoPorcentualJunio = 0;
                                } else {
                                    $rendimientoPorcentualJunio = (($rendimientoInicialJunio->balance - $rendimientoFinalJunio->balance) / 100000) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualJunio == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualJunio, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialJulio = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-07-01', '2022-07-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalJulio = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-07-01', '2022-07-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialJulio == '') {
                                    $rendimientoPorcentualJulio = 0;
                                } else {
                                    $rendimientoPorcentualJulio = (($rendimientoInicialJulio->balance - $rendimientoFinalJulio->balance) / 100000) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualJulio == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualJulio, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialAgosto = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-08-01', '2022-08-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalAgosto = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-08-01', '2022-08-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialAgosto == '') {
                                    $rendimientoPorcentualAgosto = 0;
                                } else {
                                    $rendimientoPorcentualAgosto = (($rendimientoInicialAgosto->balance - $rendimientoFinalAgosto->balance) / 100000) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualAgosto == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualAgosto, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialSeptiembre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-09-01', '2022-09-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalSeptiembre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-09-01', '2022-09-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialSeptiembre == '') {
                                    $rendimientoPorcentualSeptiembre = 0;
                                } else {
                                    $rendimientoPorcentualSeptiembre = (($rendimientoInicialSeptiembre->balance - $rendimientoFinalSeptiembre->balance) / 100000) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualSeptiembre == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualSeptiembre, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialOctubre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-10-01', '2022-10-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalOctubre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-10-01', '2022-10-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialOctubre == '') {
                                    $rendimientoPorcentualOctubre = 0;
                                } else {
                                    $rendimientoPorcentualOctubre = (($rendimientoInicialOctubre->balance - $rendimientoFinalOctubre->balance) / 100000) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualOctubre == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualOctubre, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialNoviembre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-11-01', '2022-11-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalNoviembre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-11-01', '2022-11-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialNoviembre == '') {
                                    $rendimientoPorcentualNoviembre = 0;
                                } else {
                                    $rendimientoPorcentualNoviembre = (($rendimientoInicialNoviembre->balance - $rendimientoFinalNoviembre->balance) / 100000) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualNoviembre == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualNoviembre, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialDiciembre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-12-01', '2022-12-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalDiciembre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-12-01', '2022-12-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialDiciembre == '') {
                                    $rendimientoPorcentualDiciembre = 0;
                                } else {
                                    $rendimientoPorcentualDiciembre = (($rendimientoInicialDiciembre->balance - $rendimientoFinalDiciembre->balance) / 100000) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualDiciembre == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualDiciembre, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialAnual = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-01-01', '2022-12-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalAnual = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2022-01-01', '2022-12-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialAnual == '') {
                                    $rendimientoPorcentualAnual = 0;
                                } else {
                                    $rendimientoPorcentualAnual = (($rendimientoInicialAnual->balance - $rendimientoFinalAnual->balance) / 100000) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualAnual == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualAnual, 2) }}%</td>
                            @endif


                        </tr>
                        <tr id="veintitres2">
                            <td>2023</td>
                            @php
                                $rendimientoInicialEnero = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-01-01', '2023-01-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalEnero = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-01-01', '2023-01-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialEnero == '') {
                                    $rendimientoPorcentualEnero = 0;
                                } else {
                                    $rendimientoPorcentualEnero = (($rendimientoInicialEnero->balance - $rendimientoFinalEnero->balance) / 100000) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualEnero == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualEnero, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialFebrero = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-02-01', '2023-02-28'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalFebrero = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-02-01', '2023-02-28'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialFebrero == '') {
                                    $rendimientoPorcentualFebrero = 0;
                                } else {
                                    $rendimientoPorcentualFebrero = (($rendimientoInicialFebrero->balance - $rendimientoFinalFebrero->balance) / 100000) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualFebrero == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualFebrero, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialMarzo = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-03-01', '2023-03-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalMarzo = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-03-01', '2023-03-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialMarzo == '') {
                                    $rendimientoPorcentualMarzo = 0;
                                } else {
                                    $rendimientoPorcentualMarzo = (($rendimientoInicialMarzo->balance - $rendimientoFinalMarzo->balance) / 100000) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualMarzo == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualMarzo, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialAbril = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-04-01', '2023-04-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalAbril = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-04-01', '2023-04-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialAbril == '') {
                                    $rendimientoPorcentualAbril = 0;
                                } else {
                                    $rendimientoPorcentualAbril = (($rendimientoInicialAbril->balance - $rendimientoFinalAbril->balance) / 100000) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualAbril == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualAbril, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialMayo = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-05-01', '2023-05-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalMayo = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-05-01', '2023-05-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialMayo == '') {
                                    $rendimientoPorcentualMayo = 0;
                                } else {
                                    $rendimientoPorcentualMayo = (($rendimientoInicialMayo->balance - $rendimientoFinalMayo->balance) / 100000) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualMayo == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualMayo, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialJunio = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-06-01', '2023-06-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalJunio = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-06-01', '2023-06-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialJunio == '') {
                                    $rendimientoPorcentualJunio = 0;
                                } else {
                                    $rendimientoPorcentualJunio = (($rendimientoInicialJunio->balance - $rendimientoFinalJunio->balance) / 100000) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualJunio == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualJunio, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialJulio = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-07-01', '2023-07-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalJulio = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-07-01', '2023-07-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialJulio == '') {
                                    $rendimientoPorcentualJulio = 0;
                                } else {
                                    $rendimientoPorcentualJulio = (($rendimientoInicialJulio->balance - $rendimientoFinalJulio->balance) / 100000) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualJulio == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualJulio, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialAgosto = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-08-01', '2023-08-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalAgosto = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-08-01', '2023-08-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialAgosto == '') {
                                    $rendimientoPorcentualAgosto = 0;
                                } else {
                                    $rendimientoPorcentualAgosto = (($rendimientoInicialAgosto->balance - $rendimientoFinalAgosto->balance) / 100000) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualAgosto == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualAgosto, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialSeptiembre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-09-01', '2023-09-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalSeptiembre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-09-01', '2023-09-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialSeptiembre == '') {
                                    $rendimientoPorcentualSeptiembre = 0;
                                } else {
                                    $rendimientoPorcentualSeptiembre = (($rendimientoInicialSeptiembre->balance - $rendimientoFinalSeptiembre->balance) / 100000) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualSeptiembre == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualSeptiembre, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialOctubre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-10-01', '2023-10-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalOctubre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-10-01', '2023-10-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialOctubre == '') {
                                    $rendimientoPorcentualOctubre = 0;
                                } else {
                                    $rendimientoPorcentualOctubre = (($rendimientoInicialOctubre->balance - $rendimientoFinalOctubre->balance) / 100000) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualOctubre == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualOctubre, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialNoviembre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-11-01', '2023-11-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalNoviembre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-11-01', '2023-11-30'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialNoviembre == '') {
                                    $rendimientoPorcentualNoviembre = 0;
                                } else {
                                    $rendimientoPorcentualNoviembre = (($rendimientoInicialNoviembre->balance - $rendimientoFinalNoviembre->balance) / 100000) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualNoviembre == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualNoviembre, 2) }}%</td>
                            @endif
                            @php
                                $rendimientoInicialDiciembre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-12-01', '2023-12-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinalDiciembre = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-12-01', '2023-12-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                if ($rendimientoInicialDiciembre == '') {
                                    $rendimientoPorcentualDiciembre = 0;
                                } else {
                                    $rendimientoPorcentualDiciembre = (($rendimientoInicialDiciembre->balance - $rendimientoFinalDiciembre->balance) / 100000) * -100;
                                }
                            @endphp
                            @if ($rendimientoPorcentualDiciembre == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentualDiciembre, 2) }}%</td>
                            @endif

                            @php
                                $rendimientoInicial = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-01-01', '2023-12-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'asc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoFinal = DB::table('general')
                                    ->select('balance')
                                    ->whereBetween('fecha', ['2023-01-01', '2023-12-31'])
                                    ->where('trader_id', '=', $id)
                                    ->orderBy('balance', 'desc')
                                    ->limit(1)
                                    ->first();

                                $rendimientoPorcentual = (($rendimientoInicial->balance - $rendimientoFinal->balance) / 100000) * -100;

                            @endphp
                            @if ($rendimientoPorcentual == 0)
                                <td></td>
                            @else
                                <td>{{ number_format($rendimientoPorcentual, 2) }}% </td>
                            @endif


                        </tr>
                    </tbody>

                </table>
            </div>





        </div>

        <div class="container" id="dataResume">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-left">Total Trades: {{ $totalTrades }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-left">Rentables: {{ $rentables }}</p>
                            <p class="text-right"></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-left">No Rentables: {{ $noRentables }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-left">Compras: {{ $compras }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-left">Ventas: {{ $ventas }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body ">
                            <p class="text-left">Beneficio Bruto: {{ number_format($beneficioBruto, 2) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-left">Perdidas Bruto: {{ number_format($perdidasBruto, 2) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-left">Beneficio Medio: {{ number_format($beneficioMedio, 2) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-left">Perdidas Medias: {{ number_format($perdidasMedias, 2) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="table-responsive">
            <table class="table table-striped table-bordered nowrap text-center"
                style="width: 100%; font-size: 14px !important; vertical-align: middle !important;" id="distribucion">
                <thead style="vertical-align: middle !important;">
                    <tr>
                        <th>Activos</th>
                        <th>Operaciones</th>
                        <th>Cortas</th>
                        <th>Largas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activos as $activo)
                        <tr>
                            <td class="activos">{{ $activo }}</td>
                            <td class="operaciones">{{ $activosOperaciones[$activo] }}</td>
                            <td class="cortas">{{ $activosCortas[$activo] }}</td>
                            <td class="largas">{{ $activosLargas[$activo] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
