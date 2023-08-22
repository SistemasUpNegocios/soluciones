@php
    $operacionMAMFix = DB::table('operacion_hija')
                        ->where('status', 'abierta')
                        ->where('no_operacion', $no_operacionFix)
                        ->where('trader_id', 99999)
                        ->count();
@endphp

{{ $operacionMAMFix }}