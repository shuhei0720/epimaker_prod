<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold  text-2xl leading-tight bg-gradient-to-r from-pink-500 via-blue-500 to-green-500 bg-clip-text text-transparent leading-tight">
            すべらない話個別表示
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        <div class="bg-yellow-100 w-full rounded-2xl">
            <div class="mt-4 p-4">
                <h1 class="text-xl text-red-700 font-semibold">
                    {{$episode->title}}
                </h1>
                <div class="text-right">
                    <a href="{{route('episode.edit', $episode)}}">
                        <x-primary-button>
                            編集
                        </x-primary-button>
                    </a>
                </div>
                <hr class="w-full">
                <p class="mt-4 whitespace-pre-line">
                    {{$episode->episode}}
                </p>
                <div class="text-sm font-semibold flex flex-row-reverse">
                    <p> {{$episode->created_at}}</p>
                </div>
            </div>
        </div>

        <div class="bg-yellow-100 w-full rounded-2xl">
            <div class="mt-4 p-4">
                <h1 class="text-lg font-semibold">
                    いつ？
                </h1>
                <hr class="w-full">
                <p class="mt-4 whitespace-pre-line">
                    {{$episode->when}}
                </p>
            </div>
        </div>

        <div class="bg-yellow-100 w-full rounded-2xl">
            <div class="mt-4 p-4">
                <h1 class="text-lg font-semibold">
                    どこで？
                </h1>
                <hr class="w-full">
                <p class="mt-4 whitespace-pre-line">
                    {{$episode->where}}
                </p>
            </div>
        </div>

        <div class="bg-yellow-100 w-full rounded-2xl">
            <div class="mt-4 p-4">
                <h1 class="text-lg font-semibold">
                    だれが？
                </h1>
                <hr class="w-full">
                <p class="mt-4 whitespace-pre-line">
                    {{$episode->who}}
                </p>
            </div>
        </div>

        <div class="bg-yellow-100 w-full rounded-2xl">
            <div class="mt-4 p-4">
                <h1 class="text-lg font-semibold">
                    なにを？
                </h1>
                <hr class="w-full">
                <p class="mt-4 whitespace-pre-line">
                    {{$episode->what}}
                </p>
            </div>
        </div>

        <div class="bg-yellow-100 w-full rounded-2xl">
            <div class="mt-4 p-4">
                <h1 class="text-lg font-semibold">
                    どうした？
                </h1>
                <hr class="w-full">
                <p class="mt-4 whitespace-pre-line">
                    {{$episode->do}}
                </p>
            </div>
        </div>

        <div class="bg-yellow-100 w-full rounded-2xl">
            <div class="mt-4 p-4">
                <h1 class="text-lg font-semibold">
                    なぜ？
                </h1>
                <hr class="w-full">
                <p class="mt-4 whitespace-pre-line">
                    {{$episode->why}}
                </p>
            </div>
        </div>

        <div class="bg-yellow-100 w-full rounded-2xl">
            <div class="mt-4 p-4">
                <h1 class="text-lg font-semibold">
                    どのように？
                </h1>
                <hr class="w-full">
                <p class="mt-4 whitespace-pre-line">
                    {{$episode->how}}
                </p>
            </div>
        </div>

        <div class="bg-yellow-100 w-full rounded-2xl">
            <div class="mt-4 p-4">
                <h1 class="text-lg font-semibold">
                    面白ポイント
                </h1>
                <hr class="w-full">
                <p class="mt-4 whitespace-pre-line">
                    {{$episode->point}}
                </p>
            </div>
        </div>

        <div class="bg-yellow-100 w-full rounded-2xl">
            <div class="mt-4 p-4">
                <h1 class="text-lg font-semibold">
                    起
                </h1>
                <hr class="w-full">
                <p class="mt-4 whitespace-pre-line">
                    {{$episode->beginning}}
                </p>
            </div>
        </div>

        <div class="bg-yellow-100 w-full rounded-2xl">
            <div class="mt-4 p-4">
                <h1 class="text-lg font-semibold">
                    承
                </h1>
                <hr class="w-full">
                <p class="mt-4 whitespace-pre-line">
                    {{$episode->development}}
                </p>
            </div>
        </div>

        <div class="bg-yellow-100 w-full rounded-2xl">
            <div class="mt-4 p-4">
                <h1 class="text-lg font-semibold">
                    転
                </h1>
                <hr class="w-full">
                <p class="mt-4 whitespace-pre-line">
                    {{$episode->turnand}}
                </p>
            </div>
        </div>

        <div class="bg-yellow-100 w-full rounded-2xl">
            <div class="mt-4 p-4">
                <h1 class="text-lg font-semibold">
                    結
                </h1>
                <hr class="w-full">
                <p class="mt-4 whitespace-pre-line">
                    {{$episode->conclusion}}
                </p>
            </div>
        </div>

    </div>
</x-app-layout>