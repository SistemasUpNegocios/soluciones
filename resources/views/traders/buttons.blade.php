@foreach ($traders as $trader)
    @php
        if ($trader->modificable == "activado"){
            $clase_modificable = "btn-primary";
            $icono_modificable = "bi bi-unlock-fill";
            $disabled = "";
        }else{
            $clase_modificable = "btn-warning";
            $icono_modificable = "bi bi-lock-fill";
            $disabled = "disabled";
        }

        if ($trader->activado == "activado"){
            $clase_activado = "btn-success";
            $icono_activado = "bi bi-check-lg";
        }else{
            $clase_activado = "btn-danger";
            $icono_activado = "bi bi-x-lg";
        }

        if ($trader->sl == "activado"){
            $clase_sl = "btn-success";
            $icono_sl = "bi bi-check-lg";
        }else{
            $clase_sl = "btn-danger";
            $icono_sl = "bi bi-x-lg";
        }

        if ($trader->tp == "activado"){
            $clase_tp = "btn-success";
            $icono_tp = "bi bi-check-lg";
        }else{
            $clase_tp = "btn-danger";
            $icono_tp = "bi bi-x-lg";
        }
    @endphp

    <div class="row">
        <div class="pagetitle d-flex align-items-center">
            <h1>{{ $trader->nombre }}</h1>
            <div class="ms-5">
                @if ($trader->cleo == true)                                        
                    <button class="btn btn-success">Cleo vivo <i class="bi bi-emoji-smile"></i></button>
                @else
                    <button class="btn btn-danger">Cleo apagado <i class="bi bi-emoji-frown"></i></button>                                        
                @endif
            </div>
        </div>
        <hr class="m-0 p-0 mb-2">
    </div>
    <div class="row mb-5">
        <div class="col-3 text-center">
            <div class="mb-1">Modificable</div>
            <button class="btn {{ $clase_modificable }} editarStatusMod" style="width: 33%;" data-id="{{ $trader->id }}">
                <i class="{{ $icono_modificable }}"></i>
            </button>
        </div>
        <div class="col-3 text-center">
            <div class="mb-1">Activado</div>
            <button class="btn {{ $clase_activado }} editarStatusAct" style="width: 33%;" data-id="{{ $trader->id }}" {{ $disabled }}>
                <i class="{{ $icono_activado }}"></i>
            </button>
        </div>
        <div class="col-3 text-center">
            <div class="mb-1">SL</div>
            <button class="btn {{ $clase_sl }} editarStatusSL" style="width: 33%;" data-id="{{ $trader->id }}" {{ $disabled }}>
                <i class="{{ $icono_sl }}"></i>
            </button>
        </div>
        <div class="col-3 text-center">
            <div class="mb-1">TP</div>
            <button class="btn {{ $clase_tp }} editarStatusTP" style="width: 33%;" data-id="{{ $trader->id }}" {{ $disabled }}>
                <i class="{{ $icono_tp }}"></i>
            </button>
        </div>
    </div>
@endforeach