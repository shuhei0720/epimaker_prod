<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="AIを使ってエピソードトークが作れるサイト。">
        <meta name="keywords" content="エピソードトーク,面白い話,作れる,作成できる,作り方,作成方法">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- CSS -->
        <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
        <link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">

        <link rel="icon" href="{{asset('img/すべらない話.png')}}">
        <link rel="apple-touch-icon" href="{{asset('img/すべらない話.png')}}" />
        <link rel="icon" type="image/png" href="{{asset('img/すべらない話.png')}}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
        <div class="w-full container mx-auto p-6">
                <div class="w-full flex items-center justify-between">
                    <div class="flex w-1/2 justify-end content-center">
                        {{-- ログイン・登録部分 --}}
                        @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <a href="{{ url('/post') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">HOME</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline font-bold text-base">ログイン</a>
        
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline font-bold text-base">登録</a>
                                @endif
                            @endauth
                        @endif
                        </div>
                    </div>
                </div>
            </div>
           <div class="w-full container mx-auto p-6">
                <div class="h-screen pb-14 bg-right bg-cover">
                    <div class="container pt-10 md:pt-18 px-6 mx-auto flex flex-wrap flex-col md:flex-row items-center bg-gray-50">
                        <!--左側-->
                        <div class="flex flex-col w-full xl:w-2/5 justify-center lg:items-start overflow-y-hidden ">
                            <h1 class="font-semibold text-3xl md:text-5xl leading-tight bg-gradient-to-r from-pink-500 via-blue-500 to-green-500 bg-clip-text text-transparent text-center md:text-left slide-in-bottom-h1">EpiMaker</h1>
                            <p class="leading-normal text-xl md:text-4xl mb-8 text-center md:text-left slide-in-bottom-subtitle bg-gradient-to-r from-pink-500 via-blue-500 to-green-500 bg-clip-text text-transparent">
                                AIを使って手軽にエピソードトークを作ることができます。
                            </p>
                            <div class="flex w-full justify-center md:justify-start pb-2 lg:pb-2 fade-in ">
                                <a href="{{route('contact.create')}}"><x-primary-button class="btnsetg">お問い合わせ</x-primary-button></a>
                                <a href="{{route('register')}}"><x-primary-button class="btnsetr">ご登録はこちら</x-primary-button></a>
                                
                            </div>
                            <div class="flex w-full justify-center md:justify-start pb-5 lg:pb-2 fade-in ">
                                <a href="{{ route('login') }}"><x-primary-button class="btnsetl">登録済みの方はこちら</x-primary-button></a>
                            </div>
                        </div>
                        {{-- 右側 --}}
                        <div class="w-full xl:w-3/5 py-6 overflow-y-hidden">
                            <img class="w-5/6 mx-auto lg:mr-0 slide-in-bottom rounded-lg shadow-xl" src="{{asset('img/Designer.jpeg')}}">
                        </div>
                    </div>
                    <div class="container pt-10 md:pt-18 px-6 mx-auto flex flex-wrap flex-col md:flex-row items-center">
                        <div class="w-full text-m text-center md:text-left fade-in border-2 p-4 bg-gradient-to-r from-pink-500 via-blue-500 to-green-500 bg-clip-text text-transparent leading-8 mb-8">
                            <P> このサイトでは、日記感覚でエピソードトークを作ることができます。<br>日常にはあなただけの人生一度だけのエピソードが日々起こっていますが、それは徐々に記憶から薄れ無くなっていきます。<br>そこで、このサイトに記録することであなただけの物語を作っていきましょう！<br>さらに、作成画面に沿ってエピソードを作ることで、起承転結に整理されたきれいなエピソードになり、人と話すとき話が上手な人と思われるようになるかもしれません。<br>【new!】&nbsp;AIでエピソードを作成できる機能をリリースしました。ぜひ、AIエピソード作成を使いこなしてください！</p>
                        </div>
                        <!--フッタ-->
                        <div class="w-full pt-10 pb-6 text-sm md:text-left fade-in">
                            <p class="text-gray-500 text-center">@2024 EpiMaker</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>