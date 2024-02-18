<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            個別表示
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        <div class="bg-white w-full rounded-2xl">
            <h1 class="text-lg font-semibold">
                {{$episode->title}}
            </h1>
            <hr class="w-full">
            <p class="mt-4 whitespace-pre-line">
                {{$episode->episode}}
            </p>
            <div class="text-sm font-semibold flex flex-row-reverse">
                <p> {{$episode->created_at}}</p>
            </div>
        </div>
    </div>
</x-app-layout>