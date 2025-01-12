<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Language" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SnapDB • Dependency-free database management for productive (and lazy) people.</title>
    <meta name="description" content="Dependency-free database management with SnapDB, the macOS app designed for seamless DB management and monitoring. Download now!">
    <meta name="keywords" content="macOS database management, SnapDB app, dependency-free databases, Docker alternative, Homebrew-free DB management">

    <meta property="og:title" content="SnapDB - The Best macOS Database Management App">
    <meta property="og:description" content="Dependency-free database management with SnapDB, the macOS app designed for seamless DB management and monitoring. Download now!">
    <meta property="og:image" content="{{ asset('img/social-card.png') }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@SnapDBApp" />
    <meta name="twitter:creator" content="@SnapDBApp" />
    <meta name="twitter:image" content="{{ asset('img/social-card.png') }}" />
    <meta name="twitter:title" content="Dependency and headache free database management ⭐️" />
    <meta name="twitter:description" content="Dependency-free database management with SnapDB, the macOS app designed for seamless DB management and monitoring. Download now!" />

    <meta name="theme-color" content="#FF9701">


    {{-- Favicons --}}
    <link rel="icon" type="image/png" href="{{ asset('img/favicon/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('img/favicon/favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('img/favicon/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon.png') }}" />
    <link rel="manifest" href="{{ asset('img/favicon/site.webmanifest') }}" />

    {{-- Fonts--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    {{-- Styles / Scripts--}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.paddle.com/paddle/v2/paddle.js"></script>
    <script type="text/javascript">
        @if (! app()->isProduction())
        Paddle.Environment.set("sandbox");
       @endif

        Paddle.Initialize({
            token: '{{ config('paddle.client_side_token') }}'
        });
    </script>
</head>
    <body class="font-sans antialiased bg-gray-50 dark:bg-black dark:text-white/50">
    {{ $slot }}

    <x-footer />
    </body>
</html>
