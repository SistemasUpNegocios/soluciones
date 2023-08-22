@php
$operacionMadre = DB::table("operacion")
->where("no_operacion", "=", $operacion_id)
->get();

$operacionHijaMadre = DB::table('operacion_hija')
->join('operacion', 'operacion.no_operacion', '=', 'operacion_hija.operacion_id')
->select(DB::raw("operacion.id AS idMadre, operacion.no_operacion AS no_operacionMadre, operacion.status AS statusMadre"))
->where("operacion.no_operacion", "=", $operacion_id)
->first();

$fechaOperacion = Carbon\Carbon::createFromDate($fecha);

$fecha_limite = strtotime("2022-08-15 11:58:38");
$fecha_operacion = strtotime($fechaOperacion);

@endphp


@if ($operacionMadre->isEmpty())

        @if ($fecha_operacion > $fecha_limite)
                @if ($operacion_id == 0 && $status == "abierta")
                <span class="badge bg-danger">Operación fix abierta ({{ $operacion_id }})</span>
                @elseif ($operacion_id == 0 && $status == "cerrada")
                <span class="badge l-bg-middle">Operación fix cerrada ({{ $operacion_id }})</span>
                @elseif ($operacion_id > 0 && $status == "abierta")
                <a href="#" class="cierre" data-operacion="{{ $no_operacion }}" data-trader="{{ $trader_id }}"><span class="badge bg-danger">Huérfana, madre sin registros {{ $operacion_id }}</span></a>
                @elseif ($operacion_id > 0 && $status == "cerrada")
                <span class="badge bg-success">Operación madre {{ $operacion_id }}</span>
                @endif
        @else
                <span class="badge l-bg-middle">Operación en conflicto ({{ $operacion_id }})</span>
        @endif
    

@else

    @if ($operacion_id == 0 && $status == "abierta")
            <span class="badge bg-danger">Operación fix abierta ({{ $operacion_id }})</span>
    @elseif ($operacion_id == 0 && $status == "cerrada")
            <span class="badge l-bg-middle">Operación fix cerrada ({{ $operacion_id }})</span>        
    @elseif ($operacion_id > 0)
            @if ($status == "abierta" && $operacionHijaMadre->statusMadre == "cerrada")
                <a href="#" class="cierre" data-operacion="{{ $no_operacion }}" data-trader="{{ $trader_id }}"><span class="badge bg-danger">Huérfana, madre: {{ $operacion_id }}</span></a>
            @else
                <span class="badge bg-success">Operación madre {{ $operacion_id }}</span>
            @endif
    @endif

@endif