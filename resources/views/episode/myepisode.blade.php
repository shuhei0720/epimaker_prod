<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold leading-tight text-2xl leading-tight bg-gradient-to-r from-pink-500 via-blue-500 to-green-500 bg-clip-text text-transparent">
            すべらない話一覧
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        @if(session('message'))
        <div class="text-red-600 font-bold">
            {{session('message')}}
        </div>
        @endif
        @foreach($episodes as $episode)
        <div class="mt-4 p-8 bg-yellow-200 w-full rounded-2xl shadow-lg hover:shadow-2xl transition duration-500"">
            <h1 class="p-4 text-lg font-semibold bg-white border border-gray-400">
                タイトル：
                <a href="{{route('episode.show', $episode)}}" class="text-blue-600">
                {{$episode->title}}
                </a>
            </h1>
            <hr class="w-full">
            <p class="mt-4 p-4 bg-white border border-gray-400">
                {{$episode->episode}}
            </p>
            <div class="p-4 text-sm font-semibold  bg-white border border-gray-400">
                <p>
                    作成者：{{$episode->user->name??'匿名'}} &emsp;  &emsp; {{$episode->created_at->diffForHumans()}}
                </p>
            </div>
            <hr class="w-full mb-2">
            @if($episode->comments->count())
            <span class="badge">
                返信 {{$episode->comments->count()}}件
            </span>
            @else
            <span>コメントはまだありません。</span>
            @endif
            <a href="{{route('episode.show', $episode)}}" style="color.white;">
                <x-primary-button class="float-right">コメントする</x-primary-button>
            </a>
        </div>
        @endforeach
        <div class="mb-4">
            {{ $episodes->links() }}
        </div>
    </div>
</x-app-layout>