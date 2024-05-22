<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl leading-tight bg-gradient-to-r from-pink-500 via-blue-500 to-green-500 bg-clip-text text-transparent">
            エピソード編集画面
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6 bg-gray-50">
        @if(session('message'))
            <div class="text-red-600 font-bold">
                {{session('message')}}
            </div>
        @endif
        <form method="post" action="{{ route('episode.update', $episode) }}">
            @csrf
            @method('patch')
            <div class="w-full flex flex-col">
            <p class="font-semibold mt-4 text-green-600 text-lg ">※個人名などは抽象的な表現にしてください。【例】同級生の田中（偽名）くん</p>
                <label for="title" class="font-semibold mt-4 text-blue-800 text-lg ">■タイトル(必須)<br><br></label>
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                <input type="text" name="title" class="w-auto py-2 border border-gray-400 rounded-md" id="title" value="{{old('title', $episode->title)}}">
            </div>
            <div class="w-full flex flex-col">
                <label for="when" class="font-semibold mt-4 text-blue-800 text-lg">■5W1H1Dに整理する<br><br>1.いつ？</label>
                <input type="text" name="when" class="w-auto py-2 border border-gray-400 rounded-md" id="when" value="{{ old('when', $episode->when) }}">
            </div>

            <div class="w-full flex flex-col">
                <label for="where" class="font-semibold mt-4 text-blue-800 text-lg">2.どこで？</label>
                <input type="text" name="where" class="w-auto py-2 border border-gray-400 rounded-md" id="where" value="{{ old('where', $episode->where) }}">
            </div>

            <div class="w-full flex flex-col">
                <label for="who" class="font-semibold mt-4 text-blue-800 text-lg">3.だれが？</label>
                <input type="text" name="who" class="w-auto py-2 border border-gray-400 rounded-md" id="who" value="{{ old('who', $episode->who) }}">
            </div>

            <div class="w-full flex flex-col">
                <label for="what" class="font-semibold mt-4 text-blue-800 text-lg">4.なにを？</label>
                <input type="text" name="what" class="w-auto py-2 border border-gray-400 rounded-md" id="what" value="{{ old('what', $episode->what) }}">
            </div>

            <div class="w-full flex flex-col">
                <label for="do" class="font-semibold mt-4 text-blue-800 text-lg">5.どうした？</label>
                <input type="text" name="do" class="w-auto py-2 border border-gray-400 rounded-md" id="do" value="{{ old('do', $episode->do) }}">
            </div>

            <div class="w-full flex flex-col">
                <label for="why" class="font-semibold mt-4 text-blue-800 text-lg">6.なぜ？</label>
                <input type="text" name="why" class="w-auto py-2 border border-gray-400 rounded-md" id="why" value="{{ old('why', $episode->why) }}">
            </div>

            <div class="w-full flex flex-col">
                <label for="how" class="font-semibold mt-4 text-blue-800 text-lg">7.どのように？</label>
                <input type="text" name="how" class="w-auto py-2 border border-gray-400 rounded-md" id="how" value="{{ old('how', $episode->how) }}">
            </div>

            <div class="w-full flex flex-col">
                <label for="point" class="font-semibold mt-4 text-blue-800 text-lg">8.この話で一番共感してほしい、面白ポイントは？</label>
                <input type="text" name="point" class="w-auto py-2 border border-gray-400 rounded-md" id="point" value="{{ old('point', $episode->point) }}">
            </div>

            <div id="result" class="mt-4 text-lg text-red-700" style="border: 1px solid black; padding: 10px;"></div>

            <script>
                // Get specified input elements
                const specifiedInputs = document.querySelectorAll('#when, #where, #who, #what, #do, #why, #how');

                // Function to update result
                function updateResult() {
                    const resultDiv = document.getElementById('result');
                    const values = [];
                    specifiedInputs.forEach(input => {
                        values.push(input.value);
                    });
                    // Join values with commas, filtering out empty values
                    resultDiv.textContent = values.filter(value => value.trim() !== '').join('、');
                }

                // Call updateResult() initially
                updateResult();

                // Add event listener to each specified input for input event
                specifiedInputs.forEach(input => {
                    input.addEventListener('input', updateResult);
                });
            </script>

            <div class="w-full flex flex-col">
                <label for="beginning" class="font-semibold mt-4 text-blue-800 text-lg">■起承転結にまとめて、フリとオチを作る<br><br>9.起(フリ：導入)</label>
                <textarea name="beginning" class="w-auto py-2 border border-gray-400 rounded-md" id="beginning" cols="30" rows="2">{{old('beginning', $episode->beginning)}}</textarea>
            </div>

            <div class="w-full flex flex-col">
                <label for="development" class="font-semibold mt-4 text-blue-800 text-lg">10.承(フリ：起の情報を深める)</label>
                <textarea name="development" class="w-auto py-2 border border-gray-400 rounded-md" id="development" cols="30" rows="2">{{old('development', $episode->development)}}</textarea>
            </div>

            <div class="w-full flex flex-col">
                <label for="turnand" class="font-semibold mt-4 text-blue-800 text-lg">11.転(フリ：話の山場。聞き手の興味関心を惹く)</label>
                <textarea name="turnand" class="w-auto py-2 border border-gray-400 rounded-md" id="turnand" cols="30" rows="2">{{old('turnand', $episode->turnand)}}</textarea>
            </div>

            <div class="w-full flex flex-col">
                <label for="conclusion" class="font-semibold mt-4 text-blue-800 text-lg">12.結(オチ：最終的にどうなったか)</label>
                <textarea name="conclusion" class="w-auto py-2 border border-gray-400 rounded-md" id="conclusion" cols="30" rows="2">{{old('conclusion', $episode->conclusion)}}</textarea>
            </div>

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
            <p class="text-green-600">※下記エピソードの内容をクリアして反映します。</p>

            <div class="w-full flex flex-col">
            <label for="episode" class="font-semibold mt-4 text-blue-800 text-lg">■足りない所を補足して完成！（必須）</label>
                <x-input-error :messages="$errors->get('episode')" class="mt-2" />
                <textarea name="episode" class="w-auto py-2 border border-gray-400 rounded-md" id="episode" cols="30" rows="10">{{old('episode', $episode->episode)}}</textarea>
            </div>

            <x-primary-button class="mt-4 bg-red-700" style="margin-bottom: 20px;">
                保存する
            </x-primary-button>
        </form>
    </div>
</x-app-layout>