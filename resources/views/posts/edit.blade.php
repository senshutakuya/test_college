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
        <form action="/posts/{{$post->id}}" method="POST">
            <!--htmlでPUTメソッドはサポートされていないからPOSTとなる-->
            @csrf
            @method('PUT')
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="タイトル" value="{{$post->title }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。">{{$post->body}}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <input type="submit" value="update"/>
        </form>
        <div class="back">[<a href="/posts/{{$post->id}}">back</a>]</div>
        {{ Auth::user()->name }}
    </body>
</html>
<!-- HTML文書の終了。 -->
