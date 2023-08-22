@php
    $operacionTRADERFix = DB::table('operacion')
                        ->where('status', 'abierta')
                        ->count();
@endphp

{{ $operacionTRADERFix }}