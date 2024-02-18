<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            すべらない話一覧
        </h2>
    </x-slot>
    <div class="mx-auto px-6">
        @foreach($episodes as $episode)
        <div class="mt-4 p-8 bg-white w-full rounded-2xl">
            <h1 class="p-4 text-lg font-semibold">
                {{$episode->title}}
            </h1>
            <hr class="w-full">
            <p class="mt-4 p-4">
                {{$episode->episode}}
            </p>
            <div class="p-4 text-sm font-semibold">
                <p>
                    {{$episode->created_at}}
                </p>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>