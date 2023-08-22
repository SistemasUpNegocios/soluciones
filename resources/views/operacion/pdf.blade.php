@extends('operacion.imprimir')

@section('title', 'Operaciones Huérfanas')

@section('content')
<img class="imgUP_superior" src="{{ public_path('img/logo_sup.png') }}" alt="Logo uptrading">

<img class="imgUP_centro" src="{{ public_path('img/logo_centro.png') }}" alt="">

<img class="imgUP_inferior" src="{{ public_path('img/logo_latam.png') }}" alt="Logo uptrading">

<div class="contenedor_imprimir_contrato">

    
    <div class="contenedor_tabla mt-4">
      @if (empty($huerfanasVacias) && empty($huerfanas))
        <p class="mb-2 text-center" style="font-weight: bold; text-transform: uppercase; color: #000;">
          No hay operaciones huérfanas
        </p>
      @else        
        @if (!empty($huerfanasVacias))
            <p class="mb-2 text-center" style="font-weight: bold; text-transform: uppercase; color: #000;">
                Operaciones huérfanas sin madre registrada
            </p>
            <table class="tabla_reverso table table-sm mb-3">
              <thead>
                <tr>
                    <th data-priority="0" scope="col"># de operación</th>
                    <th data-priority="0" scope="col">Status</th>
                    <th data-priority="0" scope="col">Trader</th>
                    <th data-priority="0" scope="col">Último registro</th>
                    <th data-priority="0" scope="col">Operación madre</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($huerfanasVacias as $huerfanaVacia)
                    <tr>
                        <td>{{ $huerfanaVacia->no_operacion }}</td>
                        <td>{{ $huerfanaVacia->status }}</td>
                        <td>{{ $huerfanaVacia->nombreTrader }}</td>
                        <td>{{ $huerfanaVacia->fecha }} ({{ ucfirst(\Carbon\Carbon::parse($huerfanaVacia->fecha)->diffForHumans()) }})</td>
                        <td>{{ $huerfanaVacia->operacion_id }}</td>
                    </tr>
                @endforeach
              </tbody>
            </table>
        @endif

        @if (!empty($huerfanas))
            <p class="mb-2 text-center mt-4" style="font-weight: bold; text-transform: uppercase; color: #000;">
                Operaciones huérfanas
            </p>
            <table class="tabla_reverso table table-sm">
              <thead>
                <tr>
                    <th data-priority="0" scope="col"># de operación</th>
                    <th data-priority="0" scope="col">Status</th>
                    <th data-priority="0" scope="col">Trader</th>
                    <th data-priority="0" scope="col">Último registro</th>
                    <th data-priority="0" scope="col">Operación madre</th>
                    <th data-priority="0" scope="col">Trader madre</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($huerfanas as $huerfana)
                    <tr>
                      <td>{{ $huerfana->no_operacion }}</td>
                      <td>{{ $huerfana->status }}</td>
                      <td>{{ $huerfana->nombreTrader }}</td>
                      <td>{{ $huerfana->fecha }} ({{ ucfirst(\Carbon\Carbon::parse($huerfana->fecha)->diffForHumans()) }})</td>
                      <td>{{ $huerfana->operacion_id }}</td>
                      <td>{{ $huerfana->nombreTraderMadre }}</td>
                    </tr>
                @endforeach
              </tbody>
            </table>
        @endif
      @endif
    </div>
</div>

<img class="imgUP_superior" src="{{ public_path('img/logo_sup.png') }}" alt="Logo uptrading">
<img class="imgUP_centro" src="{{ public_path('img/logo_centro.png') }}" alt="">
<img class="imgUP_inferior" src="{{ public_path('img/logo_latam.png') }}" alt="Logo uptrading">
@endsection