<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @hasSection('title')

            <title>@yield('title') - {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }}</title>
        @endif
        <style>
            [x-cloak] {
                display: none;
            }
            html{
                height: 100%;
            }
        </style>

        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ url(asset('logo.png')) }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Styles -->
        {{-- <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}"> --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles

        <!-- Scripts -->
        <!-- Alpine -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
        {{-- <script src="{{ url(mix('js/app.js')) }}" defer></script> --}}
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('styles')
    </head>

    <body class=" bg-gray-100 h-full">
        <livewire:auth-modal />

        @yield('body')

        @livewireScripts

        <script>
            $(".authBtn").click(function(){
                Livewire.emit('openAuthModal');
            });
        </script>
        <!-- Clipboard -->
        <script src="https://cdn.jsdelivr.net/npm/@ryangjchandler/alpine-clipboard@1.x.x/dist/alpine-clipboard.js"></script>

        @yield('scripts')
        <script>
            Livewire.on('userLoggedIn', () => {
                console.log("LoggedIn");
                window.location.reload();
            });
        </script>
    </body>
</html>
