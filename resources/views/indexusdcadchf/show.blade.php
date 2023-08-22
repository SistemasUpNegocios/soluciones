@extends('index')

@section('css')
<style>
    #indexUSDCADCHF {
        width: 100%;
        height: 500px;
    }
</style>
@endsection

@section('title') INDEX USDCADCHF @endsection

@section('content')
    <div class="pagetitle">
        <h1>INDEX USDCADCHF</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Panel de control</a></li>
                <li class="breadcrumb-item active">INDEX USDCADCHF</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <form class="row d-flex align-items-center" id="fechasForm">
                            <div class="col-md-4 col-12">
                                <div class="form-floating mb-3 me-3">
                                    <input type="datetime-local" class="form-control" id="fechaDesdeInput" required>
                                    <label for="fechaDesdeInput">A partir de:</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-floating mb-3 me-3">
                                    <input type="datetime-local" class="form-control" id="fechaEjeInput" required>
                                    <label for="fechaEjeInput">Eje:</label>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <button class="btn btn-primary mb-3">Generar informaci贸n</button>
                            </div>
                        </form>
                        <div id="indexUSDCADCHF"></div>
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
    <script src="{{ asset('/js/indexusdcadchf.js') }}"></script>
@endsection