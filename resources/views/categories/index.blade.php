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
                    
                    <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                    <!--$postモデルの関連するcategory関数のname属性にアクセスしています。-->
                    <p class='body'>{{ $post->body }}</p>
                    
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>
<!-- HTML文書の終了。 -->
