<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="Calamba City Hall Interactive Map">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="{{asset('../image/logo.ico')}}">
    <link rel="stylesheet" href="{{asset('css/user.css')}}"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8a364c3095.js" crossorigin="anonymous"></script>
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>

<body>
    {{-- Screen-loader --}}
    @include('layouts.components.loader')

    {{-- Navbar with logo --}}
    <nav>
        <div class="container">
            <img src="{{asset('/image/Navlogo.png')}}" loading="lazy" alt="NavLogo" />
        </div>
    </nav>

    {{-- Main content / SVG MAPS --}}
    <main>
        @yield('content')
    </main>

    {{-- Other Components --}}
    @include('layouts.components.floatings')
    @include('layouts.components.bottom')
    @include('layouts.components.popup')



    {{-- scripts --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
    <script src="{{asset('../js/bottom-drag.js')}}" defer></script>
    <script src="{{asset('../js/bottom-search.js')}}" defer></script>
    <script src="{{asset('../js/floors.js')}}" defer></script>
    <script src="{{asset('../js/svg-route.js')}}" defer></script>
    <script src="{{asset('../js/svg-zoom.js')}}" defer></script>
    <script src="{{asset('../js/room-popup-info.js')}}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>