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
        @php
            $current_logo = App\Models\Media::where('source', 'logo')->first();
        @endphp
        @if ($current_logo)
            <link rel="shortcut icon" href="{{ $current_logo }}">
        @else
		    <link rel="shortcut icon" href="{{ url(asset('logo.png')) }}">
        @endif

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
        <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
        @include('layouts.scripts.onesignal')

    </head>

    <body class="h-full bg-gray-100 ">
        <x-notification />
        <livewire:auth-modal />
        <livewire:commande-form-modal />
        @include('layouts.navbar')

        @yield('body')

        @livewireScripts
        @include('layouts.footer')
        {{-- Firing Events --}}
        <script>
            $(".authBtn").click(function(){
                Livewire.emit('openAuthModal');
            });
            $(".markPaymentPaidBtn").click(function(){
                Livewire.emit('opentPaymentPaidModal');
            });
            $(".addProductToCartBtn").click(function(){
                console.log("Adding");
                Livewire.emit('addProductToCart', $(this).data('prodId'));
                console.log("Added");
            });
        </script>
        <!-- Clipboard -->
        <script src="https://cdn.jsdelivr.net/npm/@ryangjchandler/alpine-clipboard@1.x.x/dist/alpine-clipboard.js"></script>

        @yield('scripts')
        {{-- Listening to Events --}}
        <script>
            Livewire.on('userLoggedIn', () => {
                console.log("LoggedIn");
                window.location.reload();
            });
            Livewire.on('productCreated', $product => {
                console.log("productCreated");
                // window.location.reload();
                OneSignal.sendSelfNotification(
                    /* Title (defaults if unset) */
                    "OneSignal Web Push Notification",
                    /* Message (defaults if unset) */
                    "Action buttons increase the ways your users can interact with your notification.",
                    /* URL (defaults if unset) */
                    'https://example.com/?_osp=do_not_open',
                    /* Icon */
                    'https://onesignal.com/images/notification_logo.png',
                    {
                        /* Additional data hash */
                        notificationType: 'news-feature'
                    },
                    [{ /* Buttons */
                        /* Choose any unique identifier for your button. The ID of the clicked button is passed to you so you can identify which button is clicked */
                        id: 'like-button',
                        /* The text the button should display. Supports emojis. */
                        text: 'Like',
                        /* A valid publicly reachable URL to an icon. Keep this small because it's downloaded on each notification display. */
                        icon: 'http://i.imgur.com/N8SN8ZS.png',
                        /* The URL to open when this action button is clicked. See the sections below for special URLs that prevent opening any window. */
                        url: 'https://example.com/?_osp=do_not_open'
                    },
                    {
                        id: 'read-more-button',
                        text: 'Read more',
                        icon: 'http://i.imgur.com/MIxJp1L.png',
                        url: 'https://example.com/?_osp=do_not_open'
                    }]
                );
                console.log("Notified");
            });
        </script>
        {{-- Notification --}}
        <x-scripts.notifications />
    </body>
</html>
