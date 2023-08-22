@php
    $operacionMAM = DB::table('operacion_hija')
                    ->join('operacion', 'operacion.no_operacion', '=', 'operacion_hija.operacion_id')
                    ->where('operacion_hija.status', 'abierta')
                    ->where('operacion_hija.trader_id', 99999)
                    ->where('operacion.trader_id', $traderIDMadre)
                    ->count();
@endphp

{{ $operacionMAM }}