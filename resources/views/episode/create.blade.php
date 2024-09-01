<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight bg-gradient-to-r from-pink-500 via-blue-500 to-green-500 bg-clip-text text-transparent">
            エピソード作成画面
        </h2>
        <div class="mt-1 max-w-7xl mx-auto px-6" style="display: flex; justify-content: flex-left; padding-top: 20px;">
            <x-primary-button id="generate-btn">
                AIで生成
            </x-primary-button>
            <span style="margin-left: 10px; font-size: 22px;">🌟 5W1H1Dの入力を反映して、&nbsp;AI生成できます🌟</span>
        </div>
    </x-slot>
    <div class="mt-1 max-w-7xl mx-auto px-6 bg-gray-50">
        <x-message :message="session('message')" />
        <form id="episode-form" method="post" action="{{ route('episode.store') }}">
            @csrf
            <div class="w-full flex flex-col">
                <p class="font-semibold mt-4 text-green-600 text-lg ">※個人名などは抽象的な表現にしてください。【例】同級生の田中（偽名）くん</p>
                <label for="title" class="font-semibold mt-4 text-blue-800 text-lg ">■タイトル(必須)<br><br>(遊び、ニュース、季節、友達、旅、健康、仕事、学校、家族、恋人、住居、食事、etc...)</label>
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                <input type="text" name="title" class="w-auto py-2 border border-gray-400 rounded-md shadow-lg hover:shadow-2xl transition duration-500" id="title">
                <value="{{old('title')}}">
            </div>
            <p class="text-green-600 mt-2">【例】調子乗りの友達</p>

            <div class="w-full flex flex-col">
                <label for="when" class="font-semibold mt-4 text-blue-800 text-lg">■5W1H1Dに整理する<br><br>1.いつ？</label>
                <input type="text" name="when" class="w-auto py-2 border border-gray-400 rounded-md shadow-lg hover:shadow-2xl transition duration-500" id="when">
            </div>
            <p class="text-green-600 mt-2">【例】小学校の掃除時間</p>

            <div class="w-full flex flex-col">
                <label for="where" class="font-semibold mt-4 text-blue-800 text-lg">2.どこで？</label>
                <input type="text" name="where" class="w-auto py-2 border border-gray-400 rounded-md shadow-lg hover:shadow-2xl transition duration-500" id="where">
            </div>
            <p class="text-green-600 mt-2">【例】教室で</p>

            <div class="w-full flex flex-col">
                <label for="who" class="font-semibold mt-4 text-blue-800 text-lg">3.だれが？</label>
                <input type="text" name="who" class="w-auto py-2 border border-gray-400 rounded-md" id="who">
            </div>
            <p class="text-green-600 mt-2">【例】トイレットペーパーを全身に巻いた友達が</p>

            <div class="w-full flex flex-col">
                <label for="what" class="font-semibold mt-4 text-blue-800 text-lg">4.なにを？</label>
                <input type="text" name="what" class="w-auto py-2 border border-gray-400 rounded-md shadow-lg hover:shadow-2xl transition duration-500" id="what">
            </div>
            <p class="text-green-600 mt-2">【例】先生を</p>

            <div class="w-full flex flex-col">
                <label for="do" class="font-semibold mt-4 text-blue-800 text-lg">5.どうした？</label>
                <input type="text" name="do" class="w-auto py-2 border border-gray-400 rounded-md shadow-lg hover:shadow-2xl transition duration-500" id="do">
            </div>
            <p class="text-green-600 mt-2">【例】怒らせた</p>

            <div class="w-full flex flex-col">
                <label for="why" class="font-semibold mt-4 text-blue-800 text-lg">6.なぜ？</label>
                <input type="text" name="why" class="w-auto py-2 border border-gray-400 rounded-md shadow-lg hover:shadow-2xl transition duration-500" id="why">
            </div>
            <p class="text-green-600 mt-2">【例】間違って先生を驚かしたから</p>

            <div class="w-full flex flex-col">
                <label for="how" class="font-semibold mt-4 text-blue-800 text-lg">7.どのように？</label>
                <input type="text" name="how" class="w-auto py-2 border border-gray-400 rounded-md shadow-lg hover:shadow-2xl transition duration-500" id="how">
            </div>
            <p class="text-green-600 mt-2">【例】掃除用具入れから飛び出してきて</p>

            <div class="w-full flex flex-col">
                <label for="point" class="font-semibold mt-4 text-blue-800 text-lg">8.この話で一番共感してほしい、面白ポイントは？</label>
                <input type="text" name="point" class="w-auto py-2 border border-gray-400 rounded-md shadow-lg hover:shadow-2xl transition duration-500" id="point">
            </div>
            <p class="text-green-600 mt-2">【例】友達が調子に乗って、罰が当たるところ</p>

            
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

                // Add event listener to each specified input for input event
                specifiedInputs.forEach(input => {
                    input.addEventListener('input', updateResult);
                });
            </script>

            <div class="w-full flex flex-col">
                <label for="beginning" class="font-semibold mt-4 text-blue-800 text-lg">■起承転結にまとめて、フリとオチを作る<br><br>9.起(フリ：導入)</label>
                <textarea name="beginning" class="w-auto py-2 border border-gray-400 rounded-md shadow-lg hover:shadow-2xl transition duration-500" id="beginning" cols="30" rows="2"></textarea>
            </div>
            <p class="text-green-600 mt-2">【例】小学生のころ、すごく調子乗りな友達がいた。</p>

            <div class="w-full flex flex-col">
                <label for="development" class="font-semibold mt-4 text-blue-800 text-lg">10.承(フリ：起の情報を深める)</label>
                <textarea name="development" class="w-auto py-2 border border-gray-400 rounded-md shadow-lg hover:shadow-2xl transition duration-500" id="development" cols="30" rows="2"></textarea>
            </div>
            <p class="text-green-600 mt-2">【例】「女子だけ体育館に集合」ってときに、こっそりついて行って怒られるようなお調子者だった。</p>

            <div class="w-full flex flex-col">
                <label for="turnand" class="font-semibold mt-4 text-blue-800 text-lg">11.転(フリ：話の山場。聞き手の興味関心を惹く)</label>
                <textarea name="turnand" class="w-auto py-2 border border-gray-400 rounded-md shadow-lg hover:shadow-2xl transition duration-500" id="turnand" cols="30" rows="2"></textarea>
            </div>
            <p class="text-green-600 mt-2">【例】ある日の掃除時間、その友達はトイレットペーパーを全身に巻いて掃除用具入れに隠れていた。何も知らない先生がやってきて掃除用具入れを開けた。</p>

            <div class="w-full flex flex-col">
                <label for="conclusion" class="font-semibold mt-4 text-blue-800 text-lg">12.結(オチ：最終的にどうなったか)</label>
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
            <p class="text-green-600">※下記エピソードの内容をクリアして反映します。</p>

            <div class="w-full flex flex-col" style="white-space: pre-line;">
                <label for="episode" class="font-semibold mt-4 text-blue-800 text-lg">■足りない所を補足して完成！（必須）</label>
                <x-input-error :messages="$errors->get('episode')" class="mt-2" />
                <textarea name="episode" class="w-auto py-2 border border-gray-400 rounded-md shadow-lg hover:shadow-2xl transition duration-500" id="episode" cols="30" rows="10"></textarea>
                <value="{{old('episode')}}">
            </div>

            <div class>
                <label for="status">公開状態:</label>
                <select id="status" name="status">
                    <option value="0">非公開</option>
                    <option value="1" selected>公開</option>
                </select>
            </div>

            <div style="display: flex; align-items: center;">
                <x-primary-button class="mt-4 bg-red-700" style="margin-bottom: 20px;">
                    投稿する
                </x-primary-button>
                <span id="title-required-warning" style="color: red; margin-left: 10px; display: flex; align-items: center;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01m-6.938 4h13.856c1.105 0 2-.895 2-2.001V6.001c0-1.106-.895-2.001-2-2.001H5.062c-1.105 0-2 .895-2 2.001v13.998c0 1.106.895 2.001 2 2.001z" />
                    </svg>
                    タイトルを入力してください。
                </span>
            </div>
        </form>
    </div>

    <script>
        // モデルの設定
        const model = 'gpt-3.5-turbo-instruct';

        // APIキーの取得（直接埋め込む）
        const apiKey = "{{ env('OPENAI_API_KEY') }}";

        // エピソード生成関数
        async function generateEpisode() {
            const generateBtn = document.getElementById('generate-btn');
            generateBtn.textContent = '生成中...';
            generateBtn.disabled = true;
            const inputs = ['when', 'where', 'who', 'what', 'do', 'why', 'how', 'point'];
            const values = inputs.map(inputName => document.getElementById(inputName).value);

            // プロンプトの構成
            const prompt = `「${values[0]}${values[1]}${values[2]}${values[3]}${values[4]}。${values[5]}。${values[6]}。」というエピソードがあります。このエピソードを、300文字以内でフリとオチのある面白いエピソードに清書して、冷静に披露してください！※フリ、オチという文言は含めず、話し手などは省いて本文のみ生成してください。`;

            try {
                const response = await fetch('https://api.openai.com/v1/completions', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${apiKey}`
                    },
                    body: JSON.stringify({
                        model: model,
                        prompt: prompt,
                        max_tokens: 1500,
                        temperature: 0.7,
                        n: 1
                    })
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const data = await response.json();

                // データの整合性を確認
                if (data.choices && data.choices.length > 0) {
                    const episode = data.choices[0].text.trim();

                    // タイトルに「(AI作成)」を追加
                    const titleInput = document.getElementById('title');
                    titleInput.value = `${titleInput.value.trim()} (AI作成)`;

                    // エピソードテキストエリアにセット
                    document.getElementById('episode').value = episode;

                    // ポップアップメッセージ表示
                    alert('AI生成が完了しました。\nエピソード欄をご確認ください。');
                } else {
                    throw new Error('API response does not contain expected data.');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('エピソードの生成中にエラーが発生しました。');
            } finally {
                // ボタンの状態を元に戻す
                generateBtn.textContent = 'AIで生成';
                generateBtn.disabled = false;
            }
        }

        // AIで生成ボタンにクリックイベントを追加
        document.getElementById('generate-btn').addEventListener('click', generateEpisode);

        // タイトルの入力欄の参照
        const titleInput = document.getElementById('title');
        const titleWarning = document.getElementById('title-required-warning');

        // タイトルの入力イベントを監視して警告を非表示に
        titleInput.addEventListener('input', function() {
            if (titleInput.value.trim() !== '') {
                titleWarning.style.display = 'none';
            } else {
                titleWarning.style.display = 'flex';
            }
        });

        // 投稿ボタンにクリックイベントを追加
        document.querySelector('form').addEventListener('submit', function (event) {
            if (titleInput.value.trim() === '') {
                event.preventDefault();
                titleWarning.style.display = 'flex';
            } else {
                titleWarning.style.display = 'none';
            }
        });
    </script>
</x-app-layout>