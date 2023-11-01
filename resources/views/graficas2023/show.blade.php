@extends('index')



@section('title')
    Gráfica Balance/Equity
@endsection



@section('css')
    <script src="https://kit.fontawesome.com/ab4fa16bfb.js" crossorigin="anonymous"></script>

    <style>
        #balanceEquity {

            width: 100%;

            height: 500px;

        }
    </style>
@endsection



@section('content')
    <div class="pagetitle d-flex justify-content-between">

        <div>

            <h1>Gráfica Balance/Equity</h1>

            <nav>

                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Panel de control</a></li>

                    <li class="breadcrumb-item">Gráfica Balance/Equity</li>

                </ol>

            </nav>

        </div>

    </div>



    <section class="section dashboard">

        <div class="row">

            <div class="col-12">

                <div class="card pb-0">

                    <div class="card-body" style="padding-top: 20px;">

                        <div class="row">

                            <div class="pagetitle d-flex justify-content-between align-items-center">

                                <h1 id="numeroTrader"></h1>

                            </div>

                            <hr class="m-0 p-0 mb-2">

                        </div>

                        <div class="row d-flex align-items-center">

                            <div class="col-md-4 col-12">

                                <div class="form-floating mb-3 me-3">

                                    <input type="datetime-local" class="form-control" id="fechaDesdeInput" required>

                                    <label for="fechaDesdeInput">A partir de:</label>

                                </div>

                            </div>

                            <div class="col-md-4 col-12">

                                <div class="form-floating mb-3 me-3">

                                    <input type="datetime-local" class="form-control" id="fechaHastaInput" required>

                                    <label for="fechaHastaInput">Hasta:</label>

                                </div>

                            </div>

                            <div class="col-md-3 col-12">

                                <button class="btn btn-primary mb-3" id="obtenerRegistros">Generar información</button>

                            </div>

                        </div>


                        <div class="table-responsive text-center">
                            <h6 id="title-dataBalance">Balance</h6>
                            <table class="table table-striped table-bordered nowrap text-center"
                                style="width: 100%; font-size: 14px !important; vertical-align: middle !important;"
                                id="dataBalance">

                                <thead style="vertical-align: middle !important;">
                                    <tr>

                                        <th>Balance Inicial</th>
                                        <th>Balance Final</th>

                                    </tr>
                                </thead>

                                <tbody>


                                    <tr id="balanceTable">

                                        <td id="balanceInicialFiltro"></td>
                                        <td id="balanceFinalFiltro"></td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>



                        <div id="balanceEquity"></div>



                        <div class="row justify-content-center mt-2 mb-4 text-center">
                            <div class="table-responsive">
                                <h6 id="table-title">Rendimiento mensual sobre saldo en cuenta</h6>
                                <table class="table table-striped table-bordered nowrap text-center"
                                    style="width: 100%; font-size: 14px !important; vertical-align: middle !important;"
                                    id="incremento">


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
                                    <table class="table table-striped table-bordered nowrap text-center"
                                        style="width: 100%; font-size: 14px !important; vertical-align: middle !important;"
                                        id="incremento3">

                                        <h6 id="table-title3">Rendimiento mensual neto después de comisiones UP
                                        </h6>

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
                                                    <td>{{ number_format($rendimientoPorcentualEnero/2, 2) }}%
    
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
                                                    <td>{{ number_format($rendimientoPorcentualFebrero/2, 2) }}%</td>
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
                                                    <td>{{ number_format($rendimientoPorcentualMarzo/2, 2) }}%</td>
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
                                                    <td>{{ number_format($rendimientoPorcentualAbril/2, 2) }}%</td>
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
                                                    <td>{{ number_format($rendimientoPorcentualMayo/2, 2) }}%</td>
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
                                                    <td>{{ number_format($rendimientoPorcentualJunio/2, 2) }}%</td>
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
                                                    <td>{{ number_format($rendimientoPorcentualJulio/2, 2) }}%</td>
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
                                                    <td>{{ number_format($rendimientoPorcentualAgosto/2, 2) }}%</td>
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
                                                    <td>{{ number_format($rendimientoPorcentualSeptiembre/2, 2) }}%</td>
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
                                                    <td>{{ number_format($rendimientoPorcentualOctubre/2, 2) }}%</td>
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
                                                    <td>{{ number_format($rendimientoPorcentualNoviembre/2, 2) }}%</td>
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
                                                    <td>{{ number_format($rendimientoPorcentualDiciembre/2, 2) }}%</td>
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
                                                    <td>{{ number_format($rendimientoPorcentualAnual/2, 2) }}%</td>
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
                                                    <td>{{ number_format($rendimientoPorcentualEnero/2, 2) }}%</td>
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
                                                    <td>{{ number_format($rendimientoPorcentualFebrero/2, 2) }}%</td>
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
                                                    <td>{{ number_format($rendimientoPorcentualMarzo/2, 2) }}%</td>
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
                                                    <td>{{ number_format($rendimientoPorcentualAbril/2, 2) }}%</td>
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
                                                    <td>{{ number_format($rendimientoPorcentualMayo/2, 2) }}%</td>
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
                                                    <td>{{ number_format($rendimientoPorcentualJunio/2, 2) }}%</td>
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
                                                    <td>{{ number_format($rendimientoPorcentualJulio/2, 2) }}%</td>
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
                                                    <td>{{ number_format($rendimientoPorcentualAgosto/2, 2) }}%</td>
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
                                                    <td>{{ number_format($rendimientoPorcentualSeptiembre/2, 2) }}%</td>
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
                                                    <td>{{ number_format($rendimientoPorcentualOctubre/2, 2) }}%</td>
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
                                                    <td>{{ number_format($rendimientoPorcentualNoviembre/2, 2) }}%</td>
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
                                                    <td>{{ number_format($rendimientoPorcentualDiciembre/2, 2) }}%</td>
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
                                                    <td>{{ number_format($rendimientoPorcentual/2, 2) }}% </td>
                                                @endif
    
    
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>





                            </div>



                            <br> <br />



                            <div class="row justify-content-center mt-2 mb-4 text-center">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered nowrap text-center"
                                        style="width: 100%; font-size: 14px !important; vertical-align: middle !important;"
                                        id="incremento2">

                                        <h6 id="table-title2">Rendimiento mensual sobre saldo autorizado operado en MAM
                                        </h6>

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
                                                <p id="totalTrades" class=""></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <p id="rentables" class=""></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <p id="noRentables" class=""></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <p id="compras" class=""></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <p id="ventas" class=""></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body ">
                                                <p id="beneficioBruto" class=""></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <p id="perdidasBruto" class=""></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <p id="beneficioMedio" class=""></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <p id="perdidasMedias" class=""></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="table-responsive">
                                <table class="table table-striped table-bordered nowrap text-center"
                                    style="width: 100%; font-size: 14px !important; vertical-align: middle !important;"
                                    id="distribucion">

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

                                                <td class="operaciones"></td>
                                                <td class="cortas"></td>
                                                <td class="largas"></td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>



                        </div>



                    </div>

                </div>

            </div>

        </div>

        <button class="btn btn-primary text-center" id="imprimirResume">Imprimir PDF</button>

    </section>
@endsection



@section('preloader')
    <div id="loader" class="loader">

        <h1></h1>

        <span></span>

        <span></span>

        <span></span>

    </div>
@endsection



@section('footer')
    <footer id="footer" class="footer">

        <div class="copyright" id="copyright">

        </div>

        <div class="credits">

            Todos los derechos reservados

        </div>

    </footer>
@endsection



@section('script')
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>

    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>

    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js"></script>

    <script src="{{ asset('js/graficaBalanceEquity2023.js') }}"></script>
@endsection
