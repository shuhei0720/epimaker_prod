<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold  text-2xl leading-tight bg-gradient-to-r from-pink-500 via-blue-500 to-green-500 bg-clip-text text-transparent leading-tight">
            エピソード詳細画面
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        <div class="bg-gray-50 w-full rounded-2xl shadow-lg hover:shadow-2xl transition duration-500">
            <div class="mt-4 p-4">
                <div class="rounded-full w-12 h-12 mb-2 overflow-hidden">
                    {{-- アバター表示 --}}
                    <img src="{{asset('storage/avatar/'.($episode->user->avatar??'user_default.jpg'))}}" class="object-cover w-full h-full">
                </div>
                <h1 class="text-xl text-red-700 font-semibold">
                    {{$episode->title}}
                </h1>
                <div class="text-right flex">
                    @if(Auth::check() && $episode->user_id == Auth::user()->id)
                        @if($episode->flag && $episode->flag->flag == 1)
                            <form action="{{ route('episodes.toggleVisibility', $episode->id) }}" method="POST" class="flex flex-1 mb-2" style="margin: 0 0 0 auto">
                                @csrf
                                @method('PUT')
                                <x-primary-button class="bg-red-700 ml-2">非公開にする</x-primary-button>
                            </form>
                        @else
                            <form action="{{ route('episodes.toggleVisibility', $episode->id) }}" method="POST" class="flex flex-1 mb-2" style="margin: 0 0 0 auto">
                                @csrf
                                @method('PUT')
                                <x-primary-button class="bg-sky-700 ml-2">公開する</x-primary-button>
                            </form>
                        @endif
                    @endif
                    @can('update', $episode)
                    <a href="{{route('episode.edit', $episode)}}" class="flex-1">
                        <x-primary-button>
                            編集
                        </x-primary-button>
                    </a>
                    @endcan

                    @can ('delete', $episode)
                    <form method="post" action="{{route('episode.destroy', $episode)}}" class="flex-2" style="margin: 0 0 0 auto">
                        @csrf
                        @method('delete')
                        <x-primary-button class="bg-red-700 ml-2">
                            削除
                        </x-primary-button>
                    </form>
                    @endcan
                </div>
                <hr class="w-full">
                <p class="mt-4 whitespace-pre-line">
                    {{$episode->episode}}
                </p>
                <div class="text-sm font-semibold flex flex-row-reverse">
                    <p> {{ $episode->user->name??'削除されたユーザー' }}・{{$episode->created_at->diffForHumans()}}</p>
                </div>
            </div>
        </div>

        <span>
            <!-- もし$niceがあれば＝ユーザーが「いいね」をしていたら -->
            @if($nice)
            <!-- 「いいね」取消用ボタンを表示 -->
                <a href="{{ route('unnice', $episode) }}" class="btn btn-success btn-sm flex">
                    <img src="{{asset('img/nicebutton.png')}}" width="30px">
                    <!-- 「いいね」の数を表示 -->
                    <span class="text-lg">
                        {{ $episode->nices->count() }}
                    </span>
                </a>
            @else
            <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
                <a href="{{ route('nice', $episode) }}" class="btn btn-secondary btn-sm flex">
                    <img src="{{asset('img/unnicebutton.png')}}" width="30px">
                    <!-- 「いいね」の数を表示 -->
                    <span class="text-lg">
                        {{ $episode->nices->count() }}
                    </span>
                </a>
            @endif
        </span>

        @foreach($episode->comments as $comment)
        <div class="bg-white w-full rounded-2xl px-10 shadow-lg mt-8 whitespace-pre-line">
            {{$comment->body}}
            <div class="text-sm font-semibold flex flex-row-reverse">
                @if(Auth::check() && Auth::user()->id === $comment->user_id)
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-primary-button class="bg-red-700 w-30 h-7 min-w-min">
                            <div class="inline-block">削除する</div>
                        </x-primary-button>
                    </form>
                @endif
                <p class="mr-4 pt-4">&nbsp &nbsp{{$comment->user->name??'削除されたユーザー'}}<br>&nbsp &nbsp{{$comment->created_at->diffForHumans()}}</p>
                <span class="rounded-full w-12 h-12">
                    <img src="{{asset('storage/avatar/'.($comment->user->avatar??'user_default.jpg'))}}" class="object-cover w-full h-full">
                </span>
            </div>
        </div>
        @endforeach

        <div class="mt-4 mb-12">
            <form method="post" action="{{route('comment.store')}}">
            @csrf
                <input type="hidden" name='episode_id' value="{{$episode->id}}">
                <textarea name="body" class="bg-white w-full rounded-2xl px-4 mt-4 py-4 shadow-lg hover:shadow-2xl transition duration-500" id="body" cols="30" rows="3" placeholder="コメントを入力してください">{{old('body')}}</textarea>
                <x-primary-button class="float-right mr-4 mb-12">コメントする</x-primary-button>
            </form>
        </div>

        <div class="bg-gray-100 w-full rounded-2xl shadow-lg hover:shadow-2xl transition duration-500">
            <div class="mt-4 p-4">
                <h1 class="text-lg font-semibold">
                    エピソード詳細
                </h1>
                <hr class="w-full">
                <p class="mt-4 whitespace-pre-line">
                    いつ？ : {{$episode->when}}<br>
                    どこで？：{{$episode->where}}<br>
                    だれが？：{{$episode->who}}<br>
                    なにを？：{{$episode->what}}<br>
                    どうした？：{{$episode->do}}<br>
                    なぜ？：{{$episode->why}}<br>
                    どうやって？：{{$episode->how}}<br>
                    ポイント：{{$episode->point}}<br>
                    起：{{$episode->beginning}}<br>
                    承：{{$episode->development}}<br>
                    転：{{$episode->turnand}}<br>
                    結：{{$episode->conclusion}}<br>
                </p>
            </div>
        </div>
    </div>
</x-app-layout>