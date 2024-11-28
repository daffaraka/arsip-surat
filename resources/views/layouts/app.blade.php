<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Arsip Surat')</title>

    <!-- Load custom styles -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- Load Vite assets -->
    @vite(['resources/css/styles.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<style>
    main {
        display: flex;
    }
</style>

<body>
    <main>
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; min-height:100vh;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-4">Menu</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{route('surats.index')}}" class="nav-link {{ request()->routeIs('surats.index') ? 'active' : '' }} text-white" aria-current="page">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#home"></use>
                        </svg>
                        Arsip
                    </a>
                </li>
                <li>
                    <a href="{{route('kategoris.index')}}" class="nav-link {{ request()->routeIs('kategoris.index') ? 'active' : '' }} text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#speedometer2"></use>
                        </svg>
                        Kategori
                    </a>
                </li>
                <li>
                    <a href="{{route('about')}}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }} text-white">
                        <svg class="bi me-2" width="16" height="16">
                            <use xlink:href="#table"></use>
                        </svg>
                        About
                    </a>
                </li>
            </ul>
            <hr>
        </div>

        <div class="d-flex p-3 text-white w-100" style="margin-left: 30px;">
            @yield('content')

        </div>
    </main>

</body>

</html>
