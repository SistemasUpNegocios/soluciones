@extends('index')

@section('title', 'Autorización S8A')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
@endsection

@section('content')

@php

$auth = DB::table('autorizacion_s8a')
->select('status')
->get();



@endphp

    <div class="pagetitle">
        <h1>Autorización S8A</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Vista general</a></li>
                <li class="breadcrumb-item active">Autorización S8A</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-3 col-12">
                                <div class="form-floating mb-3 me-3">
                                    <input type="number" class="form-control" id="inputTerminal">
                                    <label for="inputTerminal">Terminal</label>
                                </div>
                            </div>
                            
                            <div class="col-md-3 col-12" style="display: none">
                                <div class="form-floating mb-3 me-3">
                                    <div class="form-floating mb-3 me-3">
                                        <input type="number" class="form-control" id="inputPIP">
                                        <label for="inputPIP">Valor PIP</label>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-floating mb-3 me-3">
                                    @if ($auth[0]->status == "activado")
                                    <button type="button" class="btn btn-success statusOp" data-status="{{$auth[0]->status}}" value="{{$auth[0]->status}}">Activado</button>
                                    @elseif ($auth[0]->status == "desactivado")
                                    <button type="button" class="btn btn-danger statusOp" data-status="{{$auth[0]->status}}" value="{{$auth[0]->status}}">Desactivado</button>
                                    @endif

                                </div>
                            </div>

                            <div class="col-md-3 col-12">
                                <div class="form-floating mb-3 me-3">
                                    <button type="button" class="btn btn-dark" id="obtenerRegistros">Mostrar datos</button>
                                </div>
                            </div>
                            {{-- <div class="col-md-3 col-12">
                                <button class="btn btn-primary mb-3" id="obtenerRegistros">Generar información</button>
                            </div> --}}
                        </div>
                        <div id="contTablaAut" style="overflow-x: auto;"></div>
                      
                    </div>
                </div>

            </div>

        </div>


    </section>
 
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
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="{{ asset('js/autorizacion.js') }}"></script>
@endsection