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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-white" style="background-image: url(images/bg.png);
background-position: left center;
background-repeat: no-repeat;
background-attachment: fixed;
background-size: cover;
background-color: cornflowerblue ">
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-transparent">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->


            <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
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
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-6">
                    <img src="{{ asset('images/hero.png') }}" alt="hero.png" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <div class="jumbotron bg-transparent text-white">
                        <h1 class="h1 my-4">Bayes Dentist</h1>
                        <p class="card-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet animi architecto aspernatur aut, delectus eius esse expedita ipsam laboriosam minima necessitatibus nesciunt omnis optio, perspiciatis placeat qui, quia saepe vitae.</p>
                        <a href="{{ route('diagnose.create') }}" class="mt-4 btn btn-lg btn-outline-light rounded-pill">Diagnosa Sekarang</a>
                    </div>
                </div>
            </div>
        </div>

    </main>
</div>
</body>
</html>
