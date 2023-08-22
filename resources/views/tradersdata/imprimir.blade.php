<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Trader Analysis</title>
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
            padding:4rem;
            width:70%;
            margin:2rem auto;
            border: 3px solid #000;
        }
    </style>
</head>

<body class="analisis-imprimir">
    

    <img class="imgUP_superior" src="{{ url('img/logo_sup.png') }}" alt="Logo uptrading">

<p class="font-weight-bold" style="text-align: right;">Fecha Inicio: <span style="font-weight:400">{{ $fecha_inicio }} </span></p>
<p class="font-weight-bold" style="text-align: right;">Fecha Fin: <span style="font-weight:400">{{ $fecha_fin }} </span></p>
<p class="font-weight-bold" style="text-align: right;">Trader: <span style="font-weight:400">{{ $tradersNombre->Signal }} </span></p>
<p class="font-weight-bold" style="text-align: right;">Value: <span style="font-weight:400">{{ $value }} </span></p>
<p class="font-weight-bold" style="text-align: right;">Variant: <span style="font-weight:400">{{ $variant }} </span></p>



    @php
        $profTotal = DB::table('operaciones_traders')
            ->select(DB::raw('SUM(profit) as profit'))
            ->where('trader', $tradersNombre->id)
            ->where('advance', '!=', 999999)
            ->where('retracement', '!=', 999999)
            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
            ->first();
    @endphp

    <div class="row d-flex justify-content-center">
        <table class="table table-striped table-bordered nowrap"
            style="width: 100% !important; margin-left: 0px !important; margin-right: 0px !important;">
            <thead class="text-center"
                style="z-index: 999; background-color:#abd9e1; vertical-align: middle !important; text-align: center !important;">
                <tr>
                    <th style="font-size:7px;" data-priority="0" scope="col" colspan="7">{{ $tradersNombre->Signal }}</th>
                    <th style="font-size:7px;" data-priority="0" scope="col" colspan="3">Lotes</th>
                    <th style="font-size:7px;" data-priority="0" scope="col" colspan="3">Advance</th>
                    <th style="font-size:7px;" data-priority="0" scope="col" colspan="3">Retracement</th>
                    <th style="font-size:7px;" data-priority="0" scope="col" colspan="4">PIP</th>
                    <th style="font-size:7px;" data-priority="0" scope="col" colspan="3">Hours</th>
                    <th style="font-size:7px;" data-priority="0" scope="col">
                        <p style="font-size:7px;">Total: {{ number_format($profTotal->profit, 2) }}</p>
                        <p style="font-size:7px;">Balance: {{ number_format($tradersNombre->Balance, 2) }}</p>
                    </th>
                </tr>
                <tr style="font-size:7px;">
                    <th data-priority="0" scope="col">PAIR</th>
                    <th data-priority="0" scope="col">Registros</th>
                    <th data-priority="0" scope="col">PIP +</th>
                    <th data-priority="0" scope="col">PIP - </th>
                    <th data-priority="0" scope="col">PIP SUM </th>
                    <th data-priority="0" scope="col">Buy</th>
                    <th data-priority="0" scope="col">Sell</th>
                    <th data-priority="0" scope="col">AVG</th>
                    <th data-priority="0" scope="col">STP</th>
                    <th data-priority="0" scope="col">MAX</th>
                    <th data-priority="0" scope="col">AVG</th>
                    <th data-priority="0" scope="col">STP</th>
                    <th data-priority="0" scope="col">MAX</th>
                    <th data-priority="0" scope="col">AVG</th>
                    <th data-priority="0" scope="col">STP</th>
                    <th data-priority="0" scope="col">MAX</th>
                    <th data-priority="0" scope="col">AVG</th>
                    <th data-priority="0" scope="col">STP</th>
                    <th data-priority="0" scope="col">MIN</th>
                    <th data-priority="0" scope="col">MAX</th>
                    <th data-priority="0" scope="col">AVG</th>
                    <th data-priority="0" scope="col">STP</th>
                    <th data-priority="0" scope="col">MAX</th>
                    <th data-priority="0" scope="col">PROFIT</th>
                </tr>
            </thead>
            <tbody
                style="vertical-align: middle !important; text-align: center !important; padding: 5px !important; font-size:6.3px;">
                @foreach ($monedas as $moneda)
                    @php
                        $registros = DB::table('operaciones_traders')
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->count();
                        
                        $pipsump = DB::table('operaciones_traders')
                            ->select(DB::raw('SUM(pips) as sumpip'))
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->where('pips', '>', 0)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->get();
                        
                        $pipsumn = DB::table('operaciones_traders')
                            ->select(DB::raw('SUM(pips) as sumpip'))
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->where('pips', '<', 0)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->get();
                        
                        $pipsumtotal = DB::table('operaciones_traders')
                            ->select(DB::raw('SUM(pips) as sumpip'))
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->get();
                        
                        $buy = DB::table('operaciones_traders')
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('type', 'Buy')
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->count();
                        
                        $sell = DB::table('operaciones_traders')
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('type', 'Sell')
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->count();
                        
                        $volumeavg = DB::table('operaciones_traders')
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->avg('volume');
                        
                        $volumestd = DB::table('operaciones_traders')
                            ->select(DB::raw('stddev(volume) as std'))
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->get();
                        
                        $volumemax = DB::table('operaciones_traders')
                            ->select(DB::raw('MAX(volume) as max'))
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->get();
                        
                        $advavg = DB::table('operaciones_traders')
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->avg('advance');
                        
                        $advstd = DB::table('operaciones_traders')
                            ->select(DB::raw('stddev(advance) as std'))
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->get();
                        
                        $advmax = DB::table('operaciones_traders')
                            ->select(DB::raw('MAX(advance) as max'))
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->get();
                        
                        $retavg = DB::table('operaciones_traders')
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->avg('retracement');
                        
                        $retstd = DB::table('operaciones_traders')
                            ->select(DB::raw('stddev(retracement) as std'))
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->get();
                        
                        $retmax = DB::table('operaciones_traders')
                            ->select(DB::raw('MAX(retracement) as max'))
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->get();
                        
                        $pipavg = DB::table('operaciones_traders')
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->avg('pips');
                        
                        $pipstd = DB::table('operaciones_traders')
                            ->select(DB::raw('stddev(pips) as std'))
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->get();
                        
                        $pipmax = DB::table('operaciones_traders')
                            ->select(DB::raw('MAX(pips) as max'))
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->get();
                        
                        $pipmin = DB::table('operaciones_traders')
                            ->select(DB::raw('MIN(pips) as min'))
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->get();
                        
                        $minavg = DB::table('operaciones_traders')
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->avg('minutes');
                        
                        $minstd = DB::table('operaciones_traders')
                            ->select(DB::raw('stddev(minutes) as std'))
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->get();
                        
                        $minmax = DB::table('operaciones_traders')
                            ->select(DB::raw('MAX(minutes) as max'))
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->get();
                        
                        $profsum = DB::table('operaciones_traders')
                            ->select(DB::raw('SUM(profit) as profit'))
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->first();
                        
                    @endphp

                    @if ($registros > 0)
                        <tr>
                            <td>{{ $moneda }}</td>
                            <td>{{ $registros }}</td>
                            <td>{{ number_format($pipsump[0]->sumpip, 2) }}</td>
                            <td>{{ number_format($pipsumn[0]->sumpip * -1, 2) }}</td>
                            <td>{{ number_format($pipsumtotal[0]->sumpip, 2) }}</td>
                            <td>{{ $buy }}</td>
                            <td>{{ $sell }}</td>

                            <td>{{ number_format($volumeavg, 2) }}</td>
                            <td>{{ number_format($volumestd[0]->std, 2) }}</td>
                            <td>{{ number_format($volumemax[0]->max, 2) }}</td>

                            <td>{{ number_format($advavg, 1) }}</td>
                            <td>{{ number_format($advstd[0]->std, 1) }}</td>
                            <td>{{ number_format($advmax[0]->max, 1) }}</td>

                            <td>{{ number_format($retavg, 1) }}</td>
                            <td>{{ number_format($retstd[0]->std, 1) }}</td>
                            <td>{{ number_format($retmax[0]->max, 1) }}</td>

                            <td>{{ number_format($pipavg, 1) }}</td>
                            <td>{{ number_format($pipstd[0]->std, 1) }}</td>
                            <td>{{ number_format($pipmin[0]->min, 1) }}</td>
                            <td>{{ number_format($pipmax[0]->max, 1) }}</td>

                            <td>{{ number_format($minavg / 60, 0) }}</td>
                            <td>{{ number_format($minstd[0]->std / 60, 0) }}</td>
                            <td>{{ number_format($minmax[0]->max / 60, 0) }}</td>

                            <td>{{ number_format($profsum->profit, 2) }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <br>

    <div class="pagetitle">
        <p style="font-size: 20px; text-transform: uppercase;"><b>Traders Data Analysis</b></p>
        <div id="contTable2" style="overflow-x: auto;"></div>


    </div>

    <div class="row d-flex justify-content-center">

        <table class="table table-striped table-bordered nowrap"
            style="width: 100% !important; margin-left: 0px !important; margin-right: 0px !important;">
            <thead class="text-center sticky-top"
                style="z-index: 999; background-color:#abd9e1; vertical-align: middle !important; text-align: center !important; font-size:9px;">
                <tr>
                    <th data-priority="0" scope="col" colspan="2">{{ $tradersNombre->Signal }}</th>
                    <th data-priority="0" scope="col" colspan="3">Lotes</th>
                    <th data-priority="0" scope="col" colspan="3">Advance</th>
                    <th data-priority="0" scope="col" colspan="3">Retracement</th>
                    <th data-priority="0" scope="col" colspan="4">PIP</th>
                    <th data-priority="0" scope="col" colspan="5">Hours</th>
                </tr>
                <tr>
                    <th data-priority="0" scope="col">PAIR</th>
                    <th data-priority="0" scope="col">Registros</th>

                    <th data-priority="0" scope="col" colspan="3">RANGES</th>

                    <th data-priority="0" scope="col" colspan="3">RANGES</th>

                    <th data-priority="0" scope="col" colspan="3">RANGES</th>

                    <th data-priority="0" scope="col" colspan="4">RANGES</th>

                    <th data-priority="0" scope="col" colspan="5">RANGES</th>

                </tr>
            </thead>
            <tbody
                style="vertical-align: middle !important; text-align: center !important; padding: 5px !important; font-size:10px;">
                @foreach ($monedas as $moneda)
                    @php
                        $registros = DB::table('operaciones_traders')
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->count();
                        
                        $volumemax = DB::table('operaciones_traders')
                            ->select(DB::raw('MAX(volume) as max'))
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->get();
                        
                        $volumemin = DB::table('operaciones_traders')
                            ->select(DB::raw('MIN(volume) as min'))
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->get();
                        
                        $volmin = floatval($volumemin[0]->min);
                        $volmax = floatval($volumemax[0]->max);
                        $mitadvol = $volmax / 1.2;
                        
                        $countv = DB::table('operaciones_traders')
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->where('volume', '>=', 0)
                            ->where('volume', '<', $volmin)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->orderBy('volume', 'asc')
                            ->count();
                        
                        $countv2 = DB::table('operaciones_traders')
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->where('volume', '>=', $volmin)
                            ->where('volume', '<', $mitadvol)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->count();
                        
                        $countv3 = DB::table('operaciones_traders')
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->where('volume', '>=', $mitadvol)
                            ->where('volume', '<=', $volmax)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->count();
                        
                        $advmax = DB::table('operaciones_traders')
                            ->select(DB::raw('MAX(advance) as max'))
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->get();
                        
                        $advmin = DB::table('operaciones_traders')
                            ->select(DB::raw('MIN(advance) as min'))
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->get();
                        
                        $advamin = floatval($advmin[0]->min);
                        $advamax = floatval($advmax[0]->max);
                        $mitadadv = $advmax[0]->max / 3;
                        $mitad2adv = $mitadadv * 2;
                        
                        $countadv = DB::table('operaciones_traders')
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->where('advance', '>=', 0)
                            ->where('advance', '<', $advamax)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->orderBy('advance', 'asc')
                            ->count();
                        
                        $countadv2 = DB::table('operaciones_traders')
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->where('advance', '>=', $advamin)
                            ->where('advance', '<', $mitadadv)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->count();
                        
                        $countadv3 = DB::table('operaciones_traders')
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->where('advance', '>=', $mitadadv)
                            ->where('advance', '<', $mitad2adv)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->count();
                        
                        $countadv4 = DB::table('operaciones_traders')
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->where('advance', '>=', $mitad2adv)
                            ->where('advance', '<=', $advamax)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->count();
                        
                        $retmax = DB::table('operaciones_traders')
                            ->select(DB::raw('MAX(retracement) as max'))
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->get();
                        
                        $retmin = DB::table('operaciones_traders')
                            ->select(DB::raw('MIN(retracement) as min'))
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->get();
                        
                        $retrmin = floatval($retmin[0]->min);
                        $retrmax = floatval($retmax[0]->max);
                        $mitadret = $advmax[0]->max / 3;
                        $mitad2ret = $mitadret * 2;
                        
                        $countret = DB::table('operaciones_traders')
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->where('retracement', '>=', 0)
                            ->where('retracement', '<', $retrmin)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->orderBy('retracement', 'asc')
                            ->count();
                        
                        $countret2 = DB::table('operaciones_traders')
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->where('retracement', '>=', $retrmin)
                            ->where('retracement', '<', $mitadret)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->count();
                        
                        $countret3 = DB::table('operaciones_traders')
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->where('retracement', '>=', $mitadret)
                            ->where('retracement', '<', $mitad2ret)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->count();
                        
                        $countret4 = DB::table('operaciones_traders')
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->where('retracement', '>=', $mitad2ret)
                            ->where('retracement', '<=', $retrmax)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->count();
                        
                        $pipmax = DB::table('operaciones_traders')
                            ->select(DB::raw('MAX(pips) as max'))
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->get();
                        
                        $pipmin = DB::table('operaciones_traders')
                            ->select(DB::raw('MIN(pips) as min'))
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->get();
                        
                        $pipsmin = floatval($pipmin[0]->min);
                        $pipmaximo = floatval($pipmax[0]->max);
                        $mitadpip = $pipmax[0]->max / 3;
                        $mitad2pip = $mitadpip * 2;
                        
                        $countp = DB::table('operaciones_traders')
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->where('pips', '>=', $pipsmin)
                            ->where('pips', '<', 0)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->orderBy('pips', 'asc')
                            ->count();
                        
                        $countp2 = DB::table('operaciones_traders')
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->where('pips', '>=', 0)
                            ->where('pips', '<', $mitadpip)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->count();
                        
                        $countp3 = DB::table('operaciones_traders')
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->where('pips', '>=', $mitadpip)
                            ->where('pips', '<', $mitad2pip)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->count();
                        
                        $countp4 = DB::table('operaciones_traders')
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->where('pips', '>=', $mitad2pip)
                            ->where('pips', '<=', $pipmaximo)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->count();
                        
                        $minmax = DB::table('operaciones_traders')
                            ->select(DB::raw('MAX(minutes) as max'))
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->get();
                        
                        $minumin = DB::table('operaciones_traders')
                            ->select(DB::raw('MIN(minutes) as min'))
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->get();
                        
                        $minmin = floatval($minumin[0]->min);
                        $maxmin = floatval($minmax[0]->max);
                        $mitadmin = $minmax[0]->max / 3;
                        $mitad2min = $mitadmin * 2;
                        
                        $countm = DB::table('operaciones_traders')
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->where('minutes', '>=', 0)
                            ->where('minutes', '<', $minmin)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->orderBy('minutes', 'asc')
                            ->count();
                        
                        $countm2 = DB::table('operaciones_traders')
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->where('minutes', '>=', $minmin)
                            ->where('minutes', '<', $mitadmin)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->count();
                        
                        $countm3 = DB::table('operaciones_traders')
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->where('minutes', '>=', $mitadmin)
                            ->where('minutes', '<', $mitad2min)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->count();
                        
                        $countm4 = DB::table('operaciones_traders')
                            ->where('symbol', $moneda)
                            ->where('trader', $tradersNombre->id)
                            ->where('advance', '!=', 999999)
                            ->where('retracement', '!=', 999999)
                            ->where('minutes', '>=', $mitad2min)
                            ->where('minutes', '<=', $maxmin)
                            ->whereBetween('time_1', [$fecha_inicio, $fecha_fin])
                            ->count();
                        
                    @endphp

                    @if ($registros > 0)
                        <tr>
                            <td>{{ $moneda }}</td>
                            <td>{{ $registros }}</td>


                            <td data-priority="0" scope="col">{{ $countv }} <p style="font-size:9px">
                                    {{ number_format($volmin, 2) }}</p>
                            </td>
                            <td data-priority="0" scope="col">{{ $countv2 }} <p style="font-size:9px">
                                    {{ number_format($mitadvol, 2) }}</p>
                            </td>
                            <td data-priority="0" scope="col">{{ $countv3 }} <p style="font-size:9px">
                                    {{ number_format($volmax, 2) }}</p>
                            </td>


                            <td data-priority="0" scope="col">{{ $countadv2 }} <p style="font-size:9px">
                                    {{ number_format($mitadadv, 2) }}</p>
                            </td>
                            <td data-priority="0" scope="col">{{ $countadv3 }} <p style="font-size:9px">
                                    {{ number_format($mitad2adv, 2) }}</p>
                            </td>
                            <td data-priority="0" scope="col">{{ $countadv4 }}<p style="font-size:9px">
                                    {{ number_format($advamax, 2) }}</p>
                            </td>


                            <td data-priority="0" scope="col">{{ $countret2 }} <p style="font-size:9px">
                                    {{ number_format($mitadret, 2) }}</p>
                            </td>
                            <td data-priority="0" scope="col">{{ $countret3 }} <p style="font-size:9px">
                                    {{ number_format($mitad2ret, 2) }}</p>
                            </td>
                            <td data-priority="0" scope="col">{{ $countret4 }} <p style="font-size:9px">
                                    {{ number_format($retrmax, 2) }}</p>
                            </td>

                            <td data-priority="0" scope="col">{{ $countp }} <p style="font-size:9px">
                                    {{ number_format($pipsmin, 2) }}</p>
                            </td>
                            <td data-priority="0" scope="col">{{ $countp2 }} <p style="font-size:9px">
                                    {{ number_format($mitadpip, 2) }}</p>
                            </td>
                            <td data-priority="0" scope="col">{{ $countp3 }} <p style="font-size:9px">
                                    {{ number_format($mitad2pip, 2) }}</p>
                            </td>
                            <td data-priority="0" scope="col">{{ $countp4 }} <p style="font-size:9px">
                                    {{ number_format($pipmaximo, 2) }}</p>
                            </td>

                            <td data-priority="0" scope="col">{{ $countm }} <p style="font-size:9px">
                                    {{ number_format($minmin / 60, 0) }}</p>
                            </td>
                            <td data-priority="0" scope="col">{{ $countm2 }} <p style="font-size:9px">
                                    {{ number_format($mitadmin / 60, 0) }}</p>
                            </td>
                            <td data-priority="0" scope="col">{{ $countm3 }} <p style="font-size:9px">
                                    {{ number_format($mitad2min / 60, 0) }}</p>
                            </td>
                            <td data-priority="0" scope="col">{{ $countm4 }} <p style="font-size:9px">
                                    {{ number_format($maxmin / 60, 0) }}</p>
                            </td>

                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <hr>
    <img class="imgUP_superior" src="{{ url('img/logo_sup.png') }}" alt="Logo uptrading">

    @for ($i = 1; $i <= 3; $i++)
        <div class="text-center mt-3">
            <p style="font-size: 20px; text-transform: uppercase; font-weight: bold;">OBSERVACIONES:</p>
            <div class="observaciones text-center"></div>
        </div>
    @endfor


</body>

</html>
