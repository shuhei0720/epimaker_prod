<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold leading-tight text-xl leading-tight bg-gradient-to-r from-pink-500 via-blue-500 to-green-500 bg-clip-text text-transparent">
            みんなのエピソード一覧
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-0">
        @if(session('message'))
        <div class="text-red-600 font-bold">
            {{session('message')}}
        </div>
        @endif
        @if(count($episodes) == 0)
        <p class="mt-4">
            まだ投稿がありません！
        </p>
        @else
        @foreach($episodes as $episode)
        <div class="mt-4 p-8 bg-gray-50 w-full rounded-2xl shadow-lg hover:shadow-2xl transition duration-500">
            <div class="flex items-center mb-1">
                <div class="rounded-full w-12 h-12 overflow-hidden mr-4">
                    {{-- アバター表示 --}}
                    <a href="{{ route('user.show', $episode->user->id) }}">
                        <img src="{{ asset('storage/avatar/' . ($episode->user->avatar ?? 'user_default.jpg')) }}" class="object-cover w-full h-full">
                    </a>
                </div>
                <div>
                    <p class="text-sm font-semibold">
                        作成者：{{ $episode->user->name ?? '削除されたユーザー' }}
                        <img src="{{ $episode->user->badge_url }}" alt="Badge" class="inline-block w-8 h-8 ml-1" style="width: 30px; height: 30px;">
                    </p>
                    <p class="text-xs text-gray-500">
                        {{ $episode->created_at->diffForHumans() }}
                    </p>
                </div>
            </div>
            <div class="p-3 bg-white border border-gray-400 rounded-2xl">
                <h1 class="font-semibold title-header">
                    タイトル：
                    <a href="{{ route('episode.show', $episode) }}" class="text-blue-600 title-link">
                        {{$episode->title}}
                    </a>
                </h1>
                <hr class="w-full title-divider">
                <div class="episode-content mt-0 p-4 bg-white text-sm md:text-lg rounded-sm" style="padding-top: 0; white-space: pre-line;">
                    {{ \Illuminate\Support\Str::limit($episode->episode, 450, '...') }}
                    @if(strlen($episode->episode) > 450)
                        <span class="read-more" style="color: blue; cursor: pointer;">続きを読む</span>
                    @endif
                </div>
                <div class="full-episode-content mt-0 p-4 bg-white text-sm md:text-lg rounded-sm" style="display: none; padding-top: 0; white-space: pre-line;">
                    {{ $episode->episode }}
                </div>
                <hr class="w-full content-divider mt-4"> <!-- 追加 -->
                <div class="flex items-center justify-between mt-2">
                    <div class="flex items-center">
                        @auth
                            @if ($episode->nices->contains('user_id', auth()->id()))
                                <a href="{{ route('unnice', $episode) }}" class="btn btn-success btn-sm flex nice-button-margin">
                                    <img src="{{ asset('img/nicebutton.png') }}" alt="Nice Button" width="30px">
                                </a>
                            @else
                                <a href="{{ route('nice', $episode) }}" class="btn btn-secondary btn-sm flex nice-button-margin">
                                    <img src="{{ asset('img/unnicebutton.png') }}" alt="Unnice Button" width="30px">
                                </a>
                            @endif
                        @endauth
                        <span class="text-lg" style="margin-left: 7px;">
                            {{ $episode->nices()->count() }}
                        </span>
                    </div>
                    @if($episode->comments->count())
                    <span class="badge">
                        コメント {{ $episode->comments->count() }}件
                    </span>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
        <div class="mb-4">
            <nav class="flex justify-center" aria-label="Page navigation">
                <ul class="pagination">
                    {{ $episodes->links() }}
                </ul>
            </nav>
        </div>
        @endif
    </div>
</x-app-layout>

<style>
.title-header {
    margin-left: 1rem; /* タイトルの左側に余白を追加 */
}

.title-divider {
    margin-top: 0.5rem; /* タイトルとその下の線の間に余白を追加 */
}

.content-divider {
    margin-top: 0.5rem; /* エピソード本文と「いいね」および「コメント」の間に余白を追加 */
}

.nice-button-margin {
    margin-left: 10px; /* いいねボタンの左側に余白を追加 */
}

</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const readMoreElements = document.querySelectorAll('.read-more');
    
    readMoreElements.forEach(element => {
        element.addEventListener('click', function () {
            const episodeContent = element.parentElement;
            const fullContent = episodeContent.nextElementSibling;
            episodeContent.style.display = 'none';
            fullContent.style.display = 'block';
        });
    });
});
</script>