<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cafeku | {{ Auth::user()->role == 'owner'? 'OWNER':'ADMIN' }}</title>

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
                        @if(Auth::user()->role == 'admin')
                        <li class="nav-item">
                            <a href="{{ route('dashboard.index') }}" class="nav-link {{ request()->is('dashboard*')?'active fw-semibold':'' }}">Dashboard</a>
                        </li>                            
                        @endif
                        <li class="nav-item">
                            <a href="{{ route('menu.index') }}" class="nav-link {{ request()->is('menu*')?'active fw-semibold':'' }}">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kategori.index') }}" class="nav-link {{ request()->is('kategori*')?'active fw-semibold':'' }}">Kategori</a>
                        </li>
                        @if(Auth::user()->role == 'owner')
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}" class="nav-link {{ request()->is('user*')?'active fw-semibold':'' }}">User</a>
                        </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container">
            @yield('content')
        </main>

        <footer class="text-center text-secondary p-5">
            <div class="mb-1">
                &#169; Copyright by Cafeku 2022. All rights reserved.
            </div>
            <div>
                Daegu No. 05, Jawa Timur.
            </div>
        </footer>
    </div>
</body>
</html>
