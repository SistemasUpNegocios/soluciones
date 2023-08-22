@php
    $datapairs = DB::table('estudio')
        ->where('time', $tr)
        ->where('variant', $variant)
        ->orderByRaw("FIELD(pair , 'EURUSD', 'GBPUSD', 'AUDUSD', 'NZDUSD', 'USDCAD', 'USDCHF', 'USDJPY', 'EURGBP', 'EURAUD', 'EURNZD', 'GBPAUD', 'GBPNZD', 'AUDNZD', 'EURCAD', 'EURCHF', 'EURJPY', 'GBPCAD', 'GBPCHF', 'GBPJPY', 'AUDCAD', 'AUDCHF', 'AUDJPY', 'NZDCAD', 'NZDCHF', 'NZDJPY', 'CADCHF', 'CADJPY', 'CHFJPY') ASC")
        ->orderBy('value', 'asc')
        ->orderBy('test', 'asc')
        ->get();
    
    $datatests = DB::table('estudio')
        ->where('time', $tr)
        ->where('variant', $variant)
        ->orderByRaw("FIELD(pair , 'EURUSD', 'GBPUSD', 'AUDUSD', 'NZDUSD', 'USDCAD', 'USDCHF', 'USDJPY', 'EURGBP', 'EURAUD', 'EURNZD', 'GBPAUD', 'GBPNZD', 'AUDNZD', 'EURCAD', 'EURCHF', 'EURJPY', 'GBPCAD', 'GBPCHF', 'GBPJPY', 'AUDCAD', 'AUDCHF', 'AUDJPY', 'NZDCAD', 'NZDCHF', 'NZDJPY', 'CADCHF', 'CADJPY', 'CHFJPY') ASC")
        ->orderBy('value', 'asc')
        ->whereNull('test')
        ->get();
    
    $registros = DB::table('estudio')
        ->where('pair', $monedas)
        ->count();
    
    $redaccion = DB::table('estudio_lista')
        ->where('id', $variant)
        ->get();
    
    $datafilter = DB::table('estudio')
        ->where('pair', $monedas)
        ->where('time', $tr)
        ->where('variant', $variant)
        ->orderBy('value', 'asc')
        ->count();
    
@endphp

