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
                    let nextElement = header.nextElementSibling;
                    while (nextElement && nextElement.tagName.toLowerCase() !== 'h2') {
                        nextElement.style.display = nextElement.style.display === 'none' ? 'block' : 'none';
                        nextElement = nextElement.nextElementSibling;
                    }
                });
            });
        });
    </script>

    <div class="container">
        <h1>利用規約</h1>

        <p>本利用規約（以下「本規約」）は、当サイトの利用条件を定めるものです。ユーザーは、本規約に同意することで、当サイトを利用することができます。</p>

        <h2>サービスの利用</h2>
        <p>当サイトは、ユーザーに対してエピソードの投稿および閲覧のサービスを提供します。ユーザーは、提供されるサービスを自己責任で利用するものとします。</p>

        <h2>アカウント</h2>
        <p>ユーザーは、アカウントを作成し、管理する責任を負います。アカウント情報の不正使用による損害について、当サイトは一切責任を負いません。アカウント作成には、ユーザー名、メールアドレス、パスワード、ユーザー画像が必要です。</p>

        <h2>エピソードの投稿</h2>
        <p>ユーザーは、当サイトを通じてエピソードを投稿することができます。投稿されたエピソードは、当サイトの利用規約およびガイドラインに従うものとします。</p>

        <h2>禁止事項</h2>
        <p>ユーザーは、以下の行為を行ってはなりません：</p>
        <ul>
            <li>法令または公序良俗に反する行為</li>
            <li>他のユーザーに対する嫌がらせや誹謗中傷</li>
            <li>虚偽の情報を提供する行為</li>
            <li>当サイトの運営を妨げる行為</li>
        </ul>
        <p>当該行為が発覚した場合、該当ユーザーに断りなく管理者が削除等の措置を取ることがあります。</p>

        <h2>責任の制限</h2>
        <p>当サイトは、提供するサービスに関して、いかなる保証も行いません。ユーザーは、自己責任で当サイトを利用するものとし、当サイトは、直接的または間接的に生じるいかなる損害についても責任を負いません。</p>

        <h2>準拠法および管轄</h2>
        <p>本規約は、日本法に準拠し、解釈されるものとします。また、本規約に関連する紛争は、東京地方裁判所を専属的合意管轄とします。</p>

        <h2>変更通知</h2>
        <p>本規約は、必要に応じて変更されることがあります。変更があった場合、当サイト上に掲載し、ユーザーに通知します。ユーザーは、変更後の規約に同意した上で、引き続き当サイトを利用するものとします。</p>

        <h2>お問い合わせ</h2>
        <p>利用規約に関するお問い合わせは、以下の連絡先までお願いいたします：</p>
        <p>
            メール：shuhei10720@gmail.com<br>
        </p>
    </div>
</x-guest-layout>