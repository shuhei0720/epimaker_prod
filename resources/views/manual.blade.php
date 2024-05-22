<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold leading-tight text-2xl leading-tight bg-gradient-to-r from-pink-500 via-blue-500 to-green-500 bg-clip-text text-transparent">
            マニュアル
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <h3 class="text-xl font-bold mb-4">このサイトの使い方</h3>
            <div id="manual-contents">
                <div class="manual-item">
                    <button onclick="toggleSection('manual-settings')" class="manual-button">
                        <span class="arrow">▼</span> <span class="emphasis">【Tips】スマホユーザー向けの設定📱</span>
                    </button>
                    <div id="manual-settings" class="manual-content hidden">
                        <p class="text-base mb-4">
                            スマホユーザーの方は以下の設定をおすすめします。スマホアプリのように使用することができます。
                        </p>
                        <p class="text-base mb-4">①epimakerのブラウザ画面で共有ボタンを押します。</p>
                        <img src="{{ asset('img/manual/IMG_7403.png') }}" alt="スマホ設定" class="manual-img">
                        <p class="text-base mb-4">②「ホーム画面」に追加を押します。</p>
                        <img src="{{ asset('img/manual/IMG_7404.png') }}" alt="スマホ設定" class="manual-img">
                        <p class="text-base mb-4">③「追加」を押します。</p>
                        <img src="{{ asset('img/manual/IMG_7405.PNG') }}" alt="スマホ設定" class="manual-img">
                        <p class="text-base mb-4">④ホーム画面にepimakerアイコンが追加されます。今後、ここからアクセスすることができます。</p>
                        <img src="{{ asset('img/manual/IMG_7406.PNG') }}" alt="スマホ設定" class="manual-img">
                    </div>
                </div>
                <div class="manual-item">
                    <button onclick="toggleSection('manual-create1')" class="manual-button">
                        <span class="arrow">▼</span> 【Tips】おすすめのエピソード作成方法✨
                    </button>
                    <div id="manual-create1" class="manual-content hidden">
                        <p class="text-base mb-4">
                            管理人おすすめのエピソード作成方法を紹介します。
                        </p>
                        <p class="text-base mb-4">①「新規作成」画面に移動します。</p>
                        <img src="{{ asset('img/manual/osusume1.png') }}" alt="オススメ設定" class="manual-img-large"><br>
                        <p class="text-base mb-4">②5W1H1Dの中で分かるところを埋めます。分からないところは空欄でOKです。</p>
                        <img src="{{ asset('img/manual/osusume2.png') }}" alt="オススメ設定" class="manual-img-large"><br>
                        <p class="text-base mb-4">③「AIで生成」ボタンを押します。</p>
                        <img src="{{ asset('img/manual/osusume3.png') }}" alt="オススメ設定" class="manual-img-large"><br>
                        <p class="text-base mb-4">④画面下部のエピソード欄にエピソードが自動生成されます。もう一度生成しなおしたい場合は、「AIで生成」ボタンをもう一度押すと、生成をやり直すことができます。<br>
                            &nbsp;&nbsp;生成されたエピソードを元に事実と違うところ等を修正したら完了です。</p>
                        <img src="{{ asset('img/manual/osusume4.png') }}" alt="オススメ設定" class="manual-img-large"><br>
                        <p class="text-base mb-4">以上の手順で、簡単に本格的なエピソードが作成できます。</p>
                    </div>
                </div>
                <div class="manual-item">
                    <button onclick="toggleSection('manual-create')" class="manual-button">
                        <span class="arrow">▼</span> 新規作成画面📄
                    </button>
                    <div id="manual-create" class="manual-content hidden">
                        <p class="text-base mb-4">
                                新規作成画面の説明です。
                        </p>
                        <img src="{{ asset('img/manual/new1.png') }}" alt="新規作成設定" class="manual-img-large">
                        <p class="text-base mb-4">
                            ①「AIで生成」<br>AIでエピソードを生成することができます。生成する際は、5W1H1Dを参照します。何も入力していなくても生成することはできます。<br><br>
                            ②「タイトル」<br>エピソードのタイトルを入力します。必須項目なので、ここを入力せずに保存しようとするとエラーになります。<br>
                            (遊び、ニュース、季節、友達、旅、健康、仕事、学校、家族、恋人、住居、食事)などから考えてみましょう。<br>【例】調子乗りの友達<br><br>
                        </p>
                        <img src="{{ asset('img/manual/new2.png') }}" alt="新規作成設定" class="manual-img-large">
                        <p class="text-base mb-4">
                            ③「いつ？」<br>出来事がいつ起こったか入力します。<br>
                            【例】小学校の掃除時間<br><br>
                            ④「どこで？」<br>出来事がどこで起こったか入力します。<br>
                            【例】教室で<br><br>
                            ⑤「だれが？」<br>行動したのはだれか入力します。<br>
                            【例】トイレットペーパーを全身に巻いた友達が<br><br>
                        </p>
                        <img src="{{ asset('img/manual/new3.png') }}" alt="新規作成設定" class="manual-img-large">
                        <p class="text-base mb-4">
                            ⑥「なにを？」<br>出来事の対象物、対象人物を入力します。<br>
                            【例】先生を<br><br>
                            ⑦「どうした？」<br>どのような行動をしたのか、何が起こったのかを入力します。<br>
                            【例】怒らせた<br><br>
                            ⑧「なぜ？」<br>出来事が起こった理由、行動した理由を入力します。<br>
                            【例】間違って先生を驚かしたから<br><br>
                        </p>
                        <img src="{{ asset('img/manual/new4.png') }}" alt="新規作成設定" class="manual-img-large">
                        <p class="text-base mb-4">
                            ⑨「どのように？」<br>出来事や行動がどのように成されたか入力します。<br>
                            【例】掃除用具入れから飛び出してきて<br><br>
                            ⑩「共感ポイント？」<br>この話の中で、聞き手に共感してほしい、面白いと思ったポイントや感情を入力します。<br>
                            【例】友達が調子に乗って、罰が当たるところ<br><br>
                            ⑪「5W1H1Dまとめ」<br>5W1H1Dに入力した内容が、自動的に結合されてここに表示されます。<br><br>
                        </p>
                        <img src="{{ asset('img/manual/new5.png') }}" alt="新規作成設定" class="manual-img-large">
                        <p class="text-base mb-4">
                            ⑫「起(フリ：導入)」<br>話の導入。話を聞いてもらう上で必要な情報を入力します。<br>
                            【例】小学生のころ、すごく調子乗りな友達がいた。<br><br>
                            ⑬「承(フリ：起の情報を深める)」<br>「起」の情報を深める情報を入力します。<br>
                            【例】「女子だけ体育館に集合」ってときに、こっそりついて行って怒られるようなお調子者だった。<br><br>
                            ⑭「転(フリ：話の山場。聞き手の興味関心を惹く)」<br>話の山場となる部分を入力します。<br>
                            【例】ある日の掃除時間、その友達はトイレットペーパーを全身に巻いて掃除用具入れに隠れていた。何も知らない先生がやってきて掃除用具入れを開けた。<br><br>
                            ⑮「結(オチ：最終的にどうなったか)」<br>結末、オチを入力します。<br>
                            【例】するとその友達が飛び出してきて、先生ビックリ！友達はこっぴどく怒られた。<br><br>
                        </p>
                        <img src="{{ asset('img/manual/new6.png') }}" alt="新規作成設定" class="manual-img-large">
                        <p class="text-base mb-4">
                            ⑯「起承転結の内容を反映」<br>このボタンを押すと、起承転結の内容を結合して下のエピソード欄に反映します。<br><br>
                            ⑰「エピソード欄」<br>エピソード本体になります。必須項目です。これまでで作成した内容を確認し、補足や脚色を入れて清書します。<br><br>
                            ⑱「公開状態」<br>エピソードを他のユーザーに公開するか、公開しないかを選びます。公開するとランキングにも参加できます。<br><br>
                            ⑲「投稿する」<br>エピソードを保存します。<br><br>
                        </p>
                        <p class="text-base mb-4">新規作成画面の説明は以上です。</p>
                    </div>
                </div>
                <div class="manual-item">
                    <button onclick="toggleSection('manual-episodes')" class="manual-button">
                        <span class="arrow">▼</span> みんなの投稿🌐
                    </button>
                    <div id="manual-episodes" class="manual-content hidden">
                        <p class="text-base mb-4">
                                みんなの投稿画面の説明です。
                        </p>
                        <img src="{{ asset('img/manual/index1.png') }}" alt="みんなの投稿" class="manual-img-large">
                        <p class="text-base mb-4">
                            ①「タイトル」<br>エピソードのタイトルです。タイトルを押すと、エピソードの詳細画面を見ることができます。<br><br>
                            ②「いいね」<br>エピソードにいいねすることができます。いいねをするとハートマークが赤くなります。<br><br>
                            ③「コメントする」<br>タイトルと同じく、エピソードの詳細画面に移動します。エピソードの詳細画面でコメントを入力することができます。<br><br>
                        </p>
                        <p class="text-base mb-4">みんなの投稿画面の説明は以上です。</p>
                    </div>
                </div>
                <div class="manual-item">
                    <button onclick="toggleSection('manual-syousai')" class="manual-button">
                        <span class="arrow">▼</span> エピソード詳細画面📖
                    </button>
                    <div id="manual-syousai" class="manual-content hidden">
                        <p class="text-base mb-4">
                            エピソード詳細画面の説明です。
                        </p>
                        <img src="{{ asset('img/manual/syousai1.png') }}" alt="エピソード招請" class="manual-img-large">
                        <p class="text-base mb-4">
                            ①「公開状態」<br>エピソードの公開状態を設定できます。<br><br>
                            ②「編集」<br>エピソードの編集画面に移動します。<br><br>
                            ③「削除」<br>エピソードを削除します。<br><br>
                            ④「いいね」<br>エピソードにいいねすることができます。いいねをするとハートマークが赤くなります。<br><br>
                            ⑤「コメント」<br>エピソードにコメントすることができます。コメント入力欄に入力し、「コメントする」ボタンを押します。<br><br>
                        </p>
                        <p class="text-base mb-4">エピソード詳細画面の説明は以上です。</p>
                    </div>
                </div>
                <div class="manual-item">
                    <button onclick="toggleSection('manual-edit')" class="manual-button">
                        <span class="arrow">▼</span> エピソード編集✍️
                    </button>
                    <div id="manual-edit" class="manual-content hidden">
                    <p class="text-base mb-4">
                                エピソード編集画面の説明です。
                        </p>
                        <img src="{{ asset('img/manual/edit1.png') }}" alt="エピソード編集" class="manual-img-large">
                        <p class="text-base mb-4">
                            ①「AIで生成」<br>AIでエピソードを生成することができます。生成する際は、5W1H1Dを参照します。何も入力していなくても生成することはできます。<br><br>
                            ②「タイトル」<br>エピソードのタイトルを入力します。必須項目なので、ここを入力せずに保存しようとするとエラーになります。<br>
                            (遊び、ニュース、季節、友達、旅、健康、仕事、学校、家族、恋人、住居、食事)などから考えてみましょう。<br>【例】調子乗りの友達<br><br>
                        </p>
                        <img src="{{ asset('img/manual/new2.png') }}" alt="エピソード編集" class="manual-img-large">
                        <p class="text-base mb-4">
                            ③「いつ？」<br>出来事がいつ起こったか入力します。<br>
                            【例】小学校の掃除時間<br><br>
                            ④「どこで？」<br>出来事がどこで起こったか入力します。<br>
                            【例】教室で<br><br>
                            ⑤「だれが？」<br>行動したのはだれか入力します。<br>
                            【例】トイレットペーパーを全身に巻いた友達が<br><br>
                        </p>
                        <img src="{{ asset('img/manual/new3.png') }}" alt="エピソード編集" class="manual-img-large">
                        <p class="text-base mb-4">
                            ⑥「なにを？」<br>出来事の対象物、対象人物を入力します。<br>
                            【例】先生を<br><br>
                            ⑦「どうした？」<br>どのような行動をしたのか、何が起こったのかを入力します。<br>
                            【例】怒らせた<br><br>
                            ⑧「なぜ？」<br>出来事が起こった理由、行動した理由を入力します。<br>
                            【例】間違って先生を驚かしたから<br><br>
                        </p>
                        <img src="{{ asset('img/manual/new4.png') }}" alt="エピソード編集" class="manual-img-large">
                        <p class="text-base mb-4">
                            ⑨「どのように？」<br>出来事や行動がどのように成されたか入力します。<br>
                            【例】掃除用具入れから飛び出してきて<br><br>
                            ⑩「共感ポイント？」<br>この話の中で、聞き手に共感してほしい、面白いと思ったポイントや感情を入力します。<br>
                            【例】友達が調子に乗って、罰が当たるところ<br><br>
                            ⑪「5W1H1Dまとめ」<br>5W1H1Dに入力した内容が、自動的に結合されてここに表示されます。<br><br>
                        </p>
                        <img src="{{ asset('img/manual/new5.png') }}" alt="エピソード編集" class="manual-img-large">
                        <p class="text-base mb-4">
                            ⑫「起(フリ：導入)」<br>話の導入。話を聞いてもらう上で必要な情報を入力します。<br>
                            【例】小学生のころ、すごく調子乗りな友達がいた。<br><br>
                            ⑬「承(フリ：起の情報を深める)」<br>「起」の情報を深める情報を入力します。<br>
                            【例】「女子だけ体育館に集合」ってときに、こっそりついて行って怒られるようなお調子者だった。<br><br>
                            ⑭「転(フリ：話の山場。聞き手の興味関心を惹く)」<br>話の山場となる部分を入力します。<br>
                            【例】ある日の掃除時間、その友達はトイレットペーパーを全身に巻いて掃除用具入れに隠れていた。何も知らない先生がやってきて掃除用具入れを開けた。<br><br>
                            ⑮「結(オチ：最終的にどうなったか)」<br>結末、オチを入力します。<br>
                            【例】するとその友達が飛び出してきて、先生ビックリ！友達はこっぴどく怒られた。<br><br>
                        </p>
                        <img src="{{ asset('img/manual/new6.png') }}" alt="エピソード編集" class="manual-img-large">
                        <p class="text-base mb-4">
                            ⑯「起承転結の内容を反映」<br>このボタンを押すと、起承転結の内容を結合して下のエピソード欄に反映します。<br><br>
                            ⑰「エピソード欄」<br>エピソード本体になります。必須項目です。これまでで作成した内容を確認し、補足や脚色を入れて清書します。<br><br>
                            ⑱「公開状態」<br>エピソードを他のユーザーに公開するか、公開しないかを選びます。公開するとランキングにも参加できます。<br><br>
                            ⑲「投稿する」<br>エピソードを保存します。<br><br>
                        </p>
                        <p class="text-base mb-4">新規作成画面の説明は以上です。</p>
                    </div>
                </div>
                <div class="manual-item">
                    <button onclick="toggleSection('manual-myepisode')" class="manual-button">
                        <span class="arrow">▼</span> 自分の投稿👤
                    </button>
                    <div id="manual-myepisode" class="manual-content hidden">
                        <p>ここに「自分の投稿」に関する説明を記載します。</p>
                    </div>
                </div>
                <div class="manual-item">
                    <button onclick="toggleSection('manual-ranking')" class="manual-button">
                        <span class="arrow">▼</span> いいねランキング🏆
                    </button>
                    <div id="manual-ranking" class="manual-content hidden">
                        <p>ここに「いいねランキング」に関する説明を記載します。</p>
                    </div>
                </div>
                <div class="manual-item">
                    <button onclick="toggleSection('manual-mycomment')" class="manual-button">
                        <span class="arrow">▼</span> コメントした投稿💬
                    </button>
                    <div id="manual-mycomment" class="manual-content hidden">
                        <p>ここに「コメントした投稿」に関する説明を記載します。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .manual-item {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
            overflow: hidden;
        }
        .manual-button {
            width: 100%;
            text-align: left;
            background-color: #f9f9f9;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            align-items: center;
        }
        .manual-button:hover {
            background-color: #f1f1f1;
        }
        .emphasis {
            font-weight: bold;
        }
        .arrow {
            margin-right: 10px;
        }
        .manual-content {
            padding: 10px;
            border-top: 1px solid #ddd;
            background-color: #fff;
        }
        .manual-img {
            display: block;
            width: 100%;
            max-width: 200px;
            margin: 10px 0;
        }
        .manual-img-large {
            display: block;
            width: 100%;
            max-width: 100%;
            margin: 10px 0;
        }
    </style>

    <script>
        function toggleSection(sectionId) {
            const section = document.getElementById(sectionId);
            section.classList.toggle('hidden');
            const button = section.previousElementSibling;
            const arrow = button.querySelector('.arrow');
            if (section.classList.contains('hidden')) {
                arrow.textContent = '▼';
            } else {
                arrow.textContent = '▲';
            }
        }
    </script>
</x-app-layout>