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
                        <p>ここに「新規作成画面」に関する説明を記載します。</p>
                    </div>
                </div>
                <div class="manual-item">
                    <button onclick="toggleSection('manual-episodes')" class="manual-button">
                        <span class="arrow">▼</span> みんなの投稿🌐
                    </button>
                    <div id="manual-episodes" class="manual-content hidden">
                        <p>ここに「みんなの投稿」に関する説明を記載します。</p>
                    </div>
                </div>
                <div class="manual-item">
                    <button onclick="toggleSection('manual-edit')" class="manual-button">
                        <span class="arrow">▼</span> エピソード編集✍️
                    </button>
                    <div id="manual-edit" class="manual-content hidden">
                        <p>ここに「エピソード編集」に関する説明を記載します。</p>
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