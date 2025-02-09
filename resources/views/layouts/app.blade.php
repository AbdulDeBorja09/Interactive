<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{asset('css/user.css')}}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    {{-- Navbar with logo --}}
    <nav>
        <img src="{{asset('../image/logo.png')}}" alt="NavLogo" />
    </nav>

    {{-- Main content / SVG MAPS --}}
    <main>
        @yield('content')
    </main>

    {{-- Other Components --}}
    @include('layouts.components.floors')
    @include('layouts.components.bottom')
    @include('layouts.components.popup')
    @include('layouts.components.loader')


    {{-- scripts --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('../js/bottom-drag.js')}}"></script>
    <script src="{{asset('../js/bottom-search.js')}}"></script>
    <script src="{{asset('../js/floors.js')}}"></script>
    <script src="{{asset('../js/svg-route.js')}}"></script>
    <script src="{{asset('../js/room-popup-info.js')}}"></script>
</body>

</html>