<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sistema web quimica') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #323232;">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" >{{ __('Ingresar') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" >{{ __('Registrarse como docente') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" >{{ __('Registrarse como Alumno') }}</a>
                        </li>
                        
                        @endif
                        @else
                        <li class="nav-item"  id="kek">
                            <a class="nav-link" >{{ __('Docente') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link2" >{{ __('TablaPeriodica') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">{{ __('Teoria') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">{{ __('Seguimiento') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" >{{ __('Asistencia') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" >{{ __('Actividades') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" >{{ __('Practicas') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" >{{ __('Examenes') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" >{{ __('Cerrar sesion') }}</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
