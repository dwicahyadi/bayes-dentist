<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .bg-gradient{
            background-image: url(images/bg2.png);
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover
        }
    </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark bg-info sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <a class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <img src="{{ auth()->user()->picture_url ?? 'https://ui-avatars.com/api/?background=random&color=fff&name='.auth()->user()->name }}" alt="profile" class="rounded-circle" style="width: 24px">
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item mx-2 @if(request()->is('*home')) bg-primary px-4 rounded-pill @endif">
                        <a class="nav-link text-light text-center " href="{{ route('home.user') }}"><i class="fa fa-dashboard"></i> Beranda</a>
                    </li>
                    <li class="nav-item mx-2 @if(request()->is('diagnose*')) bg-primary px-4 rounded-pill @endif">
                        <a class="nav-link text-light text-center " href="{{ route('diagnose.create') }}"><i class="fa fa-stethoscope"></i> Diagnosa</a>
                    </li>
                    <li class="nav-item mx-2 @if(request()->is('history')) bg-primary px-4 rounded-pill @endif">
                        <a class="nav-link text-light text-center " href="{{ route('history') }}"><i class="fa fa-history"></i> Riwayat</a>
                    </li>
                    <li class="nav-item mx-2 @if(request()->is('diseases_information')) bg-primary px-4 rounded-pill @endif">
                        <a class="nav-link text-light text-center " href="{{ route('diseases_information') }}"><i class="fa fa-book"></i> Daftar Penyakit</a>
                    </li>
                    <li class="nav-item mx-2 @if(request()->is('profile')) bg-primary px-4 rounded-pill @endif">
                        <a class="nav-link text-light text-center " href="{{ route('profile') }}"><i class="fa fa-user"></i> Profil</a>
                    </li>
                </ul>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
            <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="">
        @include('include.flash-message')
        @yield('content')
    </main>
    <nav class="navbar navbar-expand-md navbar-light bg-white fixed-bottom border-top 	d-block  d-sm-none">
        <div class="container">
            <nav class="nav nav-pills d-flex w-100 d-flex justify-content-around align-items-center">
                <a class="nav-item @if(request()->is('*home')) p-2 bg-info rounded-pill text-white @endif" href="{{ route('home.user') }}">
                    <i class="fa fa-dashboard mr-2"></i>
                    @if(request()->is('*home')) Beranda @endif
                </a>

                <a class="nav-item @if(request()->is('diagnose*')) p-2 bg-info rounded-pill text-white @endif" href="{{ route('diagnose.create') }}">
                    <i class="fa fa-stethoscope mr-2"></i>
                    @if(request()->is('diagnose*')) Diagnosa @endif
                </a>

                <a class="nav-item @if(request()->is('history')) p-2 bg-info rounded-pill text-white @endif" href="{{ route('history') }}">
                    <i class="fa fa-history mr-2"></i>
                    @if(request()->is('history')) Riwayat @endif
                </a>

                <a class="nav-item @if(request()->is('diseases_information')) p-2 bg-info rounded-pill text-white @endif" href="{{ route('diseases_information') }}">
                    <i class="fa fa-book mr-2"></i>
                    @if(request()->is('diseases_information')) Daftar Penyakit @endif
                </a>

                <a class="nav-item @if(request()->is('profile')) p-2 bg-info rounded-pill text-white @endif" href="{{ route('profile') }}">
                    <i class="fa fa-user mr-2"></i>
                    @if(request()->is('profile')) Profil @endif
                </a>

            </nav>
        </div>
    </nav>
</div>
</body>
</html>
