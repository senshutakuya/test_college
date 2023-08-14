<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;
use GuzzleHttp\Client; // Guzzleクライアントをインポート
use App\Models\Category;

class PostController extends Controller
{
    public function index(Post $post)
    {
        // クライアントインスタンス生成
        $client = new \GuzzleHttp\Client();

        // teratail APIのURL
        $url = 'https://teratail.com/api/v1/questions';

        // GET通信とアクセストークンの認証
        $response = $client->request(
            'GET',
            $url,
            // teratailのトークン情報をBearerトークンに指定する。
            // Bearer は、トークン情報が正当な物か確かめる仕組みの事でそれのキーの値にtertailの値を渡す
            ['Bearer' => config('services.teratail.token')]
        );

        // JSONデータを連想配列にデコード
        $questions = json_decode($response->getBody(), true);
        
        // dd($questions);

        // 既存の投稿一覧も取得
        $posts = $post->getPagenateByLimit();

        return view('posts.index')->with([
            'posts' => $posts,
            'questions' => $questions,
        ]);
    }

    // 他のメソッドはそのまま残す

    public function show(Post $post)
    {
        return view("posts.show")->with(["post" => $post]);
    }

    // 他のメソッドはそのまま残す
    public function create(Category $category)
    // useしたCategoryのクラスをインスタンスとして引数にする
    {
        return view('posts.create')->with(['categories' => $category->get()]);
        // postsフォルダのcreate.blade.phpを返す。その時にCategoryのget関数の値をcategoriesの値として使える様にする。
    }
    
    public function store(PostRequest $request, Post $post )
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
}
