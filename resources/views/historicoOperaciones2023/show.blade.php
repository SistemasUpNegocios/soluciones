@extends('index')



@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">



    <style>
        #logs td,

        #logs th {

            width: auto !important;

            white-space: normal !important;

            text-overflow: ellipsis !important;

            overflow: hidden !important;

        }
    </style>
@endsection



@section('title')
    Historico Operaciones
@endsection



@section('content')
    <div class="pagetitle">

        <h1>Historicos Operaciones</h1>

        <nav>

            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Panel de control</a></li>

                <li class="breadcrumb-item active">Historico Operaciones</li>

            </ol>

        </nav>

    </div>



    <section class="section">

        <div class="row">

            <div class="col-lg-12">

                <div class="card">

                    <div class="card-body mt-3">

                        <div class="row">

                            <div class="col-md-4 col-12">

                                <div class="form-floating mb-3 me-3">

                                    <input type="datetime-local" class="form-control" id="fechaInicioInput" required>

                                    <label for="fechaInicioInput">A partir de:</label>

                                </div>

                            </div>

                            <div class="col-md-4 col-12">

                                <div class="form-floating mb-3 me-3">

                                    <input type="datetime-local" class="form-control" id="fechaFinInput" required>

                                    <label for="fechaFinInput">Hasta:</label>

                                </div>

                            </div>

                        </div>

                        <div class="mt-4" style=" overflow-x: auto;">

                            <table class="table table-striped table-bordered nowrap text-center"
                                style="width: 100%; font-size: 14px !important; vertical-align: middle !important;"
                                id="historicos">

                                <thead style="vertical-align: middle !important;">

                                    <tr>

                                        {{-- <th data-priority="0" scope="col">ID</th> --}}

                                        {{-- <th data-priority="0" scope="col">Trader ID</th> --}}

                                        <th data-priority="0" scope="col">Order Number</th>

                                        <th data-priority="0" scope="col">Time Open</th>

                                        <th data-priority="0" scope="col">Type</th>

                                        <th data-priority="0" scope="col">Volume</th>

                                        <th data-priority="0" scope="col">Symbol</th>

                                        <th data-priority="0" scope="col">Price Open</th>

                                        <th data-priority="0" scope="col">SL</th>

                                        <th data-priority="0" scope="col">TP</th>

                                        <th data-priority="0" scope="col">Time Close</th>

                                        <th data-priority="0" scope="col">Price Close</th>

                                        <th data-priority="0" scope="col">Commision</th>

                                        <th data-priority="0" scope="col">Swap</th>

                                        <th data-priority="0" scope="col">Profit</th>

                                        <th data-priority="0" scope="col">Comment</th>

                                    </tr>

                                </thead>

                                <tbody>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="text-center">

            <button class="btn btn-primary text-center" id="imprimirHistoricos">Imprimir PDF</button>

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>

    <script src="{{ asset('/js/historicoOperaciones2023.js') }}"></script>
@endsection
