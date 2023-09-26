@extends('index')



@section('css')
    <link href="https://canvasjs.com/assets/css/jquery-ui.1.11.2.min.css" rel="stylesheet" />



    <style>
        #chartdiv {

            width: 100%;

            height: 500px;

            max-width: 100%
        }
    </style>
@endsection



@section('title')
    Gráfica Portafolios
@endsection



@section('content')
    <div class="pagetitle">

        <h1>Gráfica Portafolios</h1>

        <nav>

            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Panel de control</a></li>

                <li class="breadcrumb-item active">Gráfica Portafolios</li>

            </ol>

        </nav>

    </div>





    <section class="section dashboard">

        <div class="row">

            <div class="col-12">

                <div class="card pb-0">

                    <div class="card-body" style="padding-top: 20px;">



                        <div class="row d-flex align-items-center">



                            <div class="col-md-2 col-12">

                                <div class="form-floating mb-3 me-3">

                                    <select class="form-select" aria-label="Default select example" id="portafolioGraph">

                                        @php
                                            
                                            // $chartData = DB::table('portafolios')
                                            
                                            //     ->select('value')
                                            
                                            //     ->where('value', '=', '202301')
                                            //     ->where('value', '=', '202302')
                                            //     ->where('value', '=', '202303')
                                            //     ->where('value', '=', '202304')
                                            
                                            //     ->get();
                                            
                                        @endphp

                                        {{-- @foreach ($chartData as $data)
                                            <option value="{{ $data->value }}">{{ $data->value }}</option>
                                        @endforeach --}}
                                        <option value="202301">202301</option>
                                        <option value="202302">202302</option>
                                        <option value="202303">202303</option>
                                        <option value="202304">202304</option>
                                    </select>

                                    <label for="portafolioGraph">Portafolio</label>

                                </div>

                            </div>

                            <div class="col-md-2 col-12">

                                <button class="btn btn-primary mb-3" id="obtenerRegistros">Generar información</button>

                            </div>

                        </div>











                        <div id="chartdiv"></div>





                    </div>

                </div>

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
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>

    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>

    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js"></script>

    <script src="{{ asset('js/portafolioGraph2023.js') }}"></script>
@endsection