<table class="table table-fixed table-striped table-bordered nowrap"
    style="width: 100% !important; margin-left: 0px !important; margin-right: 0px !important;" id="trader_data">
    <thead class="text-center"
        style="z-index: 999; background-color:white; vertical-align: middle !important; text-align: center !important;">
        <tr>
            @if ($datafilter > 0)
                <th data-priority="0" scope="col" colspan="22">
                    <br>
                    <small>Reporte eficiencia señal
                        {{ \Carbon\Carbon::parse(strtotime($datapairs[0]->date))->format('d-m-Y') }}</small>
                    <br>
                    <small>Periodo de estudio
                        {{ \Carbon\Carbon::parse(strtotime($datapairs[0]->date_ranges1))->format('d-m-Y') }} y
                        {{ \Carbon\Carbon::parse(strtotime($datapairs[0]->date_ranges2))->format('d-m-Y') }}</small>
                    <br>
                    <small>{{ $redaccion[0]->redaccion }}</small>
                </th>
            @elseif ($datafilter == 0)
                <th data-priority="0" scope="col" colspan="22" style="color: grey;">
                    No hay registros
                </th>
            @endif

        </tr>

        <tr>
            <th data-priority="0" scope="col" colspan="1" rowspan="3">Par</th>
            <th data-priority="0" scope="col" colspan="1" rowspan="3">Valor</th>
            <th data-priority="0" scope="col" colspan="8">Compras</th>
            <th data-priority="0" scope="col" colspan="8">Ventas</th>
            <th data-priority="0" scope="col" colspan="2" rowspan="2">Eficiencia</th>
            <th data-priority="0" scope="col" colspan="1" rowspan="2">Mejor</th>
            <th data-priority="0" scope="col" colspan="1" rowspan="3">Acciones</th>

        </tr>
        <tr>
            <th data-priority="0" scope="col" colspan="4">Ganadas</th>
            <th data-priority="0" scope="col" colspan="4">Perdidas</th>
            <th data-priority="0" scope="col" colspan="4">Ganadas</th>
            <th data-priority="0" scope="col" colspan="4">Perdidas</th>

        </tr>

        <tr>
            <th data-priority="0" scope="col">N</th>
            <th data-priority="0" scope="col">R1</th>
            <th data-priority="0" scope="col">R2</th>
            <th data-priority="0" scope="col">R3</th>
            <th data-priority="0" scope="col">N</th>
            <th data-priority="0" scope="col">R1</th>
            <th data-priority="0" scope="col">R2</th>
            <th data-priority="0" scope="col">R3</th>
            <th data-priority="0" scope="col">N</th>
            <th data-priority="0" scope="col">R1</th>
            <th data-priority="0" scope="col">R2</th>
            <th data-priority="0" scope="col">R3</th>
            <th data-priority="0" scope="col">N</th>
            <th data-priority="0" scope="col">R1</th>
            <th data-priority="0" scope="col">R2</th>
            <th data-priority="0" scope="col">R3</th>
            <th data-priority="0" scope="col">Compras</th>
            <th data-priority="0" scope="col">Ventas</th>
            <th data-priority="0" scope="col">Balance</th>

        </tr>

    </thead>
    </div>
    <tbody style="vertical-align: middle !important; text-align: center !important; padding: 5px !important">
        @if ($test == 'datos')

            @foreach ($datapairs as $datapair)
                @php
                    $registros = DB::table('estudio')
                        ->where('pair', $monedas)
                        ->count();
                    
                    //     $datafilter = DB::table('estudio')
                    //     ->where('pair', $par)
                    //     ->where('time', $tr)
                    //     ->where('variant', $variant)
                    //     ->orderBy('value', 'asc')
                    //     ->count();
                    
                    // $redaccion = DB::table('estudio_lista')
                    //     ->where('id', $variant)
                    //     ->get();
                    
                @endphp

                @if ($datafilter > 0)
                    @if ($datapair->pair == 'EURUSD')
                        <tr style="background-color: Oldlace">
                            {{-- Par --}}
                            @if ($datapair->test == null)
                                <td>{{ $datapair->pair }}</td>
                            @else
                                <td title="{{ $datapair->test }}">{{ $datapair->pair }}</td>
                            @endif

                            {{-- Value --}}
                            {{-- Value --}}

                            <td>{{ $datapair->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datapair->bw_n }}</td>
                            <td>{{ $datapair->bw_r1 }}</td>
                            <td>{{ $datapair->bw_r2 }}</td>
                            <td>{{ $datapair->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datapair->bl_n }}</td>
                            <td>{{ $datapair->bl_r1 }}</td>
                            <td>{{ $datapair->bl_r2 }}</td>
                            <td>{{ $datapair->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datapair->sw_n }}</td>
                            <td>{{ $datapair->sw_r1 }}</td>
                            <td>{{ $datapair->sw_r2 }}</td>
                            <td>{{ $datapair->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datapair->sl_n }}</td>
                            <td>{{ $datapair->sl_r1 }}</td>
                            <td>{{ $datapair->sl_r2 }}</td>
                            <td>{{ $datapair->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datapair->id }}" type="button"
                                title="{{$datapair->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>

                            {{-- @if ($loop->iteration % 2 == 0)
                        <script>
                            document.getElementById('par').style.backgroundColor = "blue";
                        </script>
                        @endif --}}


                        </tr>
                    @endif

                    @if ($datapair->pair == 'GBPUSD')
                        <tr style="background-color: Whitesmoke">
                            {{-- Par --}}
                            @if ($datapair->test == null)
                                <td>{{ $datapair->pair }}</td>
                            @else
                                <td title="{{ $datapair->test }}">{{ $datapair->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datapair->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datapair->bw_n }}</td>
                            <td>{{ $datapair->bw_r1 }}</td>
                            <td>{{ $datapair->bw_r2 }}</td>
                            <td>{{ $datapair->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datapair->bl_n }}</td>
                            <td>{{ $datapair->bl_r1 }}</td>
                            <td>{{ $datapair->bl_r2 }}</td>
                            <td>{{ $datapair->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datapair->sw_n }}</td>
                            <td>{{ $datapair->sw_r1 }}</td>
                            <td>{{ $datapair->sw_r2 }}</td>
                            <td>{{ $datapair->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datapair->sl_n }}</td>
                            <td>{{ $datapair->sl_r1 }}</td>
                            <td>{{ $datapair->sl_r2 }}</td>
                            <td>{{ $datapair->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datapair->id }}" type="button"
                                title="{{$datapair->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                    <script>
                        document.getElementById('par').style.backgroundColor = "blue";
                    </script>
                    @endif --}}


                        </tr>
                    @endif

                    @if ($datapair->pair == 'AUDUSD')
                        <tr style="background-color: Oldlace">
                            {{-- Par --}}
                            @if ($datapair->test == null)
                                <td>{{ $datapair->pair }}</td>
                            @else
                                <td title="{{ $datapair->test }}">{{ $datapair->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datapair->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datapair->bw_n }}</td>
                            <td>{{ $datapair->bw_r1 }}</td>
                            <td>{{ $datapair->bw_r2 }}</td>
                            <td>{{ $datapair->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datapair->bl_n }}</td>
                            <td>{{ $datapair->bl_r1 }}</td>
                            <td>{{ $datapair->bl_r2 }}</td>
                            <td>{{ $datapair->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datapair->sw_n }}</td>
                            <td>{{ $datapair->sw_r1 }}</td>
                            <td>{{ $datapair->sw_r2 }}</td>
                            <td>{{ $datapair->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datapair->sl_n }}</td>
                            <td>{{ $datapair->sl_r1 }}</td>
                            <td>{{ $datapair->sl_r2 }}</td>
                            <td>{{ $datapair->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datapair->id }}" type="button"
                                title="{{$datapair->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                    <script>
                        document.getElementById('par').style.backgroundColor = "blue";
                    </script>
                    @endif --}}


                        </tr>
                    @endif


                    @if ($datapair->pair == 'NZDUSD')
                        <tr style="background-color: Whitesmoke">
                            {{-- Par --}}
                            @if ($datapair->test == null)
                                <td>{{ $datapair->pair }}</td>
                            @else
                                <td title="{{ $datapair->test }}">{{ $datapair->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datapair->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datapair->bw_n }}</td>
                            <td>{{ $datapair->bw_r1 }}</td>
                            <td>{{ $datapair->bw_r2 }}</td>
                            <td>{{ $datapair->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datapair->bl_n }}</td>
                            <td>{{ $datapair->bl_r1 }}</td>
                            <td>{{ $datapair->bl_r2 }}</td>
                            <td>{{ $datapair->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datapair->sw_n }}</td>
                            <td>{{ $datapair->sw_r1 }}</td>
                            <td>{{ $datapair->sw_r2 }}</td>
                            <td>{{ $datapair->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datapair->sl_n }}</td>
                            <td>{{ $datapair->sl_r1 }}</td>
                            <td>{{ $datapair->sl_r2 }}</td>
                            <td>{{ $datapair->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datapair->id }}" type="button"
                                title="{{$datapair->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                    <script>
                        document.getElementById('par').style.backgroundColor = "blue";
                    </script>
                    @endif --}}


                        </tr>
                    @endif

                    @if ($datapair->pair == 'USDCAD')
                        <tr style="background-color: Oldlace">
                            {{-- Par --}}
                            @if ($datapair->test == null)
                                <td>{{ $datapair->pair }}</td>
                            @else
                                <td title="{{ $datapair->test }}">{{ $datapair->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datapair->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datapair->bw_n }}</td>
                            <td>{{ $datapair->bw_r1 }}</td>
                            <td>{{ $datapair->bw_r2 }}</td>
                            <td>{{ $datapair->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datapair->bl_n }}</td>
                            <td>{{ $datapair->bl_r1 }}</td>
                            <td>{{ $datapair->bl_r2 }}</td>
                            <td>{{ $datapair->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datapair->sw_n }}</td>
                            <td>{{ $datapair->sw_r1 }}</td>
                            <td>{{ $datapair->sw_r2 }}</td>
                            <td>{{ $datapair->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datapair->sl_n }}</td>
                            <td>{{ $datapair->sl_r1 }}</td>
                            <td>{{ $datapair->sl_r2 }}</td>
                            <td>{{ $datapair->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datapair->id }}" type="button"
                                title="{{$datapair->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                    <script>
                        document.getElementById('par').style.backgroundColor = "blue";
                    </script>
                    @endif --}}


                        </tr>
                    @endif

                    @if ($datapair->pair == 'USDCHF')
                        <tr style="background-color: Whitesmoke">
                            {{-- Par --}}
                            @if ($datapair->test == null)
                                <td>{{ $datapair->pair }}</td>
                            @else
                                <td title="{{ $datapair->test }}">{{ $datapair->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datapair->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datapair->bw_n }}</td>
                            <td>{{ $datapair->bw_r1 }}</td>
                            <td>{{ $datapair->bw_r2 }}</td>
                            <td>{{ $datapair->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datapair->bl_n }}</td>
                            <td>{{ $datapair->bl_r1 }}</td>
                            <td>{{ $datapair->bl_r2 }}</td>
                            <td>{{ $datapair->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datapair->sw_n }}</td>
                            <td>{{ $datapair->sw_r1 }}</td>
                            <td>{{ $datapair->sw_r2 }}</td>
                            <td>{{ $datapair->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datapair->sl_n }}</td>
                            <td>{{ $datapair->sl_r1 }}</td>
                            <td>{{ $datapair->sl_r2 }}</td>
                            <td>{{ $datapair->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datapair->id }}" type="button"
                                title="{{$datapair->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                     <script>
                         document.getElementById('par').style.backgroundColor = "blue";
                     </script>
                     @endif --}}


                        </tr>
                    @endif

                    @if ($datapair->pair == 'USDJPY')
                        <tr style="background-color: Oldlace">
                            {{-- Par --}}
                            @if ($datapair->test == null)
                                <td>{{ $datapair->pair }}</td>
                            @else
                                <td title="{{ $datapair->test }}">{{ $datapair->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datapair->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datapair->bw_n }}</td>
                            <td>{{ $datapair->bw_r1 }}</td>
                            <td>{{ $datapair->bw_r2 }}</td>
                            <td>{{ $datapair->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datapair->bl_n }}</td>
                            <td>{{ $datapair->bl_r1 }}</td>
                            <td>{{ $datapair->bl_r2 }}</td>
                            <td>{{ $datapair->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datapair->sw_n }}</td>
                            <td>{{ $datapair->sw_r1 }}</td>
                            <td>{{ $datapair->sw_r2 }}</td>
                            <td>{{ $datapair->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datapair->sl_n }}</td>
                            <td>{{ $datapair->sl_r1 }}</td>
                            <td>{{ $datapair->sl_r2 }}</td>
                            <td>{{ $datapair->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datapair->id }}" type="button"
                                title="{{$datapair->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                      <script>
                          document.getElementById('par').style.backgroundColor = "blue";
                      </script>
                      @endif --}}


                        </tr>
                    @endif

                    @if ($datapair->pair == 'EURGBP')
                        <tr style="background-color: Whitesmoke">
                            {{-- Par --}}
                            @if ($datapair->test == null)
                                <td>{{ $datapair->pair }}</td>
                            @else
                                <td title="{{ $datapair->test }}">{{ $datapair->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datapair->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datapair->bw_n }}</td>
                            <td>{{ $datapair->bw_r1 }}</td>
                            <td>{{ $datapair->bw_r2 }}</td>
                            <td>{{ $datapair->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datapair->bl_n }}</td>
                            <td>{{ $datapair->bl_r1 }}</td>
                            <td>{{ $datapair->bl_r2 }}</td>
                            <td>{{ $datapair->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datapair->sw_n }}</td>
                            <td>{{ $datapair->sw_r1 }}</td>
                            <td>{{ $datapair->sw_r2 }}</td>
                            <td>{{ $datapair->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datapair->sl_n }}</td>
                            <td>{{ $datapair->sl_r1 }}</td>
                            <td>{{ $datapair->sl_r2 }}</td>
                            <td>{{ $datapair->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datapair->id }}" type="button"
                                title="{{$datapair->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                       <script>
                           document.getElementById('par').style.backgroundColor = "blue";
                       </script>
                       @endif --}}


                        </tr>
                    @endif

                    @if ($datapair->pair == 'EURAUD')
                        <tr style="background-color: Oldlace">
                            {{-- Par --}}
                            @if ($datapair->test == null)
                                <td>{{ $datapair->pair }}</td>
                            @else
                                <td title="{{ $datapair->test }}">{{ $datapair->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datapair->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datapair->bw_n }}</td>
                            <td>{{ $datapair->bw_r1 }}</td>
                            <td>{{ $datapair->bw_r2 }}</td>
                            <td>{{ $datapair->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datapair->bl_n }}</td>
                            <td>{{ $datapair->bl_r1 }}</td>
                            <td>{{ $datapair->bl_r2 }}</td>
                            <td>{{ $datapair->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datapair->sw_n }}</td>
                            <td>{{ $datapair->sw_r1 }}</td>
                            <td>{{ $datapair->sw_r2 }}</td>
                            <td>{{ $datapair->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datapair->sl_n }}</td>
                            <td>{{ $datapair->sl_r1 }}</td>
                            <td>{{ $datapair->sl_r2 }}</td>
                            <td>{{ $datapair->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datapair->id }}" type="button"
                                title="{{$datapair->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                        <script>
                            document.getElementById('par').style.backgroundColor = "blue";
                        </script>
                        @endif --}}


                        </tr>
                    @endif

                    @if ($datapair->pair == 'EURNZD')
                        <tr style="background-color: Whitesmoke">
                            {{-- Par --}}
                            @if ($datapair->test == null)
                                <td>{{ $datapair->pair }}</td>
                            @else
                                <td title="{{ $datapair->test }}">{{ $datapair->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datapair->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datapair->bw_n }}</td>
                            <td>{{ $datapair->bw_r1 }}</td>
                            <td>{{ $datapair->bw_r2 }}</td>
                            <td>{{ $datapair->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datapair->bl_n }}</td>
                            <td>{{ $datapair->bl_r1 }}</td>
                            <td>{{ $datapair->bl_r2 }}</td>
                            <td>{{ $datapair->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datapair->sw_n }}</td>
                            <td>{{ $datapair->sw_r1 }}</td>
                            <td>{{ $datapair->sw_r2 }}</td>
                            <td>{{ $datapair->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datapair->sl_n }}</td>
                            <td>{{ $datapair->sl_r1 }}</td>
                            <td>{{ $datapair->sl_r2 }}</td>
                            <td>{{ $datapair->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datapair->id }}" type="button"
                                title="{{$datapair->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                         <script>
                             document.getElementById('par').style.backgroundColor = "blue";
                         </script>
                         @endif --}}


                        </tr>
                    @endif

                    @if ($datapair->pair == 'GBPAUD')
                        <tr style="background-color: Oldlace">
                            {{-- Par --}}
                            @if ($datapair->test == null)
                                <td>{{ $datapair->pair }}</td>
                            @else
                                <td title="{{ $datapair->test }}">{{ $datapair->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datapair->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datapair->bw_n }}</td>
                            <td>{{ $datapair->bw_r1 }}</td>
                            <td>{{ $datapair->bw_r2 }}</td>
                            <td>{{ $datapair->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datapair->bl_n }}</td>
                            <td>{{ $datapair->bl_r1 }}</td>
                            <td>{{ $datapair->bl_r2 }}</td>
                            <td>{{ $datapair->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datapair->sw_n }}</td>
                            <td>{{ $datapair->sw_r1 }}</td>
                            <td>{{ $datapair->sw_r2 }}</td>
                            <td>{{ $datapair->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datapair->sl_n }}</td>
                            <td>{{ $datapair->sl_r1 }}</td>
                            <td>{{ $datapair->sl_r2 }}</td>
                            <td>{{ $datapair->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datapair->id }}" type="button"
                                title="{{$datapair->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                          <script>
                              document.getElementById('par').style.backgroundColor = "blue";
                          </script>
                          @endif --}}


                        </tr>
                    @endif

                    @if ($datapair->pair == 'GBPNZD')
                        <tr style="background-color: Whitesmoke">
                            {{-- Par --}}
                            @if ($datapair->test == null)
                                <td>{{ $datapair->pair }}</td>
                            @else
                                <td title="{{ $datapair->test }}">{{ $datapair->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datapair->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datapair->bw_n }}</td>
                            <td>{{ $datapair->bw_r1 }}</td>
                            <td>{{ $datapair->bw_r2 }}</td>
                            <td>{{ $datapair->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datapair->bl_n }}</td>
                            <td>{{ $datapair->bl_r1 }}</td>
                            <td>{{ $datapair->bl_r2 }}</td>
                            <td>{{ $datapair->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datapair->sw_n }}</td>
                            <td>{{ $datapair->sw_r1 }}</td>
                            <td>{{ $datapair->sw_r2 }}</td>
                            <td>{{ $datapair->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datapair->sl_n }}</td>
                            <td>{{ $datapair->sl_r1 }}</td>
                            <td>{{ $datapair->sl_r2 }}</td>
                            <td>{{ $datapair->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datapair->id }}" type="button"
                                title="{{$datapair->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                           <script>
                               document.getElementById('par').style.backgroundColor = "blue";
                           </script>
                           @endif --}}


                        </tr>
                    @endif

                    @if ($datapair->pair == 'AUDNZD')
                        <tr style="background-color: Oldlace">
                            {{-- Par --}}
                            @if ($datapair->test == null)
                                <td>{{ $datapair->pair }}</td>
                            @else
                                <td title="{{ $datapair->test }}">{{ $datapair->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datapair->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datapair->bw_n }}</td>
                            <td>{{ $datapair->bw_r1 }}</td>
                            <td>{{ $datapair->bw_r2 }}</td>
                            <td>{{ $datapair->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datapair->bl_n }}</td>
                            <td>{{ $datapair->bl_r1 }}</td>
                            <td>{{ $datapair->bl_r2 }}</td>
                            <td>{{ $datapair->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datapair->sw_n }}</td>
                            <td>{{ $datapair->sw_r1 }}</td>
                            <td>{{ $datapair->sw_r2 }}</td>
                            <td>{{ $datapair->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datapair->sl_n }}</td>
                            <td>{{ $datapair->sl_r1 }}</td>
                            <td>{{ $datapair->sl_r2 }}</td>
                            <td>{{ $datapair->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datapair->id }}" type="button"
                                title="{{$datapair->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                          <script>
                              document.getElementById('par').style.backgroundColor = "blue";
                          </script>
                          @endif --}}


                        </tr>
                    @endif

                    @if ($datapair->pair == 'EURCAD')
                        <tr style="background-color: Whitesmoke">
                            {{-- Par --}}
                            @if ($datapair->test == null)
                                <td>{{ $datapair->pair }}</td>
                            @else
                                <td title="{{ $datapair->test }}">{{ $datapair->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datapair->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datapair->bw_n }}</td>
                            <td>{{ $datapair->bw_r1 }}</td>
                            <td>{{ $datapair->bw_r2 }}</td>
                            <td>{{ $datapair->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datapair->bl_n }}</td>
                            <td>{{ $datapair->bl_r1 }}</td>
                            <td>{{ $datapair->bl_r2 }}</td>
                            <td>{{ $datapair->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datapair->sw_n }}</td>
                            <td>{{ $datapair->sw_r1 }}</td>
                            <td>{{ $datapair->sw_r2 }}</td>
                            <td>{{ $datapair->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datapair->sl_n }}</td>
                            <td>{{ $datapair->sl_r1 }}</td>
                            <td>{{ $datapair->sl_r2 }}</td>
                            <td>{{ $datapair->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datapair->id }}" type="button"
                                title="{{$datapair->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                           <script>
                               document.getElementById('par').style.backgroundColor = "blue";
                           </script>
                           @endif --}}


                        </tr>
                    @endif

                    @if ($datapair->pair == 'EURCHF')
                        <tr style="background-color: Oldlace">
                            {{-- Par --}}
                            @if ($datapair->test == null)
                                <td>{{ $datapair->pair }}</td>
                            @else
                                <td title="{{ $datapair->test }}">{{ $datapair->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datapair->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datapair->bw_n }}</td>
                            <td>{{ $datapair->bw_r1 }}</td>
                            <td>{{ $datapair->bw_r2 }}</td>
                            <td>{{ $datapair->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datapair->bl_n }}</td>
                            <td>{{ $datapair->bl_r1 }}</td>
                            <td>{{ $datapair->bl_r2 }}</td>
                            <td>{{ $datapair->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datapair->sw_n }}</td>
                            <td>{{ $datapair->sw_r1 }}</td>
                            <td>{{ $datapair->sw_r2 }}</td>
                            <td>{{ $datapair->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datapair->sl_n }}</td>
                            <td>{{ $datapair->sl_r1 }}</td>
                            <td>{{ $datapair->sl_r2 }}</td>
                            <td>{{ $datapair->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datapair->id }}" type="button"
                                title="{{$datapair->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                            <script>
                                document.getElementById('par').style.backgroundColor = "blue";
                            </script>
                            @endif --}}


                        </tr>
                    @endif

                    @if ($datapair->pair == 'EURJPY')
                        <tr style="background-color: Whitesmoke">
                            {{-- Par --}}
                            @if ($datapair->test == null)
                                <td>{{ $datapair->pair }}</td>
                            @else
                                <td title="{{ $datapair->test }}">{{ $datapair->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datapair->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datapair->bw_n }}</td>
                            <td>{{ $datapair->bw_r1 }}</td>
                            <td>{{ $datapair->bw_r2 }}</td>
                            <td>{{ $datapair->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datapair->bl_n }}</td>
                            <td>{{ $datapair->bl_r1 }}</td>
                            <td>{{ $datapair->bl_r2 }}</td>
                            <td>{{ $datapair->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datapair->sw_n }}</td>
                            <td>{{ $datapair->sw_r1 }}</td>
                            <td>{{ $datapair->sw_r2 }}</td>
                            <td>{{ $datapair->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datapair->sl_n }}</td>
                            <td>{{ $datapair->sl_r1 }}</td>
                            <td>{{ $datapair->sl_r2 }}</td>
                            <td>{{ $datapair->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datapair->id }}" type="button"
                                title="{{$datapair->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                             <script>
                                 document.getElementById('par').style.backgroundColor = "blue";
                             </script>
                             @endif --}}


                        </tr>
                    @endif

                    @if ($datapair->pair == 'GBPCAD')
                        <tr style="background-color: Oldlace">
                            {{-- Par --}}
                            @if ($datapair->test == null)
                                <td>{{ $datapair->pair }}</td>
                            @else
                                <td title="{{ $datapair->test }}">{{ $datapair->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datapair->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datapair->bw_n }}</td>
                            <td>{{ $datapair->bw_r1 }}</td>
                            <td>{{ $datapair->bw_r2 }}</td>
                            <td>{{ $datapair->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datapair->bl_n }}</td>
                            <td>{{ $datapair->bl_r1 }}</td>
                            <td>{{ $datapair->bl_r2 }}</td>
                            <td>{{ $datapair->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datapair->sw_n }}</td>
                            <td>{{ $datapair->sw_r1 }}</td>
                            <td>{{ $datapair->sw_r2 }}</td>
                            <td>{{ $datapair->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datapair->sl_n }}</td>
                            <td>{{ $datapair->sl_r1 }}</td>
                            <td>{{ $datapair->sl_r2 }}</td>
                            <td>{{ $datapair->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif


                            <td><a href="" data-id="{{ $datapair->id }}" type="button"
                                title="{{$datapair->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                              <script>
                                  document.getElementById('par').style.backgroundColor = "blue";
                              </script>
                              @endif --}}


                        </tr>
                    @endif


                    @if ($datapair->pair == 'GBPCHF')
                        <tr style="background-color: Whitesmoke">
                            {{-- Par --}}
                            @if ($datapair->test == null)
                                <td>{{ $datapair->pair }}</td>
                            @else
                                <td title="{{ $datapair->test }}">{{ $datapair->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datapair->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datapair->bw_n }}</td>
                            <td>{{ $datapair->bw_r1 }}</td>
                            <td>{{ $datapair->bw_r2 }}</td>
                            <td>{{ $datapair->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datapair->bl_n }}</td>
                            <td>{{ $datapair->bl_r1 }}</td>
                            <td>{{ $datapair->bl_r2 }}</td>
                            <td>{{ $datapair->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datapair->sw_n }}</td>
                            <td>{{ $datapair->sw_r1 }}</td>
                            <td>{{ $datapair->sw_r2 }}</td>
                            <td>{{ $datapair->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datapair->sl_n }}</td>
                            <td>{{ $datapair->sl_r1 }}</td>
                            <td>{{ $datapair->sl_r2 }}</td>
                            <td>{{ $datapair->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datapair->id }}" type="button"
                                title="{{$datapair->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                               <script>
                                   document.getElementById('par').style.backgroundColor = "blue";
                               </script>
                               @endif --}}


                        </tr>
                    @endif

                    @if ($datapair->pair == 'GBPJPY')
                        <tr style="background-color: Oldlace">
                            {{-- Par --}}
                            @if ($datapair->test == null)
                                <td>{{ $datapair->pair }}</td>
                            @else
                                <td title="{{ $datapair->test }}">{{ $datapair->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datapair->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datapair->bw_n }}</td>
                            <td>{{ $datapair->bw_r1 }}</td>
                            <td>{{ $datapair->bw_r2 }}</td>
                            <td>{{ $datapair->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datapair->bl_n }}</td>
                            <td>{{ $datapair->bl_r1 }}</td>
                            <td>{{ $datapair->bl_r2 }}</td>
                            <td>{{ $datapair->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datapair->sw_n }}</td>
                            <td>{{ $datapair->sw_r1 }}</td>
                            <td>{{ $datapair->sw_r2 }}</td>
                            <td>{{ $datapair->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datapair->sl_n }}</td>
                            <td>{{ $datapair->sl_r1 }}</td>
                            <td>{{ $datapair->sl_r2 }}</td>
                            <td>{{ $datapair->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datapair->id }}" type="button"
                                title="{{$datapair->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                        </tr>
                    @endif

                    @if ($datapair->pair == 'AUDCAD')
                        <tr style="background-color: Whitesmoke">
                            {{-- Par --}}
                            @if ($datapair->test == null)
                                <td>{{ $datapair->pair }}</td>
                            @else
                                <td title="{{ $datapair->test }}">{{ $datapair->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datapair->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datapair->bw_n }}</td>
                            <td>{{ $datapair->bw_r1 }}</td>
                            <td>{{ $datapair->bw_r2 }}</td>
                            <td>{{ $datapair->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datapair->bl_n }}</td>
                            <td>{{ $datapair->bl_r1 }}</td>
                            <td>{{ $datapair->bl_r2 }}</td>
                            <td>{{ $datapair->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datapair->sw_n }}</td>
                            <td>{{ $datapair->sw_r1 }}</td>
                            <td>{{ $datapair->sw_r2 }}</td>
                            <td>{{ $datapair->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datapair->sl_n }}</td>
                            <td>{{ $datapair->sl_r1 }}</td>
                            <td>{{ $datapair->sl_r2 }}</td>
                            <td>{{ $datapair->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datapair->id }}" type="button"
                                title="{{$datapair->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                                 <script>
                                     document.getElementById('par').style.backgroundColor = "blue";
                                 </script>
                                 @endif --}}


                        </tr>
                    @endif

                    @if ($datapair->pair == 'AUDCHF')
                        <tr style="background-color: Oldlace">
                            {{-- Par --}}
                            @if ($datapair->test == null)
                                <td>{{ $datapair->pair }}</td>
                            @else
                                <td title="{{ $datapair->test }}">{{ $datapair->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datapair->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datapair->bw_n }}</td>
                            <td>{{ $datapair->bw_r1 }}</td>
                            <td>{{ $datapair->bw_r2 }}</td>
                            <td>{{ $datapair->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datapair->bl_n }}</td>
                            <td>{{ $datapair->bl_r1 }}</td>
                            <td>{{ $datapair->bl_r2 }}</td>
                            <td>{{ $datapair->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datapair->sw_n }}</td>
                            <td>{{ $datapair->sw_r1 }}</td>
                            <td>{{ $datapair->sw_r2 }}</td>
                            <td>{{ $datapair->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datapair->sl_n }}</td>
                            <td>{{ $datapair->sl_r1 }}</td>
                            <td>{{ $datapair->sl_r2 }}</td>
                            <td>{{ $datapair->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datapair->id }}" type="button"
                                title="{{$datapair->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                                  <script>
                                      document.getElementById('par').style.backgroundColor = "blue";
                                  </script>
                                  @endif --}}


                        </tr>
                    @endif

                    @if ($datapair->pair == 'AUDJPY')
                        <tr style="background-color: Whitesmoke">
                            {{-- Par --}}
                            @if ($datapair->test == null)
                                <td>{{ $datapair->pair }}</td>
                            @else
                                <td title="{{ $datapair->test }}">{{ $datapair->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datapair->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datapair->bw_n }}</td>
                            <td>{{ $datapair->bw_r1 }}</td>
                            <td>{{ $datapair->bw_r2 }}</td>
                            <td>{{ $datapair->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datapair->bl_n }}</td>
                            <td>{{ $datapair->bl_r1 }}</td>
                            <td>{{ $datapair->bl_r2 }}</td>
                            <td>{{ $datapair->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datapair->sw_n }}</td>
                            <td>{{ $datapair->sw_r1 }}</td>
                            <td>{{ $datapair->sw_r2 }}</td>
                            <td>{{ $datapair->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datapair->sl_n }}</td>
                            <td>{{ $datapair->sl_r1 }}</td>
                            <td>{{ $datapair->sl_r2 }}</td>
                            <td>{{ $datapair->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datapair->id }}" type="button"
                                title="{{$datapair->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                                   <script>
                                       document.getElementById('par').style.backgroundColor = "blue";
                                   </script>
                                   @endif --}}


                        </tr>
                    @endif

                    @if ($datapair->pair == 'NZDCAD')
                        <tr style="background-color: Oldlace">
                            {{-- Par --}}
                            @if ($datapair->test == null)
                                <td>{{ $datapair->pair }}</td>
                            @else
                                <td title="{{ $datapair->test }}">{{ $datapair->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datapair->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datapair->bw_n }}</td>
                            <td>{{ $datapair->bw_r1 }}</td>
                            <td>{{ $datapair->bw_r2 }}</td>
                            <td>{{ $datapair->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datapair->bl_n }}</td>
                            <td>{{ $datapair->bl_r1 }}</td>
                            <td>{{ $datapair->bl_r2 }}</td>
                            <td>{{ $datapair->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datapair->sw_n }}</td>
                            <td>{{ $datapair->sw_r1 }}</td>
                            <td>{{ $datapair->sw_r2 }}</td>
                            <td>{{ $datapair->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datapair->sl_n }}</td>
                            <td>{{ $datapair->sl_r1 }}</td>
                            <td>{{ $datapair->sl_r2 }}</td>
                            <td>{{ $datapair->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif


                            <td><a href="" data-id="{{ $datapair->id }}" type="button"
                                title="{{$datapair->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>

                            {{-- @if ($loop->iteration % 2 == 0)
                                    <script>
                                        document.getElementById('par').style.backgroundColor = "blue";
                                    </script>
                                    @endif --}}


                        </tr>
                    @endif

                    @if ($datapair->pair == 'NZDCHF')
                        <tr style="background-color: Whitesmoke">
                            {{-- Par --}}
                            @if ($datapair->test == null)
                                <td>{{ $datapair->pair }}</td>
                            @else
                                <td title="{{ $datapair->test }}">{{ $datapair->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datapair->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datapair->bw_n }}</td>
                            <td>{{ $datapair->bw_r1 }}</td>
                            <td>{{ $datapair->bw_r2 }}</td>
                            <td>{{ $datapair->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datapair->bl_n }}</td>
                            <td>{{ $datapair->bl_r1 }}</td>
                            <td>{{ $datapair->bl_r2 }}</td>
                            <td>{{ $datapair->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datapair->sw_n }}</td>
                            <td>{{ $datapair->sw_r1 }}</td>
                            <td>{{ $datapair->sw_r2 }}</td>
                            <td>{{ $datapair->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datapair->sl_n }}</td>
                            <td>{{ $datapair->sl_r1 }}</td>
                            <td>{{ $datapair->sl_r2 }}</td>
                            <td>{{ $datapair->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif


                            <td><a href="" data-id="{{ $datapair->id }}" type="button"
                                title="{{$datapair->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>

                            {{-- @if ($loop->iteration % 2 == 0)
                                     <script>
                                         document.getElementById('par').style.backgroundColor = "blue";
                                     </script>
                                     @endif --}}


                        </tr>
                    @endif


                    @if ($datapair->pair == 'NZDJPY')
                        <tr style="background-color: Oldlace">
                            {{-- Par --}}
                            @if ($datapair->test == null)
                                <td>{{ $datapair->pair }}</td>
                            @else
                                <td title="{{ $datapair->test }}">{{ $datapair->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datapair->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datapair->bw_n }}</td>
                            <td>{{ $datapair->bw_r1 }}</td>
                            <td>{{ $datapair->bw_r2 }}</td>
                            <td>{{ $datapair->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datapair->bl_n }}</td>
                            <td>{{ $datapair->bl_r1 }}</td>
                            <td>{{ $datapair->bl_r2 }}</td>
                            <td>{{ $datapair->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datapair->sw_n }}</td>
                            <td>{{ $datapair->sw_r1 }}</td>
                            <td>{{ $datapair->sw_r2 }}</td>
                            <td>{{ $datapair->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datapair->sl_n }}</td>
                            <td>{{ $datapair->sl_r1 }}</td>
                            <td>{{ $datapair->sl_r2 }}</td>
                            <td>{{ $datapair->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datapair->id }}" type="button"
                                title="{{$datapair->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                                      <script>
                                          document.getElementById('par').style.backgroundColor = "blue";
                                      </script>
                                      @endif --}}


                        </tr>
                    @endif

                    @if ($datapair->pair == 'CADCHF')
                        <tr style="background-color: Whitesmoke">
                            {{-- Par --}}
                            @if ($datapair->test == null)
                                <td>{{ $datapair->pair }}</td>
                            @else
                                <td title="{{ $datapair->test }}">{{ $datapair->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datapair->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datapair->bw_n }}</td>
                            <td>{{ $datapair->bw_r1 }}</td>
                            <td>{{ $datapair->bw_r2 }}</td>
                            <td>{{ $datapair->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datapair->bl_n }}</td>
                            <td>{{ $datapair->bl_r1 }}</td>
                            <td>{{ $datapair->bl_r2 }}</td>
                            <td>{{ $datapair->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datapair->sw_n }}</td>
                            <td>{{ $datapair->sw_r1 }}</td>
                            <td>{{ $datapair->sw_r2 }}</td>
                            <td>{{ $datapair->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datapair->sl_n }}</td>
                            <td>{{ $datapair->sl_r1 }}</td>
                            <td>{{ $datapair->sl_r2 }}</td>
                            <td>{{ $datapair->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datapair->id }}" type="button"
                                title="{{$datapair->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                                       <script>
                                           document.getElementById('par').style.backgroundColor = "blue";
                                       </script>
                                       @endif --}}


                        </tr>
                    @endif

                    @if ($datapair->pair == 'CADJPY')
                        <tr style="background-color: Oldlace">
                            {{-- Par --}}
                            @if ($datapair->test == null)
                                <td>{{ $datapair->pair }}</td>
                            @else
                                <td title="{{ $datapair->test }}">{{ $datapair->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datapair->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datapair->bw_n }}</td>
                            <td>{{ $datapair->bw_r1 }}</td>
                            <td>{{ $datapair->bw_r2 }}</td>
                            <td>{{ $datapair->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datapair->bl_n }}</td>
                            <td>{{ $datapair->bl_r1 }}</td>
                            <td>{{ $datapair->bl_r2 }}</td>
                            <td>{{ $datapair->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datapair->sw_n }}</td>
                            <td>{{ $datapair->sw_r1 }}</td>
                            <td>{{ $datapair->sw_r2 }}</td>
                            <td>{{ $datapair->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datapair->sl_n }}</td>
                            <td>{{ $datapair->sl_r1 }}</td>
                            <td>{{ $datapair->sl_r2 }}</td>
                            <td>{{ $datapair->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif


                            <td><a href="" data-id="{{ $datapair->id }}" type="button"
                                title="{{$datapair->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                                        <script>
                                            document.getElementById('par').style.backgroundColor = "blue";
                                        </script>
                                        @endif --}}


                        </tr>
                    @endif

                    @if ($datapair->pair == 'CHFJPY')
                        <tr style="background-color: Whitesmoke">
                            {{-- Par --}}
                            @if ($datapair->test == null)
                                <td>{{ $datapair->pair }}</td>
                            @else
                                <td title="{{ $datapair->test }}">{{ $datapair->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datapair->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datapair->bw_n }}</td>
                            <td>{{ $datapair->bw_r1 }}</td>
                            <td>{{ $datapair->bw_r2 }}</td>
                            <td>{{ $datapair->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datapair->bl_n }}</td>
                            <td>{{ $datapair->bl_r1 }}</td>
                            <td>{{ $datapair->bl_r2 }}</td>
                            <td>{{ $datapair->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datapair->sw_n }}</td>
                            <td>{{ $datapair->sw_r1 }}</td>
                            <td>{{ $datapair->sw_r2 }}</td>
                            <td>{{ $datapair->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datapair->sl_n }}</td>
                            <td>{{ $datapair->sl_r1 }}</td>
                            <td>{{ $datapair->sl_r2 }}</td>
                            <td>{{ $datapair->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datapair->bw_n / ($datapair->bw_n + $datapair->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datapair->sw_n / ($datapair->sw_n + $datapair->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datapair->id }}" type="button"
                                title="{{$datapair->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                                         <script>
                                             document.getElementById('par').style.backgroundColor = "blue";
                                         </script>
                                         @endif --}}


                        </tr>
                    @endif
                @elseif ($registros == 0)
                    <tr>
                        <td colspan="20">No hay registros</td>
                    </tr>
                @endif
            @endforeach
        @endif

        @if ($test == 'sindatos')
            @foreach ($datatests as $datatest)
                @php
                    $registros = DB::table('estudio')
                        ->where('pair', $monedas)
                        ->count();
                    
                    //     $datafilter = DB::table('estudio')
                    //     ->where('pair', $par)
                    //     ->where('time', $tr)
                    //     ->where('variant', $variant)
                    //     ->orderBy('value', 'asc')
                    //     ->count();
                    
                    // $redaccion = DB::table('estudio_lista')
                    //     ->where('id', $variant)
                    //     ->get();
                    
                @endphp

                @if ($datafilter > 0)
                    @if ($datatest->pair == 'EURUSD')
                        <tr style="background-color: Oldlace">
                            {{-- Par --}}
                            @if ($datatest->test == null)
                                <td>{{ $datatest->pair }}</td>
                            @else
                                <td title="{{ $datatest->test }}">{{ $datatest->pair }}</td>
                            @endif

                            {{-- Value --}}
                            {{-- Value --}}

                            <td>{{ $datatest->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datatest->bw_n }}</td>
                            <td>{{ $datatest->bw_r1 }}</td>
                            <td>{{ $datatest->bw_r2 }}</td>
                            <td>{{ $datatest->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datatest->bl_n }}</td>
                            <td>{{ $datatest->bl_r1 }}</td>
                            <td>{{ $datatest->bl_r2 }}</td>
                            <td>{{ $datatest->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datatest->sw_n }}</td>
                            <td>{{ $datatest->sw_r1 }}</td>
                            <td>{{ $datatest->sw_r2 }}</td>
                            <td>{{ $datatest->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datatest->sl_n }}</td>
                            <td>{{ $datatest->sl_r1 }}</td>
                            <td>{{ $datatest->sl_r2 }}</td>
                            <td>{{ $datatest->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datatest->bw_n / ($datatest->bw_n + $datatest->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datatest->sw_n / ($datatest->sw_n + $datatest->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datatest->id }}" type="button"
                                title="{{$datatest->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>

                            {{-- @if ($loop->iteration % 2 == 0)
                        <script>
                            document.getElementById('par').style.backgroundColor = "blue";
                        </script>
                        @endif --}}


                        </tr>
                    @endif

                    @if ($datatest->pair == 'GBPUSD')
                        <tr style="background-color: Whitesmoke">
                            {{-- Par --}}
                            @if ($datatest->test == null)
                                <td>{{ $datatest->pair }}</td>
                            @else
                                <td title="{{ $datatest->test }}">{{ $datatest->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datatest->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datatest->bw_n }}</td>
                            <td>{{ $datatest->bw_r1 }}</td>
                            <td>{{ $datatest->bw_r2 }}</td>
                            <td>{{ $datatest->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datatest->bl_n }}</td>
                            <td>{{ $datatest->bl_r1 }}</td>
                            <td>{{ $datatest->bl_r2 }}</td>
                            <td>{{ $datatest->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datatest->sw_n }}</td>
                            <td>{{ $datatest->sw_r1 }}</td>
                            <td>{{ $datatest->sw_r2 }}</td>
                            <td>{{ $datatest->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datatest->sl_n }}</td>
                            <td>{{ $datatest->sl_r1 }}</td>
                            <td>{{ $datatest->sl_r2 }}</td>
                            <td>{{ $datatest->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datatest->bw_n / ($datatest->bw_n + $datatest->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datatest->sw_n / ($datatest->sw_n + $datatest->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                

                            <td><a href="" data-id="{{ $datatest->id }}" type="button"
                                title="{{$datatest->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                    <script>
                        document.getElementById('par').style.backgroundColor = "blue";
                    </script>
                    @endif --}}


                        </tr>
                    @endif

                    @if ($datatest->pair == 'AUDUSD')
                        <tr style="background-color: Oldlace">
                            {{-- Par --}}
                            @if ($datatest->test == null)
                                <td>{{ $datatest->pair }}</td>
                            @else
                                <td title="{{ $datatest->test }}">{{ $datatest->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datatest->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datatest->bw_n }}</td>
                            <td>{{ $datatest->bw_r1 }}</td>
                            <td>{{ $datatest->bw_r2 }}</td>
                            <td>{{ $datatest->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datatest->bl_n }}</td>
                            <td>{{ $datatest->bl_r1 }}</td>
                            <td>{{ $datatest->bl_r2 }}</td>
                            <td>{{ $datatest->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datatest->sw_n }}</td>
                            <td>{{ $datatest->sw_r1 }}</td>
                            <td>{{ $datatest->sw_r2 }}</td>
                            <td>{{ $datatest->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datatest->sl_n }}</td>
                            <td>{{ $datatest->sl_r1 }}</td>
                            <td>{{ $datatest->sl_r2 }}</td>
                            <td>{{ $datatest->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datatest->bw_n / ($datatest->bw_n + $datatest->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datatest->sw_n / ($datatest->sw_n + $datatest->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif


                            <td><a href="" data-id="{{ $datatest->id }}" type="button"
                                title="{{$datatest->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>

                            {{-- @if ($loop->iteration % 2 == 0)
                    <script>
                        document.getElementById('par').style.backgroundColor = "blue";
                    </script>
                    @endif --}}


                        </tr>
                    @endif


                    @if ($datatest->pair == 'NZDUSD')
                        <tr style="background-color: Whitesmoke">
                            {{-- Par --}}
                            @if ($datatest->test == null)
                                <td>{{ $datatest->pair }}</td>
                            @else
                                <td title="{{ $datatest->test }}">{{ $datatest->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datatest->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datatest->bw_n }}</td>
                            <td>{{ $datatest->bw_r1 }}</td>
                            <td>{{ $datatest->bw_r2 }}</td>
                            <td>{{ $datatest->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datatest->bl_n }}</td>
                            <td>{{ $datatest->bl_r1 }}</td>
                            <td>{{ $datatest->bl_r2 }}</td>
                            <td>{{ $datatest->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datatest->sw_n }}</td>
                            <td>{{ $datatest->sw_r1 }}</td>
                            <td>{{ $datatest->sw_r2 }}</td>
                            <td>{{ $datatest->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datatest->sl_n }}</td>
                            <td>{{ $datatest->sl_r1 }}</td>
                            <td>{{ $datatest->sl_r2 }}</td>
                            <td>{{ $datatest->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datatest->bw_n / ($datatest->bw_n + $datatest->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datatest->sw_n / ($datatest->sw_n + $datatest->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datatest->id }}" type="button"
                                title="{{$datatest->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                    <script>
                        document.getElementById('par').style.backgroundColor = "blue";
                    </script>
                    @endif --}}


                        </tr>
                    @endif

                    @if ($datatest->pair == 'USDCAD')
                        <tr style="background-color: Oldlace">
                            {{-- Par --}}
                            @if ($datatest->test == null)
                                <td>{{ $datatest->pair }}</td>
                            @else
                                <td title="{{ $datatest->test }}">{{ $datatest->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datatest->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datatest->bw_n }}</td>
                            <td>{{ $datatest->bw_r1 }}</td>
                            <td>{{ $datatest->bw_r2 }}</td>
                            <td>{{ $datatest->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datatest->bl_n }}</td>
                            <td>{{ $datatest->bl_r1 }}</td>
                            <td>{{ $datatest->bl_r2 }}</td>
                            <td>{{ $datatest->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datatest->sw_n }}</td>
                            <td>{{ $datatest->sw_r1 }}</td>
                            <td>{{ $datatest->sw_r2 }}</td>
                            <td>{{ $datatest->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datatest->sl_n }}</td>
                            <td>{{ $datatest->sl_r1 }}</td>
                            <td>{{ $datatest->sl_r2 }}</td>
                            <td>{{ $datatest->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datatest->bw_n / ($datatest->bw_n + $datatest->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datatest->sw_n / ($datatest->sw_n + $datatest->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datatest->id }}" type="button"
                                title="{{$datatest->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>

                            {{-- @if ($loop->iteration % 2 == 0)
                    <script>
                        document.getElementById('par').style.backgroundColor = "blue";
                    </script>
                    @endif --}}


                        </tr>
                    @endif

                    @if ($datatest->pair == 'USDCHF')
                        <tr style="background-color: Whitesmoke">
                            {{-- Par --}}
                            @if ($datatest->test == null)
                                <td>{{ $datatest->pair }}</td>
                            @else
                                <td title="{{ $datatest->test }}">{{ $datatest->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datatest->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datatest->bw_n }}</td>
                            <td>{{ $datatest->bw_r1 }}</td>
                            <td>{{ $datatest->bw_r2 }}</td>
                            <td>{{ $datatest->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datatest->bl_n }}</td>
                            <td>{{ $datatest->bl_r1 }}</td>
                            <td>{{ $datatest->bl_r2 }}</td>
                            <td>{{ $datatest->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datatest->sw_n }}</td>
                            <td>{{ $datatest->sw_r1 }}</td>
                            <td>{{ $datatest->sw_r2 }}</td>
                            <td>{{ $datatest->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datatest->sl_n }}</td>
                            <td>{{ $datatest->sl_r1 }}</td>
                            <td>{{ $datatest->sl_r2 }}</td>
                            <td>{{ $datatest->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datatest->bw_n / ($datatest->bw_n + $datatest->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datatest->sw_n / ($datatest->sw_n + $datatest->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif


                            <td><a href="" data-id="{{ $datatest->id }}" type="button"
                                title="{{$datatest->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>

                            {{-- @if ($loop->iteration % 2 == 0)
                     <script>
                         document.getElementById('par').style.backgroundColor = "blue";
                     </script>
                     @endif --}}


                        </tr>
                    @endif

                    @if ($datatest->pair == 'USDJPY')
                        <tr style="background-color: Oldlace">
                            {{-- Par --}}
                            @if ($datatest->test == null)
                                <td>{{ $datatest->pair }}</td>
                            @else
                                <td title="{{ $datatest->test }}">{{ $datatest->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datatest->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datatest->bw_n }}</td>
                            <td>{{ $datatest->bw_r1 }}</td>
                            <td>{{ $datatest->bw_r2 }}</td>
                            <td>{{ $datatest->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datatest->bl_n }}</td>
                            <td>{{ $datatest->bl_r1 }}</td>
                            <td>{{ $datatest->bl_r2 }}</td>
                            <td>{{ $datatest->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datatest->sw_n }}</td>
                            <td>{{ $datatest->sw_r1 }}</td>
                            <td>{{ $datatest->sw_r2 }}</td>
                            <td>{{ $datatest->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datatest->sl_n }}</td>
                            <td>{{ $datatest->sl_r1 }}</td>
                            <td>{{ $datatest->sl_r2 }}</td>
                            <td>{{ $datatest->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datatest->bw_n / ($datatest->bw_n + $datatest->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datatest->sw_n / ($datatest->sw_n + $datatest->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif


                            <td><a href="" data-id="{{ $datatest->id }}" type="button"
                                title="{{$datatest->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>

                            {{-- @if ($loop->iteration % 2 == 0)
                      <script>
                          document.getElementById('par').style.backgroundColor = "blue";
                      </script>
                      @endif --}}


                        </tr>
                    @endif

                    @if ($datatest->pair == 'EURGBP')
                        <tr style="background-color: Whitesmoke">
                            {{-- Par --}}
                            @if ($datatest->test == null)
                                <td>{{ $datatest->pair }}</td>
                            @else
                                <td title="{{ $datatest->test }}">{{ $datatest->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datatest->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datatest->bw_n }}</td>
                            <td>{{ $datatest->bw_r1 }}</td>
                            <td>{{ $datatest->bw_r2 }}</td>
                            <td>{{ $datatest->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datatest->bl_n }}</td>
                            <td>{{ $datatest->bl_r1 }}</td>
                            <td>{{ $datatest->bl_r2 }}</td>
                            <td>{{ $datatest->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datatest->sw_n }}</td>
                            <td>{{ $datatest->sw_r1 }}</td>
                            <td>{{ $datatest->sw_r2 }}</td>
                            <td>{{ $datatest->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datatest->sl_n }}</td>
                            <td>{{ $datatest->sl_r1 }}</td>
                            <td>{{ $datatest->sl_r2 }}</td>
                            <td>{{ $datatest->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datatest->bw_n / ($datatest->bw_n + $datatest->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datatest->sw_n / ($datatest->sw_n + $datatest->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datatest->id }}" type="button"
                                title="{{$datatest->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                       <script>
                           document.getElementById('par').style.backgroundColor = "blue";
                       </script>
                       @endif --}}


                        </tr>
                    @endif

                    @if ($datatest->pair == 'EURAUD')
                        <tr style="background-color: Oldlace">
                            {{-- Par --}}
                            @if ($datatest->test == null)
                                <td>{{ $datatest->pair }}</td>
                            @else
                                <td title="{{ $datatest->test }}">{{ $datatest->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datatest->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datatest->bw_n }}</td>
                            <td>{{ $datatest->bw_r1 }}</td>
                            <td>{{ $datatest->bw_r2 }}</td>
                            <td>{{ $datatest->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datatest->bl_n }}</td>
                            <td>{{ $datatest->bl_r1 }}</td>
                            <td>{{ $datatest->bl_r2 }}</td>
                            <td>{{ $datatest->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datatest->sw_n }}</td>
                            <td>{{ $datatest->sw_r1 }}</td>
                            <td>{{ $datatest->sw_r2 }}</td>
                            <td>{{ $datatest->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datatest->sl_n }}</td>
                            <td>{{ $datatest->sl_r1 }}</td>
                            <td>{{ $datatest->sl_r2 }}</td>
                            <td>{{ $datatest->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datatest->bw_n / ($datatest->bw_n + $datatest->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datatest->sw_n / ($datatest->sw_n + $datatest->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datatest->id }}" type="button"
                                title="{{$datatest->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                        <script>
                            document.getElementById('par').style.backgroundColor = "blue";
                        </script>
                        @endif --}}


                        </tr>
                    @endif

                    @if ($datatest->pair == 'EURNZD')
                        <tr style="background-color: Whitesmoke">
                            {{-- Par --}}
                            @if ($datatest->test == null)
                                <td>{{ $datatest->pair }}</td>
                            @else
                                <td title="{{ $datatest->test }}">{{ $datatest->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datatest->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datatest->bw_n }}</td>
                            <td>{{ $datatest->bw_r1 }}</td>
                            <td>{{ $datatest->bw_r2 }}</td>
                            <td>{{ $datatest->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datatest->bl_n }}</td>
                            <td>{{ $datatest->bl_r1 }}</td>
                            <td>{{ $datatest->bl_r2 }}</td>
                            <td>{{ $datatest->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datatest->sw_n }}</td>
                            <td>{{ $datatest->sw_r1 }}</td>
                            <td>{{ $datatest->sw_r2 }}</td>
                            <td>{{ $datatest->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datatest->sl_n }}</td>
                            <td>{{ $datatest->sl_r1 }}</td>
                            <td>{{ $datatest->sl_r2 }}</td>
                            <td>{{ $datatest->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datatest->bw_n / ($datatest->bw_n + $datatest->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datatest->sw_n / ($datatest->sw_n + $datatest->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datatest->id }}" type="button"
                                title="{{$datatest->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                         <script>
                             document.getElementById('par').style.backgroundColor = "blue";
                         </script>
                         @endif --}}


                        </tr>
                    @endif

                    @if ($datatest->pair == 'GBPAUD')
                        <tr style="background-color: Oldlace">
                            {{-- Par --}}
                            @if ($datatest->test == null)
                                <td>{{ $datatest->pair }}</td>
                            @else
                                <td title="{{ $datatest->test }}">{{ $datatest->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datatest->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datatest->bw_n }}</td>
                            <td>{{ $datatest->bw_r1 }}</td>
                            <td>{{ $datatest->bw_r2 }}</td>
                            <td>{{ $datatest->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datatest->bl_n }}</td>
                            <td>{{ $datatest->bl_r1 }}</td>
                            <td>{{ $datatest->bl_r2 }}</td>
                            <td>{{ $datatest->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datatest->sw_n }}</td>
                            <td>{{ $datatest->sw_r1 }}</td>
                            <td>{{ $datatest->sw_r2 }}</td>
                            <td>{{ $datatest->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datatest->sl_n }}</td>
                            <td>{{ $datatest->sl_r1 }}</td>
                            <td>{{ $datatest->sl_r2 }}</td>
                            <td>{{ $datatest->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datatest->bw_n / ($datatest->bw_n + $datatest->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datatest->sw_n / ($datatest->sw_n + $datatest->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datatest->id }}" type="button"
                                title="{{$datatest->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                          <script>
                              document.getElementById('par').style.backgroundColor = "blue";
                          </script>
                          @endif --}}


                        </tr>
                    @endif

                    @if ($datatest->pair == 'GBPNZD')
                        <tr style="background-color: Whitesmoke">
                            {{-- Par --}}
                            @if ($datatest->test == null)
                                <td>{{ $datatest->pair }}</td>
                            @else
                                <td title="{{ $datatest->test }}">{{ $datatest->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datatest->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datatest->bw_n }}</td>
                            <td>{{ $datatest->bw_r1 }}</td>
                            <td>{{ $datatest->bw_r2 }}</td>
                            <td>{{ $datatest->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datatest->bl_n }}</td>
                            <td>{{ $datatest->bl_r1 }}</td>
                            <td>{{ $datatest->bl_r2 }}</td>
                            <td>{{ $datatest->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datatest->sw_n }}</td>
                            <td>{{ $datatest->sw_r1 }}</td>
                            <td>{{ $datatest->sw_r2 }}</td>
                            <td>{{ $datatest->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datatest->sl_n }}</td>
                            <td>{{ $datatest->sl_r1 }}</td>
                            <td>{{ $datatest->sl_r2 }}</td>
                            <td>{{ $datatest->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datatest->bw_n / ($datatest->bw_n + $datatest->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datatest->sw_n / ($datatest->sw_n + $datatest->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datatest->id }}" type="button"
                                title="{{$datatest->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                           <script>
                               document.getElementById('par').style.backgroundColor = "blue";
                           </script>
                           @endif --}}


                        </tr>
                    @endif

                    @if ($datatest->pair == 'AUDNZD')
                        <tr style="background-color: Oldlace">
                            {{-- Par --}}
                            @if ($datatest->test == null)
                                <td>{{ $datatest->pair }}</td>
                            @else
                                <td title="{{ $datatest->test }}">{{ $datatest->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datatest->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datatest->bw_n }}</td>
                            <td>{{ $datatest->bw_r1 }}</td>
                            <td>{{ $datatest->bw_r2 }}</td>
                            <td>{{ $datatest->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datatest->bl_n }}</td>
                            <td>{{ $datatest->bl_r1 }}</td>
                            <td>{{ $datatest->bl_r2 }}</td>
                            <td>{{ $datatest->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datatest->sw_n }}</td>
                            <td>{{ $datatest->sw_r1 }}</td>
                            <td>{{ $datatest->sw_r2 }}</td>
                            <td>{{ $datatest->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datatest->sl_n }}</td>
                            <td>{{ $datatest->sl_r1 }}</td>
                            <td>{{ $datatest->sl_r2 }}</td>
                            <td>{{ $datatest->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datatest->bw_n / ($datatest->bw_n + $datatest->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datatest->sw_n / ($datatest->sw_n + $datatest->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif


                            <td><a href="" data-id="{{ $datatest->id }}" type="button"
                                title="{{$datatest->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>

                            {{-- @if ($loop->iteration % 2 == 0)
                          <script>
                              document.getElementById('par').style.backgroundColor = "blue";
                          </script>
                          @endif --}}


                        </tr>
                    @endif

                    @if ($datatest->pair == 'EURCAD')
                        <tr style="background-color: Whitesmoke">
                            {{-- Par --}}
                            @if ($datatest->test == null)
                                <td>{{ $datatest->pair }}</td>
                            @else
                                <td title="{{ $datatest->test }}">{{ $datatest->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datatest->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datatest->bw_n }}</td>
                            <td>{{ $datatest->bw_r1 }}</td>
                            <td>{{ $datatest->bw_r2 }}</td>
                            <td>{{ $datatest->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datatest->bl_n }}</td>
                            <td>{{ $datatest->bl_r1 }}</td>
                            <td>{{ $datatest->bl_r2 }}</td>
                            <td>{{ $datatest->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datatest->sw_n }}</td>
                            <td>{{ $datatest->sw_r1 }}</td>
                            <td>{{ $datatest->sw_r2 }}</td>
                            <td>{{ $datatest->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datatest->sl_n }}</td>
                            <td>{{ $datatest->sl_r1 }}</td>
                            <td>{{ $datatest->sl_r2 }}</td>
                            <td>{{ $datatest->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datatest->bw_n / ($datatest->bw_n + $datatest->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datatest->sw_n / ($datatest->sw_n + $datatest->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datatest->id }}" type="button"
                                title="{{$datatest->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                           <script>
                               document.getElementById('par').style.backgroundColor = "blue";
                           </script>
                           @endif --}}


                        </tr>
                    @endif

                    @if ($datatest->pair == 'EURCHF')
                        <tr style="background-color: Oldlace">
                            {{-- Par --}}
                            @if ($datatest->test == null)
                                <td>{{ $datatest->pair }}</td>
                            @else
                                <td title="{{ $datatest->test }}">{{ $datatest->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datatest->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datatest->bw_n }}</td>
                            <td>{{ $datatest->bw_r1 }}</td>
                            <td>{{ $datatest->bw_r2 }}</td>
                            <td>{{ $datatest->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datatest->bl_n }}</td>
                            <td>{{ $datatest->bl_r1 }}</td>
                            <td>{{ $datatest->bl_r2 }}</td>
                            <td>{{ $datatest->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datatest->sw_n }}</td>
                            <td>{{ $datatest->sw_r1 }}</td>
                            <td>{{ $datatest->sw_r2 }}</td>
                            <td>{{ $datatest->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datatest->sl_n }}</td>
                            <td>{{ $datatest->sl_r1 }}</td>
                            <td>{{ $datatest->sl_r2 }}</td>
                            <td>{{ $datatest->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datatest->bw_n / ($datatest->bw_n + $datatest->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datatest->sw_n / ($datatest->sw_n + $datatest->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datatest->id }}" type="button"
                                title="{{$datatest->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                            <script>
                                document.getElementById('par').style.backgroundColor = "blue";
                            </script>
                            @endif --}}


                        </tr>
                    @endif

                    @if ($datatest->pair == 'EURJPY')
                        <tr style="background-color: Whitesmoke">
                            {{-- Par --}}
                            @if ($datatest->test == null)
                                <td>{{ $datatest->pair }}</td>
                            @else
                                <td title="{{ $datatest->test }}">{{ $datatest->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datatest->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datatest->bw_n }}</td>
                            <td>{{ $datatest->bw_r1 }}</td>
                            <td>{{ $datatest->bw_r2 }}</td>
                            <td>{{ $datatest->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datatest->bl_n }}</td>
                            <td>{{ $datatest->bl_r1 }}</td>
                            <td>{{ $datatest->bl_r2 }}</td>
                            <td>{{ $datatest->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datatest->sw_n }}</td>
                            <td>{{ $datatest->sw_r1 }}</td>
                            <td>{{ $datatest->sw_r2 }}</td>
                            <td>{{ $datatest->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datatest->sl_n }}</td>
                            <td>{{ $datatest->sl_r1 }}</td>
                            <td>{{ $datatest->sl_r2 }}</td>
                            <td>{{ $datatest->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datatest->bw_n / ($datatest->bw_n + $datatest->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datatest->sw_n / ($datatest->sw_n + $datatest->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datatest->id }}" type="button"
                                title="{{$datatest->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                             <script>
                                 document.getElementById('par').style.backgroundColor = "blue";
                             </script>
                             @endif --}}


                        </tr>
                    @endif

                    @if ($datatest->pair == 'GBPCAD')
                        <tr style="background-color: Oldlace">
                            {{-- Par --}}
                            @if ($datatest->test == null)
                                <td>{{ $datatest->pair }}</td>
                            @else
                                <td title="{{ $datatest->test }}">{{ $datatest->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datatest->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datatest->bw_n }}</td>
                            <td>{{ $datatest->bw_r1 }}</td>
                            <td>{{ $datatest->bw_r2 }}</td>
                            <td>{{ $datatest->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datatest->bl_n }}</td>
                            <td>{{ $datatest->bl_r1 }}</td>
                            <td>{{ $datatest->bl_r2 }}</td>
                            <td>{{ $datatest->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datatest->sw_n }}</td>
                            <td>{{ $datatest->sw_r1 }}</td>
                            <td>{{ $datatest->sw_r2 }}</td>
                            <td>{{ $datatest->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datatest->sl_n }}</td>
                            <td>{{ $datatest->sl_r1 }}</td>
                            <td>{{ $datatest->sl_r2 }}</td>
                            <td>{{ $datatest->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datatest->bw_n / ($datatest->bw_n + $datatest->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datatest->sw_n / ($datatest->sw_n + $datatest->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif


                            <td><a href="" data-id="{{ $datatest->id }}" type="button"
                                title="{{$datatest->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                              <script>
                                  document.getElementById('par').style.backgroundColor = "blue";
                              </script>
                              @endif --}}


                        </tr>
                    @endif


                    @if ($datatest->pair == 'GBPCHF')
                        <tr style="background-color: Whitesmoke">
                            {{-- Par --}}
                            @if ($datatest->test == null)
                                <td>{{ $datatest->pair }}</td>
                            @else
                                <td title="{{ $datatest->test }}">{{ $datatest->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datatest->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datatest->bw_n }}</td>
                            <td>{{ $datatest->bw_r1 }}</td>
                            <td>{{ $datatest->bw_r2 }}</td>
                            <td>{{ $datatest->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datatest->bl_n }}</td>
                            <td>{{ $datatest->bl_r1 }}</td>
                            <td>{{ $datatest->bl_r2 }}</td>
                            <td>{{ $datatest->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datatest->sw_n }}</td>
                            <td>{{ $datatest->sw_r1 }}</td>
                            <td>{{ $datatest->sw_r2 }}</td>
                            <td>{{ $datatest->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datatest->sl_n }}</td>
                            <td>{{ $datatest->sl_r1 }}</td>
                            <td>{{ $datatest->sl_r2 }}</td>
                            <td>{{ $datatest->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datatest->bw_n / ($datatest->bw_n + $datatest->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datatest->sw_n / ($datatest->sw_n + $datatest->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif


                            <td><a href="" data-id="{{ $datatest->id }}" type="button"
                                title="{{$datatest->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>

                            {{-- @if ($loop->iteration % 2 == 0)
                               <script>
                                   document.getElementById('par').style.backgroundColor = "blue";
                               </script>
                               @endif --}}


                        </tr>
                    @endif

                    @if ($datatest->pair == 'GBPJPY')
                        <tr style="background-color: Oldlace">
                            {{-- Par --}}
                            @if ($datatest->test == null)
                                <td>{{ $datatest->pair }}</td>
                            @else
                                <td title="{{ $datatest->test }}">{{ $datatest->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datatest->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datatest->bw_n }}</td>
                            <td>{{ $datatest->bw_r1 }}</td>
                            <td>{{ $datatest->bw_r2 }}</td>
                            <td>{{ $datatest->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datatest->bl_n }}</td>
                            <td>{{ $datatest->bl_r1 }}</td>
                            <td>{{ $datatest->bl_r2 }}</td>
                            <td>{{ $datatest->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datatest->sw_n }}</td>
                            <td>{{ $datatest->sw_r1 }}</td>
                            <td>{{ $datatest->sw_r2 }}</td>
                            <td>{{ $datatest->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datatest->sl_n }}</td>
                            <td>{{ $datatest->sl_r1 }}</td>
                            <td>{{ $datatest->sl_r2 }}</td>
                            <td>{{ $datatest->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datatest->bw_n / ($datatest->bw_n + $datatest->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datatest->sw_n / ($datatest->sw_n + $datatest->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datatest->id }}" type="button"
                                title="{{$datatest->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                        </tr>
                    @endif

                    @if ($datatest->pair == 'AUDCAD')
                        <tr style="background-color: Whitesmoke">
                            {{-- Par --}}
                            @if ($datatest->test == null)
                                <td>{{ $datatest->pair }}</td>
                            @else
                                <td title="{{ $datatest->test }}">{{ $datatest->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datatest->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datatest->bw_n }}</td>
                            <td>{{ $datatest->bw_r1 }}</td>
                            <td>{{ $datatest->bw_r2 }}</td>
                            <td>{{ $datatest->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datatest->bl_n }}</td>
                            <td>{{ $datatest->bl_r1 }}</td>
                            <td>{{ $datatest->bl_r2 }}</td>
                            <td>{{ $datatest->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datatest->sw_n }}</td>
                            <td>{{ $datatest->sw_r1 }}</td>
                            <td>{{ $datatest->sw_r2 }}</td>
                            <td>{{ $datatest->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datatest->sl_n }}</td>
                            <td>{{ $datatest->sl_r1 }}</td>
                            <td>{{ $datatest->sl_r2 }}</td>
                            <td>{{ $datatest->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datatest->bw_n / ($datatest->bw_n + $datatest->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datatest->sw_n / ($datatest->sw_n + $datatest->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datatest->id }}" type="button"
                                title="{{$datatest->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                                 <script>
                                     document.getElementById('par').style.backgroundColor = "blue";
                                 </script>
                                 @endif --}}


                        </tr>
                    @endif

                    @if ($datatest->pair == 'AUDCHF')
                        <tr style="background-color: Oldlace">
                            {{-- Par --}}
                            @if ($datatest->test == null)
                                <td>{{ $datatest->pair }}</td>
                            @else
                                <td title="{{ $datatest->test }}">{{ $datatest->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datatest->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datatest->bw_n }}</td>
                            <td>{{ $datatest->bw_r1 }}</td>
                            <td>{{ $datatest->bw_r2 }}</td>
                            <td>{{ $datatest->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datatest->bl_n }}</td>
                            <td>{{ $datatest->bl_r1 }}</td>
                            <td>{{ $datatest->bl_r2 }}</td>
                            <td>{{ $datatest->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datatest->sw_n }}</td>
                            <td>{{ $datatest->sw_r1 }}</td>
                            <td>{{ $datatest->sw_r2 }}</td>
                            <td>{{ $datatest->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datatest->sl_n }}</td>
                            <td>{{ $datatest->sl_r1 }}</td>
                            <td>{{ $datatest->sl_r2 }}</td>
                            <td>{{ $datatest->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datatest->bw_n / ($datatest->bw_n + $datatest->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datatest->sw_n / ($datatest->sw_n + $datatest->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif


                            <td><a href="" data-id="{{ $datatest->id }}" type="button"
                                title="{{$datatest->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>

                            {{-- @if ($loop->iteration % 2 == 0)
                                  <script>
                                      document.getElementById('par').style.backgroundColor = "blue";
                                  </script>
                                  @endif --}}


                        </tr>
                    @endif

                    @if ($datatest->pair == 'AUDJPY')
                        <tr style="background-color: Whitesmoke">
                            {{-- Par --}}
                            @if ($datatest->test == null)
                                <td>{{ $datatest->pair }}</td>
                            @else
                                <td title="{{ $datatest->test }}">{{ $datatest->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datatest->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datatest->bw_n }}</td>
                            <td>{{ $datatest->bw_r1 }}</td>
                            <td>{{ $datatest->bw_r2 }}</td>
                            <td>{{ $datatest->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datatest->bl_n }}</td>
                            <td>{{ $datatest->bl_r1 }}</td>
                            <td>{{ $datatest->bl_r2 }}</td>
                            <td>{{ $datatest->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datatest->sw_n }}</td>
                            <td>{{ $datatest->sw_r1 }}</td>
                            <td>{{ $datatest->sw_r2 }}</td>
                            <td>{{ $datatest->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datatest->sl_n }}</td>
                            <td>{{ $datatest->sl_r1 }}</td>
                            <td>{{ $datatest->sl_r2 }}</td>
                            <td>{{ $datatest->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datatest->bw_n / ($datatest->bw_n + $datatest->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datatest->sw_n / ($datatest->sw_n + $datatest->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datatest->id }}" type="button"
                                title="{{$datatest->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                                   <script>
                                       document.getElementById('par').style.backgroundColor = "blue";
                                   </script>
                                   @endif --}}


                        </tr>
                    @endif

                    @if ($datatest->pair == 'NZDCAD')
                        <tr style="background-color: Oldlace">
                            {{-- Par --}}
                            @if ($datatest->test == null)
                                <td>{{ $datatest->pair }}</td>
                            @else
                                <td title="{{ $datatest->test }}">{{ $datatest->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datatest->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datatest->bw_n }}</td>
                            <td>{{ $datatest->bw_r1 }}</td>
                            <td>{{ $datatest->bw_r2 }}</td>
                            <td>{{ $datatest->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datatest->bl_n }}</td>
                            <td>{{ $datatest->bl_r1 }}</td>
                            <td>{{ $datatest->bl_r2 }}</td>
                            <td>{{ $datatest->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datatest->sw_n }}</td>
                            <td>{{ $datatest->sw_r1 }}</td>
                            <td>{{ $datatest->sw_r2 }}</td>
                            <td>{{ $datatest->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datatest->sl_n }}</td>
                            <td>{{ $datatest->sl_r1 }}</td>
                            <td>{{ $datatest->sl_r2 }}</td>
                            <td>{{ $datatest->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datatest->bw_n / ($datatest->bw_n + $datatest->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datatest->sw_n / ($datatest->sw_n + $datatest->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif


                            <td><a href="" data-id="{{ $datatest->id }}" type="button"
                                title="{{$datatest->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>

                            {{-- @if ($loop->iteration % 2 == 0)
                                    <script>
                                        document.getElementById('par').style.backgroundColor = "blue";
                                    </script>
                                    @endif --}}


                        </tr>
                    @endif

                    @if ($datatest->pair == 'NZDCHF')
                        <tr style="background-color: Whitesmoke">
                            {{-- Par --}}
                            @if ($datatest->test == null)
                                <td>{{ $datatest->pair }}</td>
                            @else
                                <td title="{{ $datatest->test }}">{{ $datatest->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datatest->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datatest->bw_n }}</td>
                            <td>{{ $datatest->bw_r1 }}</td>
                            <td>{{ $datatest->bw_r2 }}</td>
                            <td>{{ $datatest->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datatest->bl_n }}</td>
                            <td>{{ $datatest->bl_r1 }}</td>
                            <td>{{ $datatest->bl_r2 }}</td>
                            <td>{{ $datatest->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datatest->sw_n }}</td>
                            <td>{{ $datatest->sw_r1 }}</td>
                            <td>{{ $datatest->sw_r2 }}</td>
                            <td>{{ $datatest->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datatest->sl_n }}</td>
                            <td>{{ $datatest->sl_r1 }}</td>
                            <td>{{ $datatest->sl_r2 }}</td>
                            <td>{{ $datatest->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datatest->bw_n / ($datatest->bw_n + $datatest->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datatest->sw_n / ($datatest->sw_n + $datatest->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datatest->id }}" type="button"
                                title="{{$datatest->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                                     <script>
                                         document.getElementById('par').style.backgroundColor = "blue";
                                     </script>
                                     @endif --}}


                        </tr>
                    @endif


                    @if ($datatest->pair == 'NZDJPY')
                        <tr style="background-color: Oldlace">
                            {{-- Par --}}
                            @if ($datatest->test == null)
                                <td>{{ $datatest->pair }}</td>
                            @else
                                <td title="{{ $datatest->test }}">{{ $datatest->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datatest->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datatest->bw_n }}</td>
                            <td>{{ $datatest->bw_r1 }}</td>
                            <td>{{ $datatest->bw_r2 }}</td>
                            <td>{{ $datatest->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datatest->bl_n }}</td>
                            <td>{{ $datatest->bl_r1 }}</td>
                            <td>{{ $datatest->bl_r2 }}</td>
                            <td>{{ $datatest->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datatest->sw_n }}</td>
                            <td>{{ $datatest->sw_r1 }}</td>
                            <td>{{ $datatest->sw_r2 }}</td>
                            <td>{{ $datatest->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datatest->sl_n }}</td>
                            <td>{{ $datatest->sl_r1 }}</td>
                            <td>{{ $datatest->sl_r2 }}</td>
                            <td>{{ $datatest->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datatest->bw_n / ($datatest->bw_n + $datatest->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datatest->sw_n / ($datatest->sw_n + $datatest->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif


                            <td><a href="" data-id="{{ $datatest->id }}" type="button"
                                title="{{$datatest->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>

                            {{-- @if ($loop->iteration % 2 == 0)
                                      <script>
                                          document.getElementById('par').style.backgroundColor = "blue";
                                      </script>
                                      @endif --}}


                        </tr>
                    @endif

                    @if ($datatest->pair == 'CADCHF')
                        <tr style="background-color: Whitesmoke">
                            {{-- Par --}}
                            @if ($datatest->test == null)
                                <td>{{ $datatest->pair }}</td>
                            @else
                                <td title="{{ $datatest->test }}">{{ $datatest->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datatest->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datatest->bw_n }}</td>
                            <td>{{ $datatest->bw_r1 }}</td>
                            <td>{{ $datatest->bw_r2 }}</td>
                            <td>{{ $datatest->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datatest->bl_n }}</td>
                            <td>{{ $datatest->bl_r1 }}</td>
                            <td>{{ $datatest->bl_r2 }}</td>
                            <td>{{ $datatest->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datatest->sw_n }}</td>
                            <td>{{ $datatest->sw_r1 }}</td>
                            <td>{{ $datatest->sw_r2 }}</td>
                            <td>{{ $datatest->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datatest->sl_n }}</td>
                            <td>{{ $datatest->sl_r1 }}</td>
                            <td>{{ $datatest->sl_r2 }}</td>
                            <td>{{ $datatest->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datatest->bw_n / ($datatest->bw_n + $datatest->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datatest->sw_n / ($datatest->sw_n + $datatest->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif

                            <td><a href="" data-id="{{ $datatest->id }}" type="button"
                                title="{{$datatest->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>


                            {{-- @if ($loop->iteration % 2 == 0)
                                       <script>
                                           document.getElementById('par').style.backgroundColor = "blue";
                                       </script>
                                       @endif --}}


                        </tr>
                    @endif

                    @if ($datatest->pair == 'CADJPY')
                        <tr style="background-color: Oldlace">
                            {{-- Par --}}
                            @if ($datatest->test == null)
                                <td>{{ $datatest->pair }}</td>
                            @else
                                <td title="{{ $datatest->test }}">{{ $datatest->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datatest->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datatest->bw_n }}</td>
                            <td>{{ $datatest->bw_r1 }}</td>
                            <td>{{ $datatest->bw_r2 }}</td>
                            <td>{{ $datatest->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datatest->bl_n }}</td>
                            <td>{{ $datatest->bl_r1 }}</td>
                            <td>{{ $datatest->bl_r2 }}</td>
                            <td>{{ $datatest->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datatest->sw_n }}</td>
                            <td>{{ $datatest->sw_r1 }}</td>
                            <td>{{ $datatest->sw_r2 }}</td>
                            <td>{{ $datatest->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datatest->sl_n }}</td>
                            <td>{{ $datatest->sl_r1 }}</td>
                            <td>{{ $datatest->sl_r2 }}</td>
                            <td>{{ $datatest->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datatest->bw_n / ($datatest->bw_n + $datatest->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datatest->sw_n / ($datatest->sw_n + $datatest->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif


                            <td><a href="" data-id="{{ $datatest->id }}" type="button"
                                title="{{$datatest->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>

                            {{-- @if ($loop->iteration % 2 == 0)
                                        <script>
                                            document.getElementById('par').style.backgroundColor = "blue";
                                        </script>
                                        @endif --}}


                        </tr>
                    @endif

                    @if ($datatest->pair == 'CHFJPY')
                        <tr style="background-color: Whitesmoke">
                            {{-- Par --}}
                            @if ($datatest->test == null)
                                <td>{{ $datatest->pair }}</td>
                            @else
                                <td title="{{ $datatest->test }}">{{ $datatest->pair }}</td>
                            @endif

                            {{-- Value --}}

                            <td>{{ $datatest->value }}</td>

                            {{-- Compras Ganadas --}}

                            <td>{{ $datatest->bw_n }}</td>
                            <td>{{ $datatest->bw_r1 }}</td>
                            <td>{{ $datatest->bw_r2 }}</td>
                            <td>{{ $datatest->bw_r3 }}</td>


                            {{-- Compras Perdidas --}}
                            <td>{{ $datatest->bl_n }}</td>
                            <td>{{ $datatest->bl_r1 }}</td>
                            <td>{{ $datatest->bl_r2 }}</td>
                            <td>{{ $datatest->bl_r3 }}</td>


                            {{-- Ventas Ganadas --}}
                            <td>{{ $datatest->sw_n }}</td>
                            <td>{{ $datatest->sw_r1 }}</td>
                            <td>{{ $datatest->sw_r2 }}</td>
                            <td>{{ $datatest->sw_r3 }}</td>


                            {{-- Ventas Perdidas --}}
                            <td>{{ $datatest->sl_n }}</td>
                            <td>{{ $datatest->sl_r1 }}</td>
                            <td>{{ $datatest->sl_r2 }}</td>
                            <td>{{ $datatest->sl_r3 }}</td>

                            {{-- Eficiencia Compras --}}
                            @php $eficienciaCompras = ($datatest->bw_n / ($datatest->bw_n + $datatest->bl_n))*100 @endphp
                            <td>{{ number_format($eficienciaCompras, 2) }}</td>


                            {{-- Eficiencia Ventas --}}
                            @php $eficienciaVentas = ($datatest->sw_n / ($datatest->sw_n + $datatest->sl_n))*100 @endphp
                            <td>{{ number_format($eficienciaVentas, 2) }}</td>

                            {{-- Mejor Balance --}}
                            @php $mejorBalance = ($eficienciaCompras + $eficienciaVentas) / 2 @endphp
                            @if ($mejorBalance >= 56)
                                <td style="background-color: #3f9d50">{{ number_format($mejorBalance, 2) }}</td>
                            @elseif ($mejorBalance >= 50 && $mejorBalance < 56)
                                <td style="background-color: #F2C94C">{{ number_format($mejorBalance, 2) }}</td>
                            @else
                                <td style="background-color: #ea5651">{{ number_format($mejorBalance, 2) }}</td>
                            @endif


                            <td><a href="" data-id="{{ $datatest->id }}" type="button"
                                title="{{$datatest->id}}" class="btn btn-danger btn-sm btn-icon delete"> <i
                                    class="bi bi-trash"></i></a></td>

                            {{-- @if ($loop->iteration % 2 == 0)
                                         <script>
                                             document.getElementById('par').style.backgroundColor = "blue";
                                         </script>
                                         @endif --}}


                        </tr>
                    @endif
                @elseif ($registros == 0)
                    <tr>
                        <td colspan="20">No hay registros</td>
                    </tr>
                @endif
            @endforeach
        @endif
    </tbody>
</table>

{{-- <div class="text-center">
    <a class="btn principal-button mb-3 new" id="imprimirAnalisis"><i class="bi bi-printer-fill me-1"></i>Imprimir
        PDF</a>
</div> --}}
