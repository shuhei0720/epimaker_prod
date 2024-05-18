<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold leading-tight text-2xl leading-tight bg-gradient-to-r from-pink-500 via-blue-500 to-green-500 bg-clip-text text-transparent">
            マニュアル
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <h3 class="text-xl font-bold mb-4">ナビゲーションメニューのマニュアル</h3>
            <div id="manual-contents">
                <div class="manual-item">
                    <button onclick="toggleSection('manual-settings')" class="manual-button">
                        <span class="arrow">▼</span> <span class="emphasis">スマホユーザー向けの設定</span>
                    </button>
                    <div id="manual-settings" class="manual-content hidden">
                        <p>ここに「スマホユーザー向けの設定」に関する説明を記載します。</p>
                    </div>
                </div>
                <div class="manual-item">
                    <button onclick="toggleSection('manual-create')" class="manual-button">
                        <span class="arrow">▼</span> 新規作成画面
                    </button>
                    <div id="manual-create" class="manual-content hidden">
                        <p>ここに「新規作成画面」に関する説明を記載します。</p>
                    </div>
                </div>
                <div class="manual-item">
                    <button onclick="toggleSection('manual-episodes')" class="manual-button">
                        <span class="arrow">▼</span> みんなの投稿
                    </button>
                    <div id="manual-episodes" class="manual-content hidden">
                        <p>ここに「みんなの投稿」に関する説明を記載します。</p>
                    </div>
                </div>
                <div class="manual-item">
                    <button onclick="toggleSection('manual-edit')" class="manual-button">
                        <span class="arrow">▼</span> エピソード編集
                    </button>
                    <div id="manual-edit" class="manual-content hidden">
                        <p>ここに「エピソード編集」に関する説明を記載します。</p>
                    </div>
                </div>
                <div class="manual-item">
                    <button onclick="toggleSection('manual-myepisode')" class="manual-button">
                        <span class="arrow">▼</span> 自分の投稿
                    </button>
                    <div id="manual-myepisode" class="manual-content hidden">
                        <p>ここに「自分の投稿」に関する説明を記載します。</p>
                    </div>
                </div>
                <div class="manual-item">
                    <button onclick="toggleSection('manual-ranking')" class="manual-button">
                        <span class="arrow">▼</span> いいねランキング
                    </button>
                    <div id="manual-ranking" class="manual-content hidden">
                        <p>ここに「いいねランキング」に関する説明を記載します。</p>
                    </div>
                </div>
                <div class="manual-item">
                    <button onclick="toggleSection('manual-mycomment')" class="manual-button">
                        <span class="arrow">▼</span> コメントした投稿
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