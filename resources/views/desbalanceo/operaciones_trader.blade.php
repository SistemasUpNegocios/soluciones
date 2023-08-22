@php
    $operacion_trader = DB::table('operacion')
                    ->where('status', 'abierta')
                    ->where('trader_id', $traderIDMadre)
                    ->count();
@endphp

{{ $operacion_trader }}