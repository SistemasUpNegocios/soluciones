@extends('index')

@section('css')
    <style>
        #indexUSD {
            width: 100%;
            height: 500px;
        }
    </style>
@endsection

@section('title')
    Fundamentales
@endsection

@section('content')
    <div class="pagetitle">
        <h1>FUNDAMENTALES</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Panel de control</a></li>
                <li class="breadcrumb-item active">Fundamentales</li>
            </ol>
        </nav>
    </div>

    <section class="section">

        <div class="text-center">



            <iframe
                src="https://sslecal2.investing.com?columns=exc_flags,exc_currency,exc_importance,exc_actual,exc_forecast,exc_previous&category=_employment,_economicActivity,_inflation,_credit,_centralBanks,_confidenceIndex,_balance,_Bonds&importance=1,2,3&features=datepicker,timezone,timeselector,filters&countries=25,6,5,72,35,7,43,4,12&calType=week&timeZone=40&lang=49"
                width="880" height="480" frameborder="0" allowtransparency="true" marginwidth="0" marginheight="0">

            </iframe>
            <div class="poweredBy" style="font-family: Arial, Helvetica, sans-serif;">
                <span style="font-size: 11px;color: #333333;text-decoration: none;">Calendario económico en vivo cortesía de
                    <a href="https://mx.investing.com/" rel="nofollow" target="_blank"
                        style="font-size: 11px;color: #06529D; font-weight: bold;" class="underline_link">Investing.com
                        México</a></span>
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
@endsection
