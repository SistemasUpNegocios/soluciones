@extends('index')

@section('title', 'Equity')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
@endsection

@section('content')
    <style>
        button {
            margin: 5px 5px 5px 5px;
            width: 8rem;
        }
    </style>
    <div class="pagetitle">
        <h1>Equity</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Vista general</a></li>
                <li class="breadcrumb-item active">Equity</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body mt-3" id="contBotonesSwitcher">
                        <div class="row justify-content-center">
                            <div class="col-md-12 col-12 text-center">




                                @foreach ($switchers as $switcher)
                                    @php
                                        if ($switcher->status_usd == 'activado') {
                                            $clase_modificable1 = 'bi-lock-fill';
                                        } else {
                                            $clase_modificable1 = 'bi-unlock-fill';
                                        }
                                        
                                        if ($switcher->status_eur == 'activado') {
                                            $clase_modificable2 = 'bi-lock-fill';
                                        } else {
                                            $clase_modificable2 = 'bi-unlock-fill';
                                        }
                                        
                                        if ($switcher->status_gbp == 'activado') {
                                            $clase_modificable3 = 'bi-lock-fill';
                                        } else {
                                            $clase_modificable3 = 'bi-unlock-fill';
                                        }
                                        
                                        if ($switcher->status_aud == 'activado') {
                                            $clase_modificable4 = 'bi-lock-fill';
                                        } else {
                                            $clase_modificable4 = 'bi-unlock-fill';
                                        }
                                        
                                        if ($switcher->status_nzd == 'activado') {
                                            $clase_modificable5 = 'bi-lock-fill';
                                        } else {
                                            $clase_modificable5 = 'bi-unlock-fill';
                                        }
                                        
                                        if ($switcher->status_cad == 'activado') {
                                            $clase_modificable6 = 'bi-lock-fill';
                                        } else {
                                            $clase_modificable6 = 'bi-unlock-fill';
                                        }
                                        
                                        if ($switcher->status_chf == 'activado') {
                                            $clase_modificable7 = 'bi-lock-fill';
                                        } else {
                                            $clase_modificable7 = 'bi-unlock-fill';
                                        }
                                        
                                        if ($switcher->status_jpy == 'activado') {
                                            $clase_modificable8 = 'bi-lock-fill';
                                        } else {
                                            $clase_modificable8 = 'bi-unlock-fill';
                                        }
                                        
                                        $clase = 'btn-success';
                                        
                                    @endphp
                                    <div class="table-responsive">
                                        <table class="table">

                                            <tbody>

                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        @php
                                                            $sumausd = $switcher->usdchf + $switcher->usdjpy + $switcher->usdcad;
                                                        @endphp
                                                        {{ $sumausd }}
                                                    </td>

                                                    <td>
                                                        @php
                                                            $sumaeur = $switcher->eurusd + $switcher->eurgbp + $switcher->euraud + $switcher->eurnzd + $switcher->eurcad + $switcher->eurchf + $switcher->eurjpy;
                                                        @endphp
                                                        {{ $sumaeur }}
                                                    </td>

                                                    <td>
                                                        @php
                                                            $sumagbp = $switcher->gbpusd + $switcher->gbpaud + $switcher->gbpnzd + $switcher->gbpcad + $switcher->gbpchf + $switcher->gbpjpy;
                                                        @endphp
                                                        {{ $sumagbp }}
                                                    </td>

                                                    <td>@php
                                                        $sumaaud = $switcher->audusd + $switcher->audnzd + $switcher->audcad + $switcher->audchf + $switcher->audjpy;
                                                    @endphp
                                                        {{ $sumaaud }}</td>

                                                    <td>@php
                                                        $sumanzd = $switcher->nzdusd + $switcher->nzdcad + $switcher->nzdchf + $switcher->nzdjpy;
                                                    @endphp
                                                        {{ $sumanzd }}</td>

                                                    <td>@php
                                                        $sumacad = $switcher->cadchf + $switcher->cadjpy;
                                                    @endphp
                                                        {{ $sumacad }}</td>

                                                    <td>@php
                                                        $sumachf = $switcher->chfjpy;
                                                    @endphp
                                                        {{ $sumachf }}</td>

                                                    <td>@php
                                                        
                                                    @endphp
                                                        0</td>
                                                </tr>

                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td><button id="botonUSDH" class="btn btn-dark m-2 "
                                                            data-id="{{ $switcher->id }}">USD <i
                                                                class="bi {{ $clase_modificable1 }} m-1"
                                                                id="USDH"></i></button></td>
                                                    <td><button id="botonEURH" class="btn btn-dark m-2"
                                                            data-id="{{ $switcher->id }}">EUR <i
                                                                class="bi {{ $clase_modificable2 }} m-1"
                                                                id="EURH"></i></button></td>
                                                    <td><button id="botonGBPH" class="btn btn-dark m-2"
                                                            data-id="{{ $switcher->id }}">GBP <i
                                                                class="bi {{ $clase_modificable3 }} m-1"
                                                                id="GBPH"></i></button></td>
                                                    <td><button id="botonAUDH" class="btn btn-dark m-2"
                                                            data-id="{{ $switcher->id }}">AUD <i
                                                                class="bi {{ $clase_modificable4 }} m-1"
                                                                id="AUDH"></i></button></td>
                                                    <td><button id="botonNZDH" class="btn btn-dark m-2"
                                                            data-id="{{ $switcher->id }}">NZD <i
                                                                class="bi {{ $clase_modificable5 }} m-1"
                                                                id="NZDH"></i></button></td>
                                                    <td><button id="botonCADH" class="btn btn-dark m-2"
                                                            data-id="{{ $switcher->id }}">CAD <i
                                                                class="bi {{ $clase_modificable6 }} m-1"
                                                                id="CADH"></i></button></td>
                                                    <td><button id="botonCHFH" class="btn btn-dark m-2"
                                                            data-id="{{ $switcher->id }}">CHF <i
                                                                class="bi {{ $clase_modificable7 }} m-1"
                                                                id="CHFH"></i></button></td>
                                                    <td><button id="botonJPYH" class="btn btn-dark m-2"
                                                            data-id="{{ $switcher->id }}">JPY <i
                                                                class="bi {{ $clase_modificable8 }} m-1"
                                                                id="JPYH"></i></button></td>
                                                </tr>

                                                <tr>
                                                    <td> @php
                                                        $sumausdv = $switcher->eurusd + $switcher->gbpusd + $switcher->audusd + $switcher->nzdusd;
                                                    @endphp
                                                        {{ $sumausdv }}</td>
                                                    <td><button id="botonUSDV" class="btn btn-light m-2">USD</button></td>
                                                    <td></td>
                                                    <td><button id="boton1"
                                                            class="btn {{ $switcher->eurusd > 0 ? $clase : ($switcher->eurusd < 0 ? 'btn-danger' : 'btn-light') }}  m-2">{{ $switcher->eurusd }}</button>
                                                    </td>
                                                    <td><button id="boton2"
                                                            class="btn {{ $switcher->gbpusd > 0 ? $clase : ($switcher->gbpusd < 0 ? 'btn-danger' : 'btn-light') }}  m-2">{{ $switcher->gbpusd }}</button>
                                                    </td>
                                                    <td><button id="boton3"
                                                            class="btn {{ $switcher->audusd > 0 ? $clase : ($switcher->audusd < 0 ? 'btn-danger' : 'btn-light') }}  m-2">{{ $switcher->audusd }}</button>
                                                    </td>
                                                    <td><button id="boton4"
                                                            class="btn {{ $switcher->nzdusd > 0 ? $clase : ($switcher->nzdusd < 0 ? 'btn-danger' : 'btn-light') }}  m-2">{{ $switcher->nzdusd }}</button>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>

                                                </tr>

                                                <tr>
                                                    <td>0</td>
                                                    <td><button id="botonEURV" class="btn btn-light m-2">EUR</button></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td>@php
                                                        $sumagbpv = $switcher->eurgbp;
                                                    @endphp
                                                        {{ $sumagbpv }}</td>
                                                    <td><button id="botonGBPV" class="btn btn-light m-2">GBP</button></td>
                                                    <td></td>
                                                    <td><button id="boton5"
                                                            class="btn {{ $switcher->eurgbp > 0 ? $clase : ($switcher->eurgbp < 0 ? 'btn-danger' : 'btn-light') }}  m-2">{{ $switcher->eurgbp }}</button>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>

                                                </tr>

                                                <tr>
                                                    <td>@php
                                                        $sumaaudv = $switcher->euraud + $switcher->gbpaud;
                                                    @endphp
                                                        {{ $sumaaudv }}</td>
                                                    <td><button id="botonAUDV" class="btn btn-light m-2">AUD</button></td>
                                                    <td></td>
                                                    <td><button id="boton6"
                                                            class="btn {{ $switcher->euraud > 0 ? $clase : ($switcher->euraud < 0 ? 'btn-danger' : 'btn-light') }}  m-2">{{ $switcher->euraud }}</button>
                                                    </td>
                                                    <td><button id="boton7"
                                                            class="btn {{ $switcher->gbpaud > 0 ? $clase : ($switcher->gbpaud < 0 ? 'btn-danger' : 'btn-light') }}  m-2">{{ $switcher->gbpaud }}</button>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>

                                                </tr>

                                                <tr>
                                                    <td>@php
                                                        $sumanzdv = $switcher->eurnzd + $switcher->gbpnzd + $switcher->audnzd;
                                                    @endphp
                                                        {{ $sumanzdv }}</td>
                                                    <td><button id="botonNZDV" class="btn btn-light m-2">NZD</button></td>
                                                    <td></td>
                                                    <td><button id="boton8"
                                                            class="btn {{ $switcher->eurnzd > 0 ? $clase : ($switcher->eurnzd < 0 ? 'btn-danger' : 'btn-light') }}  m-2">{{ $switcher->eurnzd }}</button>
                                                    </td>
                                                    <td><button id="boton9"
                                                            class="btn {{ $switcher->gbpnzd > 0 ? $clase : ($switcher->gbpnzd < 0 ? 'btn-danger' : 'btn-light') }}  m-2">{{ $switcher->gbpnzd }}</button>
                                                    </td>
                                                    <td><button id="boton10"
                                                            class="btn {{ $switcher->audnzd > 0 ? $clase : ($switcher->audnzd < 0 ? 'btn-danger' : 'btn-light') }}  m-2">{{ $switcher->audnzd }}</button>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>

                                                </tr>

                                                <tr>
                                                    <td>@php
                                                        $sumacadv = $switcher->usdcad + $switcher->eurcad + $switcher->gbpcad + $switcher->audcad + $switcher->nzdcad;
                                                    @endphp
                                                        {{ $sumacadv }}</td>
                                                    <td><button id="botonCADV" class="btn btn-light m-2">CAD</button></td>
                                                    <td><button id="boton11"
                                                            class="btn {{ $switcher->usdcad > 0 ? $clase : ($switcher->usdcad < 0 ? 'btn-danger' : 'btn-light') }}  m-2">{{ $switcher->usdcad }}</button>
                                                    </td>
                                                    <td><button id="boton12"
                                                            class="btn {{ $switcher->eurcad > 0 ? $clase : ($switcher->eurcad < 0 ? 'btn-danger' : 'btn-light') }}  m-2">{{ $switcher->eurcad }}</button>
                                                    </td>
                                                    <td><button id="boton13"
                                                            class="btn {{ $switcher->gbpcad > 0 ? $clase : ($switcher->gbpcad < 0 ? 'btn-danger' : 'btn-light') }}  m-2">{{ $switcher->gbpcad }}</button>
                                                    </td>
                                                    <td><button id="boton14"
                                                            class="btn {{ $switcher->audcad > 0 ? $clase : ($switcher->audcad < 0 ? 'btn-danger' : 'btn-light') }}  m-2">{{ $switcher->audcad }}</button>
                                                    </td>
                                                    <td><button id="boton15"
                                                            class="btn {{ $switcher->nzdcad > 0 ? $clase : ($switcher->nzdcad < 0 ? 'btn-danger' : 'btn-light') }}  m-2">{{ $switcher->nzdcad }}</button>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>

                                                </tr>

                                                <tr>
                                                    <td>@php
                                                        $sumachfv = $switcher->usdchf + $switcher->eurchf + $switcher->gbpchf + $switcher->audchf + $switcher->nzdchf + $switcher->cadchf;
                                                    @endphp
                                                        {{ $sumachfv }}</td>
                                                    <td><button id="botonCHFV" class="btn btn-light m-2">CHF</button></td>
                                                    <td><button id="boton16"
                                                            class="btn {{ $switcher->usdchf > 0 ? $clase : ($switcher->usdchf < 0 ? 'btn-danger' : 'btn-light') }}  m-2">{{ $switcher->usdchf }}</button>
                                                    </td>
                                                    <td><button id="boton17"
                                                            class="btn {{ $switcher->eurchf > 0 ? $clase : ($switcher->eurchf < 0 ? 'btn-danger' : 'btn-light') }}  m-2">{{ $switcher->eurchf }}</button>
                                                    </td>
                                                    <td><button id="boton18"
                                                            class="btn {{ $switcher->gbpchf > 0 ? $clase : ($switcher->gbpchf < 0 ? 'btn-danger' : 'btn-light') }}  m-2">{{ $switcher->gbpchf }}</button>
                                                    </td>
                                                    <td><button id="boton19"
                                                            class="btn {{ $switcher->audchf > 0 ? $clase : ($switcher->audchf < 0 ? 'btn-danger' : 'btn-light') }}  m-2">{{ $switcher->audchf }}</button>
                                                    </td>
                                                    <td><button id="boton20"
                                                            class="btn {{ $switcher->nzdchf > 0 ? $clase : ($switcher->nzdchf < 0 ? 'btn-danger' : 'btn-light') }}  m-2">{{ $switcher->nzdchf }}</button>
                                                    </td>
                                                    <td><button id="boton21"
                                                            class="btn {{ $switcher->cadchf > 0 ? $clase : ($switcher->cadchf < 0 ? 'btn-danger' : 'btn-light') }}  m-2">{{ $switcher->cadchf }}</button>
                                                    </td>
                                                    <td></td>
                                                    <td></td>

                                                </tr>

                                                <tr>
                                                    <td>@php
                                                        $sumajpyv = $switcher->usdjpy + $switcher->eurjpy + $switcher->gbpjpy + $switcher->audjpy + $switcher->nzdjpy + $switcher->cadjpy + $switcher->chfjpy;
                                                    @endphp
                                                        {{ $sumajpyv }}</td>
                                                    <td><button id="botonJPYV" class="btn btn-light m-2">JPY</button></td>
                                                    <td><button id="boton22"
                                                            class="btn {{ $switcher->usdjpy > 0 ? $clase : ($switcher->usdjpy < 0 ? 'btn-danger' : 'btn-light') }}  m-2">{{ $switcher->usdjpy }}</button>
                                                    </td>
                                                    <td><button id="boton23"
                                                            class="btn {{ $switcher->eurjpy > 0 ? $clase : ($switcher->eurjpy < 0 ? 'btn-danger' : 'btn-light') }}  m-2">{{ $switcher->eurjpy }}</button>
                                                    </td>
                                                    <td><button id="boton24"
                                                            class="btn {{ $switcher->gbpjpy > 0 ? $clase : ($switcher->gbpjpy < 0 ? 'btn-danger' : 'btn-light') }}  m-2">{{ $switcher->gbpjpy }}</button>
                                                    </td>
                                                    <td><button id="boton25"
                                                            class="btn {{ $switcher->audjpy > 0 ? $clase : ($switcher->audjpy < 0 ? 'btn-danger' : 'btn-light') }}  m-2">{{ $switcher->audjpy }}</button>
                                                    </td>
                                                    <td><button id="boton26"
                                                            class="btn {{ $switcher->nzdjpy > 0 ? $clase : ($switcher->nzdjpy < 0 ? 'btn-danger' : 'btn-light') }}  m-2">{{ $switcher->nzdjpy }}</button>
                                                    </td>
                                                    <td><button id="boton27"
                                                            class="btn {{ $switcher->cadjpy > 0 ? $clase : ($switcher->cadjpy < 0 ? 'btn-danger' : 'btn-light') }}  m-2">{{ $switcher->cadjpy }}</button>
                                                    </td>
                                                    <td><button id="boton28"
                                                            class="btn {{ $switcher->chfjpy > 0 ? $clase : ($switcher->chfjpy < 0 ? 'btn-danger' : 'btn-light') }}  m-2">{{ $switcher->chfjpy }}</button>
                                                    </td>
                                                    <td></td>
                                                </tr>

                                            </tbody>
                                        </table>

                                    </div>
                                @endforeach

                            </div>



                        </div>
                        <div class="col-md-10 col-12 text-center">

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('js/botones.js') }}"></script>
@endsection
