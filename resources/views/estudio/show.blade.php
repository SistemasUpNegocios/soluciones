@extends('index')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
@endsection

@section('title') Reporte Eficiencia @endsection

@section('content')
    <div class="pagetitle">
        <h1>Reporte Eficiencia Señal </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Panel de control</a></li>
                <li class="breadcrumb-item active">Reporte Eficiencia</li>
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
                                    <select class="form-select" aria-label="Default select example" id="time_range">
                                       
                                        <option value="15">15 minutos</option>
                                        <option value="60">1 hora</option>
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-floating mb-3 me-3">
                                    <select class="form-select" aria-label="Default select example" id="variant">
                                     @php
                                        $variantes = DB::table('estudio_lista')->get();
                                        foreach ($variantes as $variante) {
                                            echo '<option value="'.$variante->id.'">'.$variante->id .' - '.$variante->nombre.'</option>';
                                        }
                                     @endphp
                                        {{-- <option value="1">Trend</option>
                                        <option value="2">Spectrum</option> --}}
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-floating mb-3 me-3">
                                    <select class="form-select" aria-label="Default select example" id="test">
                                        <option value="sindatos">Sin datos en test</option>
                                        <option value="datos">Datos en test</option>
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <button class="btn btn-primary mb-3" id="obtenerRegistros">Generar información</button>
                            </div>
                        </div>
                        <div id="contTable" style="overflow-x: auto;"></div>
                        <!--<div class="col-12 mt-5">-->
                        <!--    <div id="chartdiv"></div>-->
                        <!--</div>-->
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

    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="{{ asset('/js/estudio.js') }}"></script>
@endsection