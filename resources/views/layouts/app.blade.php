<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="すべらない話、エピソードトークが作れるサイト。日常がすべらない話やエピソードトークであふれ、豊かな人生を目指す。">
    <meta name="keywords" content="すべらない話,エピソードトーク,エピトーク,面白い話,作れる,作成できる,作り方,作成方法">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="manifest" href="/manifest.json">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('css/forum.css')}}">

    <link rel="icon" href="{{asset('img/すべらない話.png')}}">
    <link rel="apple-touch-icon" href="{{asset('img/すべらない話.png')}}" />
    <link rel="icon" type="image/png" href="{{asset('img/すべらない話.png')}}">

    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/sw.js').then(function(registration) {
                    console.log('ServiceWorker registration successful with scope: ', registration.scope);
                }, function(error) {
                    console.log('ServiceWorker registration failed: ', error);
                });
            });
        }
    </script>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>
<footer class="bg-gray-200" style="width: 100%; height: 120px; text-align: center; padding: 50px 0;">
    <p>© All rights reserved by Epimaker.</p>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('privacy.policy') }}">プライバシーポリシー</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('terms.service') }}">利用規約</a>
        </li>
    </ul>
</footer>
</html>