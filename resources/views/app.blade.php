<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>e-presensi</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

</head>

<body class="antialiased">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            {{-- @include('includes.navbar') --}}

            {{-- @include('includes.sidebar') --}}

            @yield('content')

            {{-- @include('includes.footer') --}}

        </div>
    </div>

</body>

</html>
