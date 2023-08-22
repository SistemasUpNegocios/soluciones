@extends('index')

@section('css')
@endsection

@section('title') Traders @endsection

@section('content')
<div class="pagetitle">
    <h1>Traders</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Panel de control</a></li>
            <li class="breadcrumb-item active">Traders</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <a class="btn principal-button mb-3 new me-1" data-bs-toggle="modal" data-bs-target="#formModal"> <i class="bi-plus-lg me-1"> </i>Añadir un nuevo trader</a>
                <div class="card-body mt-3" id="contBotones">
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
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Añadir trader</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="traderForm" method="post">
                    @csrf
                    <input type="hidden" name="id" id="idInput">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" placeholder="Ingresa el número de trader" id="numeroInput" name="numero" required>
                                <label for="numeroInput">Número de trader</label>
                            </div>
                        </div>
                    </div>
                    <div id="alertMessage"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="btnCancel" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn principal-button" id="btnSubmit">Añadir trader</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('/js/traders.js') }}"></script>
@endsection