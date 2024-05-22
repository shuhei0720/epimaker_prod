<x-guest-layout>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8fafc;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        h1, h2 {
            color: #2c3e50;
        }
        h1 {
            font-size: 2.5em;
            border-bottom: 2px solid #2c3e50;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        h2 {
            font-size: 1.8em;
            margin-top: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }
        p {
            font-size: 1.1em;
            line-height: 1.6;
            color: #555;
        }
        ul {
            margin-left: 20px;
            color: #555;
        }
        ul li {
            margin-bottom: 10px;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('h2').forEach(function(header) {
                header.style.cursor = 'pointer';
                header.addEventListener('click', function() {
                    const nextElement = header.nextElementSibling;
                    while (nextElement && nextElement.tagName.toLowerCase() !== 'h2') {
                        nextElement.style.display = nextElement.style.display === 'none' ? 'block' : 'none';
                        nextElement = nextElement.nextElementSibling;
                    }
                });
            });
        });
    </script>

    <div class="container">
        <h1>プライバシーポリシー</h1>

        <p>本プライバシーポリシーは、当サイト（以下「当サイト」）が、ユーザー（以下「ユーザー」）の個人情報をどのように収集、使用、共有するかについて説明するものです。</p>

        <h2>収集する情報</h2>
        <p>当サイトは、以下の情報を収集することがあります：</p>
        <ul>
            <li>ユーザー名</li>
            <li>メールアドレス</li>
            <li>パスワード</li>
            <li>ユーザー画像</li>
            <li>投稿されたエピソード</li>
            <li>IPアドレス</li>
            <li>クッキーおよびトラッキング情報</li>
        </ul>

        <h2>情報の使用</h2>
        <p>収集した情報は、以下の目的で使用されます：</p>
        <ul>
            <li>サービスの提供および改善</li>
            <li>ユーザーサポートの提供</li>
            <li>サービスの利用状況の分析</li>
            <li>マーケティングおよびプロモーション</li>
            <li>不正行為の検出および防止</li>
        </ul>

        <h2>情報の共有</h2>
        <p>当サイトは、以下の場合に限り、ユーザーの情報を第三者と共有することがあります：</p>
        <ul>
            <li>ユーザーの同意がある場合</li>
            <li>法律に基づく場合</li>
            <li>サービス提供のために必要な場合</li>
        </ul>

        <h2>セキュリティ</h2>
        <p>当サイトは、ユーザーの個人情報を保護するために適切なセキュリティ対策を講じます。ただし、インターネット上の通信は完全に安全であるとは限らないため、そのリスクを理解してください。</p>

        <h2>クッキー</h2>
        <p>当サイトは、ユーザーの利便性向上のためにクッキーを使用します。クッキーの使用を希望しない場合は、ブラウザの設定を変更することでクッキーを無効にできます。</p>

        <h2>利用者の権利</h2>
        <p>ユーザーは、自身の個人情報へのアクセス、訂正、削除を要求する権利があります。これらの要求は、下記の連絡先までご連絡ください。</p>

        <h2>変更通知</h2>
        <p>本プライバシーポリシーは、必要に応じて変更されることがあります。変更があった場合、当サイト上に掲載します。</p>

        <h2>お問い合わせ</h2>
        <p>プライバシーポリシーに関するお問い合わせは、以下の連絡先までお願いいたします：</p>
        <p>
            メール：shuhei10720@gmail.com<br>
        </p>
    </div>
</x-guest-layout>