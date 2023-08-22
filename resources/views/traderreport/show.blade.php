@extends('index')

@section('css')
<script src="https://kit.fontawesome.com/ab4fa16bfb.js" crossorigin="anonymous"></script>
<style>
    #chartdivBalance,
    #chartdivEquity,
    #chartdivMargen,
    #chartdivRisk,
    #chartdivProfit,
    #chartdivRatio {
        width: 100%;
        height: 500px;
        max-width: 100%
    }
</style>
@endsection

@section('title')
Trader Report
@endsection

@section('content')
<div class="pagetitle d-flex justify-content-between">
    <div>
        <h1>Trader report</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Panel de control</a></li>
                <li class="breadcrumb-item">Trader report</li>
            </ol>
        </nav>
    </div>
</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card pb-0">
                <div class="card-body" style="padding-top: 20px;">
                    <div class="row d-flex align-items-center">
                        <div class="pagetitle d-flex justify-content-between align-items-center">
                            <h1 id="numeroTrader"></h1>
                        </div>
                        <div class="cont-form">
                            <h3 class="mt-2">Ver datos históricos</h3>
                            <div class="row">
                                <input type="hidden" name="id" id="idInput">
                                <div class="col-md-6 col-12">
                                    <div class="form-floating mb-3">
                                        <input type="datetime-local" class="form-control"
                                            placeholder="Ingresa la fecha de inicio" id="fromInput" name="from"
                                            required>
                                        <label for="fromInput">Desde</label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-floating mb-3">
                                        <input type="datetime-local" class="form-control"
                                            placeholder="Ingresa la fecha de fin" id="toInput" name="to" required>
                                        <label for="toInput">Hasta</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn principal-button" id="filtrar">Filtrar resultados</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="mt-3 p-0 mb-2">
                    <div class="row mt-3">
                        <div class="col-md-6 col-12">
                            <h1 class="mb-0 pb-0 text-center fs-5">Balance</h1>
                            <div id="chartdivBalance"></div>
                        </div>
                        <div class="col-md-6 col-12">
                            <h1 class="mb-0 pb-0 text-center fs-5">Equity</h1>
                            <div id="chartdivEquity"></div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-6 col-12">
                            <h1 class="mb-0 pb-0 text-center fs-5">Margin</h1>
                            <div id="chartdivMargen"></div>
                        </div>
                        <div class="col-md-6 col-12">
                            <h1 class="mb-0 pb-0 text-center fs-5">Risk</h1>
                            <div id="chartdivRisk"></div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-6 col-12">
                            <h1 class="mb-0 pb-0 text-center fs-5">Profit</h1>
                            <div id="chartdivProfit"></div>
                        </div>
                        <div class="col-md-6 col-12">
                            <h1 class="mb-0 pb-0 text-center fs-5">Ratio</h1>
                            <div id="chartdivRatio"></div>
                        </div>
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
<script src="{{ asset('js/traderreport.js') }}"></script>
@endsection