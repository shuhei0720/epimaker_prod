<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold leading-tight text-2xl leading-tight bg-gradient-to-r from-pink-500 via-blue-500 to-green-500 bg-clip-text text-transparent">
            コメントしたエピソード一覧
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        @if(session('message'))
        <div class="text-red-600 font-bold">
            {{session('message')}}
        </div>
        @endif
        @if(count($comments)==0)
        <p class="mt-4">
            まだコメントした投稿がありません！
        </p>
        @else
        @foreach($comments->unique('episode_id') as $comment)
        @php
            //コメントした投稿
            $episode=$comment->episode;
        @endphp
        <div class="mt-4 p-8 bg-yellow-200 w-full rounded-2xl shadow-lg hover:shadow-2xl transition duration-500">
            <div class="rounded-full w-12 h-12 mb-1 overflow-hidden">
                {{-- アバター表示 --}}
                <img src="{{asset('storage/avatar/'.($episode->user->avatar??'user_default.jpg'))}}" class="object-cover w-full h-full">
            </div>
            <h1 class="p-3 font-semibold bg-white border border-gray-400 rounded-2xl">
                タイトル：
                <a href="{{route('episode.show', $episode)}}" class="text-blue-600">
                {{$episode->title}}
                </a>
            </h1>
            <hr class="w-full">
            <p class="mt-2 p-4 bg-white border border-gray-400 text-sm md:text-lg rounded-sm" style="padding-top: 0; white-space: pre-line;">
                {{$episode->episode}}
            </p>
            <div class="p-3 text-sm font-semibold  bg-white border border-gray-400">
                <p>
                    作成者：{{$episode->user->name??'削除されたユーザー'}} &emsp;  &emsp; {{$episode->created_at->diffForHumans()}}
                </p>
            </div>
            <span style="display: flex; align-items: center;">
                <!-- もしユーザーがログインしていて、かつそのユーザーが「いいね」している場合 -->
                @auth
                    @if ($episode->nices->contains('user_id', auth()->id()))
                        <!-- 「いいね」取消用ボタンを表示 -->
                        <a href="{{ route('unnice', $episode) }}" class="btn btn-success btn-sm flex">
                            <img src="{{ asset('img/nicebutton.png') }}" alt="Nice Button" width="30px">
                        </a>
                    @else
                        <!-- ユーザーが「いいね」をしていない場合、「いいね」ボタンを表示 -->
                        <a href="{{ route('nice', $episode) }}" class="btn btn-secondary btn-sm flex">
                            <img src="{{ asset('img/unnicebutton.png') }}" alt="Unnice Button" width="30px">
                        </a>
                    @endif
                @endauth

                <!-- すべてのユーザーの「いいね」の合計数を表示 -->
                <span class="text-lg" style="margin-right: 10px;">
                    {{ $episode->nices()->count() }}
                </span>

            </span>
            <hr class="w-full mb-2">
            @if($episode->comments->count())
            <span class="badge">
                返信 {{$episode->comments->count()}}件
            </span>
            @else
            <span>コメントはまだありません。</span>
            @endif
            <a href="{{route('episode.show', $episode)}}" style="color:white; display: inline-block;">
                <x-primary-button style="margin-left: 10px;">コメントする</x-primary-button>
            </a>
        </div>
        @endforeach
        <div class="mb-4">
            {{ $comments->links() }}
        </div>
        @endif
    </div>
</x-app-layout>