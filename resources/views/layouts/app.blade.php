<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white py-3 ">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="{{ route('profile') }}">{{ __('Profil') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="{{ route('organization') }}">{{ __('Struktur Organisasi') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="{{ route('internship') }}">{{ __('Pengajuan Magang') }}</a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item fw-bold">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="d-lg-flex py-3 px-3 flex-row">
            @guest
            @else
                <div class="card px-3">
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle py-3 my-auto" alt="avatar1" width="64"
                            src="https://mdbcdn.b-cdn.net/img/new/avatars/9.webp" />
                        <div class="d-flex flex-column px-3 my-auto">
                            <h5 class="my-0">{{ __('Hello,') }}</h5>
                            <h4 class="fw-bold text-wrap">{{ Auth::user()->name }}</h4>
                        </div>
                    </div>
                    <ul class="list-group py-3">
                        <li class="list-group-item"><a href="{{ route('home') }}" class="nav-link fw-bold">Dasbor</a></li>
                        <li class="list-group-item"><a href="{{ route('internships.index') }}" class="nav-link fw-bold">Pengajuan Masuk</a></li>
                        @if (Auth::user()->has_super_access == true)
                            <li class="list-group-item"><a href="{{ route('users.index') }}" class="nav-link fw-bold">Atur
                                    Pengguna</a></li>
                            <li class="list-group-item"><a href="{{ route('settings') }}"
                                    class="nav-link fw-bold">Pengaturan Lain</a></li>
                        @endif
                        <li class="list-group-item"><a href="{{ route('logout') }}" class="nav-link fw-bold"
                                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Keluar</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </div>
            @endguest
            <div class="d-flex flex-column flex-grow-1 my-5">
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>
