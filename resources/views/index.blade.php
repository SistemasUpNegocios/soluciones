<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="theme-color" content="#01bbcc" />
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Administrador Up Trading</title>
    <meta content="" name="description">

    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/preloader.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
    <link href="{{ asset('img/favicon.png') }}" rel="apple-touch-icon">
    <style>
        :root {
            touch-action: pan-x pan-y;
            height: 100%
        }
    </style>
    @yield('css')
    @laravelPWA
</head>

<body>
    @yield('preloader')

    @include('sidebar')

    <main id="main" class="main activee2">
        @yield('content')
    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-chevron-up"></i>
    </a>

    @yield('footer')

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/preloader.js') }}"></script>
    @yield('script')    
</body>

</html>