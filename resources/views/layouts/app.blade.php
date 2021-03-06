<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('path.aspireName', 'Confirm Your Age') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/vendor/MooTools-Core-1.6.0.js') }}" defer></script> --}}
    @if (Request::is('admin/*'))
        <script src="{{ asset('js/vendor/xlsx.min.js') }}" defer></script>
    @endif      
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="shortcut icon" href="{{ asset('../favicon.ico') }}" >
    <!-- Fonts -->  
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">      
</head>
<body>        
    <div id="app" v-cloak>       
        @include('layouts.toolbar')
        <main class="py-4">
            @yield('content')
        </main>        
    </div>
</body>
</html>
