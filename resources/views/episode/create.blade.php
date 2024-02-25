<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl leading-tight bg-gradient-to-r from-pink-500 via-blue-500 to-green-500 bg-clip-text text-transparent">
            あなただけのすべらない話作成画面
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6 bg-yellow-200">
        <x-message :message="session('message')" />
        <form method="post" action="{{ route('episode.store') }}">
            @csrf
            <div class="w-full flex flex-col">
                <p class="font-semibold mt-4 text-red-600 text-lg ">※個人情報を入れないよう人名や地名などは抽象的な表現でかつ、聞き手がイメージできるような表現にしてください。【例】同級生の田中（偽名）くん</p>
                <label for="title" class="font-semibold mt-4 text-blue-800 text-lg ">■タイトルを考えよう！（エピソードを作ってから決めてもOK）<br><br>(遊び、ニュース、季節、友達、旅、健康、仕事、学校、家族、恋人、住居、食事、etc...)を思い返してみよう</label>
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                <input type="text" name="title" class="w-auto py-2 border border-gray-400 rounded-md shadow-lg hover:shadow-2xl transition duration-500" id="title">
                <value="{{old('title')}}">
            </div>
            <p class="text-green-600 mt-2">【例】調子乗りの友達</p>

            <div class="w-full flex flex-col">
                <label for="when" class="font-semibold mt-4 text-blue-800 text-lg">■出来事を5W1H1Dに整理してみよう！<br><br>いつ？</label>
                <input type="text" name="when" class="w-auto py-2 border border-gray-400 rounded-md shadow-lg hover:shadow-2xl transition duration-500" id="when">
            </div>
            <p class="text-green-600 mt-2">【例】小学校の掃除時間</p>

            <div class="w-full flex flex-col">
                <label for="where" class="font-semibold mt-4 text-blue-800 text-lg">どこで？</label>
                <input type="text" name="where" class="w-auto py-2 border border-gray-400 rounded-md shadow-lg hover:shadow-2xl transition duration-500" id="where">
            </div>
            <p class="text-green-600 mt-2">【例】教室で</p>

            <div class="w-full flex flex-col">
                <label for="who" class="font-semibold mt-4 text-blue-800 text-lg">だれが？</label>
                <input type="text" name="who" class="w-auto py-2 border border-gray-400 rounded-md" id="who">
            </div>
            <p class="text-green-600 mt-2">【例】トイレットペーパーを全身に巻いた友達が</p>

            <div class="w-full flex flex-col">
                <label for="what" class="font-semibold mt-4 text-blue-800 text-lg">なにを？</label>
                <input type="text" name="what" class="w-auto py-2 border border-gray-400 rounded-md shadow-lg hover:shadow-2xl transition duration-500" id="what">
            </div>
            <p class="text-green-600 mt-2">【例】先生を</p>

            <div class="w-full flex flex-col">
                <label for="do" class="font-semibold mt-4 text-blue-800 text-lg">どうした？</label>
                <input type="text" name="do" class="w-auto py-2 border border-gray-400 rounded-md shadow-lg hover:shadow-2xl transition duration-500" id="do">
            </div>
            <p class="text-green-600 mt-2">【例】怒らせた</p>

            <div class="w-full flex flex-col">
                <label for="why" class="font-semibold mt-4 text-blue-800 text-lg">なぜ？</label>
                <input type="text" name="why" class="w-auto py-2 border border-gray-400 rounded-md shadow-lg hover:shadow-2xl transition duration-500" id="why">
            </div>
            <p class="text-green-600 mt-2">【例】間違って先生を驚かしたから</p>

            <div class="w-full flex flex-col">
                <label for="how" class="font-semibold mt-4 text-blue-800 text-lg">どのように？</label>
                <input type="text" name="how" class="w-auto py-2 border border-gray-400 rounded-md shadow-lg hover:shadow-2xl transition duration-500" id="how">
            </div>
            <p class="text-green-600 mt-2">【例】掃除用具入れから飛び出してきて</p>

            <div class="w-full flex flex-col">
                <label for="point" class="font-semibold mt-4 text-blue-800 text-lg">この話で一番共感してほしい、または、一番面白いポイントは？</label>
                <input type="text" name="point" class="w-auto py-2 border border-gray-400 rounded-md shadow-lg hover:shadow-2xl transition duration-500" id="point">
            </div>
            <p class="text-green-600 mt-2">【例】掃除をサボって遊んでいた友達、しかも全身にトイレットペーパーを巻いてフザけるような調子乗りな奴だから、先生に怒られても自業自得だ！</p>

            <div class="w-full flex flex-col">
                <label for="beginning" class="font-semibold mt-4 text-blue-800 text-lg">■起承転結にまとめて、フリとオチを作ってみよう！<br><br>起(導入)</label>
                <textarea name="beginning" class="w-auto py-2 border border-gray-400 rounded-md shadow-lg hover:shadow-2xl transition duration-500" id="beginning" cols="30" rows="2"></textarea>
            </div>
            <p class="text-green-600 mt-2">【例】小学生のころ、すごく調子乗りな友達がいた。</p>

            <div class="w-full flex flex-col">
                <label for="development" class="font-semibold mt-4 text-blue-800 text-lg">承(起の情報を深める)</label>
                <textarea name="development" class="w-auto py-2 border border-gray-400 rounded-md shadow-lg hover:shadow-2xl transition duration-500" id="development" cols="30" rows="2"></textarea>
            </div>
            <p class="text-green-600 mt-2">【例】保健の時間に「女子だけ体育館に集合」とかってときに、こっそりついて行って怒られるような奴。</p>

            <div class="w-full flex flex-col">
                <label for="turnand" class="font-semibold mt-4 text-blue-800 text-lg">転(話の山場。聞き手の興味関心を惹く)</label>
                <textarea name="turnand" class="w-auto py-2 border border-gray-400 rounded-md shadow-lg hover:shadow-2xl transition duration-500" id="turnand" cols="30" rows="2"></textarea>
            </div>
            <p class="text-green-600 mt-2">【例】ある日の掃除時間、その友達は掃除をサボって、掃除用具入れに隠れていた。しかもトイレットペーパーを全身に巻いて。そこへ何も知らない先生がやってきて掃除用具棚のドアを開けた</p>

            <div class="w-full flex flex-col">
                <label for="conclusion" class="font-semibold mt-4 text-blue-800 text-lg">結(話のオチ。最終的にどうなったか)</label>
                <textarea name="conclusion" class="w-auto py-2 border border-gray-400 rounded-md shadow-lg hover:shadow-2xl transition duration-500" id="conclusion" cols="30" rows="2"></textarea>
            </div>
            <p class="text-green-600 mt-2">【例】するとその友達が飛び出してきて、先生ビックリ！友達はこっぴどく怒られた。</p>

            <script>
                function copyTextToEpisode() {
                    // development、turnand、conclusionのテキストを取得
                    var beginningText = document.getElementById('beginning').value;
                    var developmentText = document.getElementById('development').value;
                    var turnandText = document.getElementById('turnand').value;
                    var conclusionText = document.getElementById('conclusion').value;

                    // 結合してepisodeのテキストエリアにコピー
                    var episodeTextarea = document.getElementById('episode');
                    episodeTextarea.value = beginningText + "\n" + developmentText + "\n" + turnandText + "\n" + conclusionText;
                }
            </script>

            <!-- コピーするボタン -->
            <x-primary-button class="mt-4 bg-red-700" type="button" onclick="copyTextToEpisode()">起承転結の内容を反映</x-primary-button>
            <p class="text-red-700">※下記エピソードの内容をクリアして反映します。</p>

            <div class="w-full flex flex-col" style="white-space: pre-line;">
                <label for="episode" class="font-semibold mt-4 text-blue-800 text-lg">■起承転結をつなげて足りない分を補足し、より面白くなるよう脚色したら完成！(すべて実話でなくて構いません)<br>比喩や擬態法も入れてみよう(こっそり、びっくり、まるで～など)</label>
                <x-input-error :messages="$errors->get('episode')" class="mt-2" />
                <textarea name="episode" class="w-auto py-2 border border-gray-400 rounded-md shadow-lg hover:shadow-2xl transition duration-500" id="episode" cols="30" rows="10"></textarea>
                <value="{{old('episode')}}">
            </div>

            <div class>
                <label for="status">公開状態:</label>
                <select id="status" name="status">
                    <option value="0">非公開</option>
                    <option value="1">公開</option>
                </select>
            </div>

            <x-primary-button class="mt-4 bg-red-700">
                投稿する！
            </x-primary-button>
        </form>
    </div>
</x-app-layout>