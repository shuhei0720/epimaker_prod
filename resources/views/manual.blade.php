<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold leading-tight text-2xl leading-tight bg-gradient-to-r from-pink-500 via-blue-500 to-green-500 bg-clip-text text-transparent">
            サイトの使い方
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 markdown-body">
            {!! $html !!}
        </div>
    </div>

    <style>
        .markdown-body {
            box-sizing: border-box;
            min-width: 200px;
            max-width: 980px;
            margin: 0 auto;
            padding: 45px;
            font-size: 16px;
            line-height: 1.6;
        }

        .markdown-body h1, .markdown-body h2, .markdown-body h3, .markdown-body h4, .markdown-body h5, .markdown-body h6 {
            margin: 1em 0;
            padding: 0;
            font-weight: bold;
        }

        .markdown-body h1 {
            font-size: 2em;
        }

        .markdown-body h2 {
            font-size: 1.75em;
        }

        .markdown-body h3 {
            font-size: 1.5em;
        }

        .markdown-body p {
            margin: 0.5em 0;
            font-size: 1.1em; /* 文字サイズを大きくする */
        }

        .markdown-body img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        .markdown-body img.portrait {
            max-height: 600px; /* 縦長の画像の最大高さを設定 */
            width: auto;
        }

        details summary {
            cursor: pointer;
            font-weight: bold;
            margin: 1em 0;
            font-size: 1em; /* <summary>タグの文字サイズを大きくする */
        }

        details summary:focus {
            outline: none;
        }

        details[open] summary {
            margin-bottom: 0.5em;
        }

        details p {
            margin: 0.5em 0;
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