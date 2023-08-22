@extends('index')

@section('title') Cleo Data @endsection

@section('css')
<script src="https://kit.fontawesome.com/ab4fa16bfb.js" crossorigin="anonymous"></script>
<style>
    #velocimetro1 {
        width: 100%;
        height: 500px;
    }
    #velocimetro2 {
        width: 100%;
        height: 500px;
    }
    #velocimetro3 {
        width: 100%;
        height: 500px;
    }
</style>
@endsection

@section('content')
<div class="pagetitle d-flex justify-content-between">
    <div>
        <h1>Cleo Data</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Panel de control</a></li>
                <li class="breadcrumb-item">Cleo Data</li>
            </ol>
        </nav>
    </div>
</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card pb-0">
                <div class="card-body" style="padding-top: 20px;">
                    <div class="row justify-content-center" id="datosNueovos">
                        <div class="pagetitle d-flex justify-content-between align-items-center">
                            <h1>{{$par}}</h1>
                            <span id="ultimaHora">
                                Última actualización: {{ ucfirst(Carbon\Carbon::parse($fecha)->diffForHumans()) }}
                            </span>
                        </div>
                        <hr class="m-0 p-0 mb-2">
                        
                    </div>
                    <div class="row" style="margin-top: -8rem">
                        <div class="col-md-4 col-12"><div id="velocimetro1"></div></div>
                        <div class="col-md-4 col-12"><div id="velocimetro2"></div></div>
                        <div class="col-md-4 col-12"><div id="velocimetro3"></div></div>
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
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
<script src="{{ asset('js/velocimetros.js') }}"></script>
@endsection