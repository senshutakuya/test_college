<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 <!--上記はapp関数でLarvelの依存関係とapp関数の中のgetLocale関数で現在の言語と地域設定を読み取りその読み取った内容の_を-にかえてlangの属性値にするって事 -->
<!-- HTML文書の開始。言語属性はアプリケーションのロケールに基づいて設定される。 -->

<head>
    <!-- ドキュメントのヘッダー情報。メタ情報やスタイルシートなどを定義する。 -->

    <meta charset="utf-8">
    <!-- 文字エンコーディングをUTF-8に設定。 -->

    <title>Blog</title>
    <!-- タイトルタグ。ページのタイトルを表示するブラウザタブに表示される。 -->

    <!-- Fonts -->
    <!-- 外部フォントのリンク。Google FontsからNunitoフォントを読み込む。 -->

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>

<body>
        <h1>Blog Name</h1>
        <a href ="/posts/create">create</a>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <a href="/posts/{{$post->id}}">
                        <!--ここでpostテーブルのidを参照-->
                        <h2 class='title'>{{ $post->title }}</h2>
                    </a>
                    <p class='body'>{{ $post->body }}</p>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        <!--posts/idに送信、idはform_idとするメソッドはpost-->
                        @csrf
                        <!--csrf対策-->
                        @method('DELETE')
                        <!--HTMLでDELETEはサポートされていないから-->
                        <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                        <!--JavaScriptで処理を書くからsubmitじゃなくてbuttonにする-->
                        <!--onclickにはこのボタンがクリックされた場合の処理を書く今回だとidを格納している-->
                        <!--この格納したidはJavaScriptのdeletePostの引数に使われる。-->
                    </form>
                </div>
                
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        
        <!--先にHTMLを読み込ませて表示速度を上げる為scriptはbodyの一番後ろ-->
        <script>
            // idの部分にはonclickで指定した$post->idの値が入る
            // 何故そのまま$post->idと指定しないかと言うとJavaScriptではそれが出来ないからだ。
            function deletePost(id) {
                'use strict'
                // 'use strict'; は、JavaScript内での厳格モード（strict mode）を有効にするための宣言
        
                // confirmでポップアップ画面に選択肢を出す
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    // getelmentByIdでid="form_ $post->id "の部分を入手
                    // ﾊﾞｯｸｸｫｰﾃｰｼｮンを使う事で$変数を使える
                    document.getElementById(`form_${id}`).submit();
                    // submitで送信
                }
            }
        </script>
    </body>
</html>
<!-- HTML文書の終了。 -->
