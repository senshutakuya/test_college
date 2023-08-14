<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
    <h1>Blog Name</h1>
    <a href="/posts/create">create</a>
    <div class='posts'>
        @foreach ($posts as $post)
            <div class='post'>
                <a href="/posts/{{$post->id}}">
                    <h2 class='title'>{{ $post->title }}</h2>
                </a>
                <p class='body'>{{ $post->body }}</p>
                <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                <!--$postモデルの関連するcategory関数のname属性にアクセスしています。-->
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
                </form>
            </div>
        @endforeach
    </div>
    
    <div>
  <!--      dd関数で見たところPostController.phpのindexクラスからwithで渡されたquestions変数には-->
  <!--      array:2 [▼ // resources/views/posts/index.blade.php-->
  <!--"meta" => array:5 [▶]-->
  <!--"questions" => array:20 [▼-->
  <!--  0 => array:12 [▼-->
  <!--    "id" => "66f4il60phnlc9"-->
  <!--    "title" => "AWS p3インスタンス上でのKeras LSTMによる時系列データ予測"-->
  <!--    "created" => "2023-08-14 13:26:39"-->
  <!--    "modified" => "2023-08-14 13:26:39"-->
  <!--    "count_reply" => "0"-->
  <!--    "count_clip" => "0"-->
  <!--    "count_pv" => "7"-->
  <!--    "is_beginner" => false-->
  <!--    "is_accepted" => false-->
  <!--    "is_presentation" => false-->
  <!--    "tags" => array:4 [▼-->
  <!--      0 => "TensorFlow"-->
  <!--      1 => "Keras"-->
  <!--      2 => "Python 3.x"-->
  <!--      3 => "AWS(Amazon Web Services)"-->
  <!--    ]-->
  <!--    "user" => array:3 [▼-->
  <!--      "display_name" => "nayameru"-->
  <!--      "score" => "0"-->
  <!--      "photo" => ""-->
  <!--    ]-->
  <!--  ]-->
  <!--  の様にデータが格納されていたのでquestions変数の連想配列の中のquestions配列と指定してあげると下記のquestion[title]と指定できる-->
        @foreach($questions["questions"] as $question)
            <div>
                
                <a href="https://teratail.com/questions/{{ $question['id'] }}">
                {{ $question['title'] }}
                
                </a>
                
            </div>
        @endforeach
    </div>
    {{ Auth::user()->name }}
    <div class='paginate'>
        {{ $posts->links() }}
    </div>
    <script>
        function deletePost(id) {
            'use strict';
            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
</body>
</html>
