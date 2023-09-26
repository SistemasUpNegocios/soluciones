@php
    
    $traders = DB::table('traders')
    
        ->where('id', '100001')
    
        ->orderBy('id', 'DESC')
    
        ->get();
    
    $traders_data = DB::table('traders_data')->get();
    
    $valores_moneda = ['EURUSD', 'GBPUSD', 'AUDUSD', 'NZDUSD', 'USDCAD', 'USDCHF', 'USDJPY', 'EURGBP', 'EURAUD', 'EURNZD', 'GBPAUD', 'GBPNZD', 'AUDNZD', 'EURCAD', 'EURCHF', 'EURJPY', 'GBPCAD', 'GBPCHF', 'GBPJPY', 'AUDCAD', 'AUDCHF', 'AUDJPY', 'NZDCAD', 'NZDCHF', 'NZDJPY', 'CADCHF', 'CADJPY', 'CHFJPY'];
    
@endphp



<header id="header" class="header fixed-top d-flex align-items-center">



    <div class="d-flex align-items-center justify-content-between">

        <a href="{{ url('/admin/dashboard') }}" class="logo d-flex align-items-center">

            <span class="d-none d-lg-block">Soluciones Uptrading</span>

        </a>

        <i class="bi bi-list toggle-sidebar-btn menu-pc" id="btntog"></i>

        <a class="navbar-toggler buttonNav" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
            aria-controls="offcanvasExample">

            <i class="bi bi-list toggle-sidebar-btn menu-cel" id="btntog"></i>

        </a>

    </div>





    <nav class="header-nav ms-auto">

        <ul class="d-flex align-items-center">

            <li class="nav-item dropdown pe-3">



                <?php $foto = auth()->user()->foto_perfil; ?>



                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

                    <img src="{{ asset("img/usuarios/$foto") }}" id="imgPerfilNav" alt="Foto de perfil"
                        class="rounded-circle profilephoto2">

                    <span id="nombreSide" class="d-none d-md-block dropdown-toggle ps-2">

                        {{ auth()->user()->nombre }}

                    </span>

                </a>



                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

                    <li class="dropdown-header">

                        <h6>

                            {{ auth()->user()->nombre }}

                        </h6>

                        <span>

                            Usuario administrador

                        </span>

                    </li>

                    <li>

                        <hr class="dropdown-divider">

                    </li>

                    <li>

                        <a class="dropdown-item d-flex align-items-center" href="{{ url('/admin/logout') }}">

                            <i class="bi bi-box-arrow-right"></i>

                            <span>Cerrar sesión</span>

                        </a>

                    </li>



                </ul>

            </li>



        </ul>

    </nav>



</header>



<div class="sidebar-nav sidebar offcanvas offcanvas-start activee" tabindex="-1" id="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">



        <li class="nav-heading">Menú</li>



        <li class="nav-item">

            <a class="@if (request()->is('admin/perfil')) nav-link @else nav-link collapsed @endif"
                href="{{ URL::to('admin/perfil') }}">

                <i class="bi bi-person"></i>

                <span>Mi cuenta</span>

            </a>

        </li>





        <li class="nav-item">

            <a class="@if (request()->is('/admin/dashboard')) nav-link @else nav-link collapsed @endif"
                href="{{ url('/admin/dashboard') }}">

                <i class="bi bi-grid"></i>

                <span>Saldos</span>

            </a>

        </li>



        {{-- <li>

            <a class="@if (request()->is('/admin/portafoliosActivos')) nav-link @else nav-link collapsed @endif"

                href="{{ url('/admin/portafoliosActivos') }}">

                <i class="bi bi-wallet2"></i>

                <span>Portafolios Activos</span>

            </a>

        </li> --}}


        <li>

            <a class="@if (request()->is('/admin/portafoliosActivos2023')) nav-link @else nav-link collapsed @endif"
                href="{{ url('/admin/portafoliosActivos2023') }}">

                <i class="bi bi-wallet2"></i>

                <span>Portafolios Activos 2023</span>

            </a>

        </li>





        {{-- <li class="nav-item">

            <a class="@if (request()->is('/admin/portafolioGraph')) nav-link @else nav-link collapsed @endif"
                href="{{ url('/admin/portafolioGraph') }}">

                <i class="bi bi-distribute-horizontal"></i>

                <span>Gráfica Portafolios</span>

            </a>

        </li> --}}


        <li class="nav-item">

            <a class="@if (request()->is('/admin/portafolioGraph2023')) nav-link @else nav-link collapsed @endif"
                href="{{ url('/admin/portafolioGraph2023') }}">

                <i class="bi bi-distribute-horizontal"></i>

                <span>Gráfica Portafolios 2023</span>

            </a>

        </li>



        {{-- <li class="nav-item">

            <a class="nav-link collapsed" data-bs-target="#equitybalance-nav" data-bs-toggle="collapse" href="#">

                <i class="bi bi-bar-chart-line"></i><span>Equity/Balance</span><i
                    class="bi bi-chevron-down ms-auto"></i>

            </a>

            <ul id="equitybalance-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">

                @foreach ($traders as $trader)
                    <li>

                        <a class="ps-2" href="/admin/equityBalance/{{ $trader->id }}">

                            <i class="bi bi-circle"></i><span>{{ $trader->nombre }}</span>

                        </a>

                    </li>
                @endforeach

            </ul>

        </li> --}}



        <li class="nav-item">

            <a class="nav-link collapsed" data-bs-target="#equitybalance-nav" data-bs-toggle="collapse" href="#">

                <i class="bi bi-bar-chart-line"></i><span>Equity/Balance</span><i
                    class="bi bi-chevron-down ms-auto"></i>

            </a>

            <ul id="equitybalance-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">

                @foreach ($traders as $trader)
                    <li>

                        <a class="ps-2" href="/admin/equityBalance2023/{{ $trader->id }}">

                            <i class="bi bi-circle"></i><span>{{ $trader->nombre }}</span>

                        </a>

                    </li>
                @endforeach

            </ul>

        </li>



        {{-- <li class="nav-item">

            <a class="@if (request()->is('/admin/historicos')) nav-link @else nav-link collapsed @endif"
                href="{{ url('/admin/historicos') }}">

                <i class="bi bi-bar-chart-steps"></i>

                <span>Históricos </span>

            </a>

        </li> --}}

        <li class="nav-item">

            <a class="@if (request()->is('/admin/historicos2023')) nav-link @else nav-link collapsed @endif"
                href="{{ url('/admin/historicos2023') }}">

                <i class="bi bi-bar-chart-steps"></i>

                <span>Históricos </span>

            </a>

        </li>



        <li class="nav-item">

            <a class="@if (request()->is('/admin/claveInversor')) nav-link @else nav-link collapsed @endif"
                href="{{ url('/admin/claveInversor') }}">

                <i class="bi bi-envelope-plus"></i>

                <span>Solicitar clave inversor</span>

            </a>

        </li>







        <li class="nav-item">

            <a class="nav-link collapsed" href="{{ url('/admin/logout') }}">

                <i class="bi bi-box-arrow-in-right"></i>

                <span>Cerrar sesión</span>

            </a>

        </li>

    </ul>

</div>
