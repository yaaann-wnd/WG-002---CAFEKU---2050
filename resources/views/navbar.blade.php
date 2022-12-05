<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cafeku</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="{{ asset('bs/css/bootstrap.css') }}">
    <script src="{{ asset('bs/js/bootstrap.js') }}"></script>
</head>
<body>
    <body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-success shadow-sm mb-4">
            <div class="container">
                <a class="navbar-brand fw-semibold" href="#">
                    Cafeku
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container">
            @yield('content')
        </main>
    </div>

    <footer class="text-center text-secondary p-5">
        <div class="mb-1">
            &#169; Copyright by Cafeku 2022. All rights reserved.
        </div>
        <div>
            Daegu No. 05, Jawa Timur.
        </div>
    </footer>
</body>
</html>
