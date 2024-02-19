<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold  text-2xl leading-tight bg-gradient-to-r from-pink-500 via-blue-500 to-green-500 bg-clip-text text-transparent leading-tight">
            すべらない話個別表示
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        <div class="bg-yellow-100 w-full rounded-2xl shadow-lg hover:shadow-2xl transition duration-500"">
            <div class="mt-4 p-4">
                <h1 class="text-xl text-red-700 font-semibold">
                    {{$episode->title}}
                </h1>
                <div class="text-right flex">
                    <a href="{{route('episode.edit', $episode)}}" class="flex-1">
                        <x-primary-button>
                            編集
                        </x-primary-button>
                    </a>

                    <form method="post" action="{{route('episode.destroy', $episode)}}" class="flex-2">
                        @csrf
                        @method('delete')
                        <x-primary-button class="bg-red-700 ml-2">
                            削除
                        </x-primary-button>
                    </form>
                </div>
                <hr class="w-full">
                <p class="mt-4 whitespace-pre-line">
                    {{$episode->episode}}
                </p>
                <div class="text-sm font-semibold flex flex-row-reverse">
                    <p> {{$episode->user->name}}・{{$episode->created_at->diffForHumans()}}</p>
                </div>
            </div>
        </div>

        @foreach($episode->comments as $comment)
        <div class="bg-white w-full rounded-2xl px-10 py-2 shadow-lg mt-8 whitespace-pre-line">
            {{$comment->body}}
            <div class="text-sm font-semibold flex flex-row-reverse">
                <p>{{$comment->user->name}}・{{$comment->created_at->diffForHumans()}}</p>
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

        <div class="bg-sky-200 w-full rounded-2xl shadow-lg hover:shadow-2xl transition duration-500"">
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

        <div class="bg-sky-200 w-full rounded-2xl shadow-lg hover:shadow-2xl transition duration-500"">
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

        <div class="bg-sky-200 w-full rounded-2xl shadow-lg hover:shadow-2xl transition duration-500"">
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

        <div class="bg-sky-200 w-full rounded-2xl shadow-lg hover:shadow-2xl transition duration-500"">
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

        <div class="bg-sky-200 w-full rounded-2xl shadow-lg hover:shadow-2xl transition duration-500"">
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

        <div class="bg-sky-200 w-full rounded-2xl shadow-lg hover:shadow-2xl transition duration-500"">
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

        <div class="bg-sky-200 w-full rounded-2xl shadow-lg hover:shadow-2xl transition duration-500"">
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

        <div class="bg-sky-200 w-full rounded-2xl shadow-lg hover:shadow-2xl transition duration-500"">
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

        <div class="bg-sky-200 w-full rounded-2xl shadow-lg hover:shadow-2xl transition duration-500"">
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

        <div class="bg-sky-200 w-full rounded-2xl shadow-lg hover:shadow-2xl transition duration-500"">
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

        <div class="bg-sky-200 w-full rounded-2xl shadow-lg hover:shadow-2xl transition duration-500"">
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

        <div class="bg-sky-200 w-full rounded-2xl shadow-lg hover:shadow-2xl transition duration-500"">
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