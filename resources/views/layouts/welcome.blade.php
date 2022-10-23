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
    <link href="{{ asset('assets') }}/css/font-awesome.css" rel="stylesheet">

    <style>
        .bg {
            background-color: #ffecff;
        }
        footer {
            clear: both;
            margin: 0;
            margin-top: 40px;
            padding: 15px;
            height: 50px;

        }
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="image" class="w-100 d-flex">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <a class="nav-item nav-link fw-bold" href="#">Home</a>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Kategori
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Linux</a>
                                <a class="dropdown-item" href="#">Linux</a>
                                <a class="dropdown-item" href="#">Linux</a>
                                <a class="dropdown-item" href="#">Linux</a>
                            </div>
                        </li>

                        <a class="nav-item nav-link fw-bold" href="#">About</a>
                        <a class="nav-item nav-link fw-bold" href="#">Contact</a>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <form class="d-flex">
                            <input class="form-control me-1" type="search" placeholder="Search.." name="search">
                            <button class="btn btn-primary" type="submit"><li class="fa fa-search"></li></button>
                        </form>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-2">
            @yield('content')
        </main>
    </div>
</body>

<footer class="bg-white">
    <p class="text-center">Copyright &copy; 2022 by Febriyan</p>
</footer>
</html>
