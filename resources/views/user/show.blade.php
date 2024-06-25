<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold leading-tight text-2xl leading-tight bg-gradient-to-r from-pink-500 via-blue-500 to-green-500 bg-clip-text text-transparent">
            {{ $user->name }} のプロフィール
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="flex items-center mb-4">
                        <div class="rounded-full w-20 h-20 overflow-hidden mr-4">
                            <img src="{{ asset('storage/avatar/' . ($user->avatar ?? 'user_default.jpg')) }}" class="object-cover w-full h-full">
                        </div>
                        <div>
                            <h1 class="text-3xl">{{ $user->name }}</h1>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="whitespace-pre-line">{{ $user->bio ?? '自己紹介がありません。' }}</p>
                    </div>
                    @if ($isOwner)
                        <a href="{{ route('profile.edit') }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">
                            アカウント編集
                        </a>
                    @endif
                </div>
            </div>

            <div class="bg-white shadow sm:rounded-lg">
                <nav class="flex justify-between border-b">
                    <button id="tab-episodes" class="tab-button w-1/3 py-4 text-center" onclick="showTab('episodes')">全ての投稿</button>
                    <button id="tab-liked" class="tab-button w-1/3 py-4 text-center" onclick="showTab('liked')">いいねした投稿</button>
                    <button id="tab-comments" class="tab-button w-1/3 py-4 text-center" onclick="showTab('comments')">コメントした投稿</button>
                </nav>
                <div id="content-episodes" class="p-4">
                    @include('partials.episodes', ['episodes' => $episodes])
                </div>
                <div id="content-liked" class="p-4 hidden">
                    @include('partials.episodes', ['episodes' => $likedEpisodes])
                </div>
                <div id="content-comments" class="p-4 hidden">
                    @include('partials.episodes', ['episodes' => $commentedEpisodes])
                </div>
            </div>
        </div>
    </div>

    <script>
        function showTab(tab) {
            document.getElementById('content-episodes').classList.add('hidden');
            document.getElementById('content-liked').classList.add('hidden');
            document.getElementById('content-comments').classList.add('hidden');

            document.getElementById('tab-episodes').classList.remove('active-tab');
            document.getElementById('tab-liked').classList.remove('active-tab');
            document.getElementById('tab-comments').classList.remove('active-tab');

            document.getElementById('content-' + tab).classList.remove('hidden');
            document.getElementById('tab-' + tab).classList.add('active-tab');
        }

        // 初期表示
        showTab('episodes');
    </script>

    <style>
        .tab-button {
            border-right: 1px solid #ccc;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
            background-color: #f8f8f8;
            flex-grow: 1;
            text-align: center;
        }
        .tab-button:last-child {
            border-right: none;
        }
        .active-tab {
            color: white;
            background-color: #3490dc;
            border-bottom: none;
        }
    </style>
</x-app-layout>