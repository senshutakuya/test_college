<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest; // バリデーションチェックの為にPostRequestをuse

class PostController extends Controller
{
    public function index(Post $post)
    {
        
        return view('posts/index')->with(['posts' => $post->getPagenateByLimit()]);  
       //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入
       
       
    }
    
    public function show(Post $post)
    //ここのPostはモデルクラスのPost
    // web.phpのRoute::get('/posts/{post}', [PostController::class ,'show']);　の{post}とここの$postは一緒にしないといけない
    // 引数の$postはid=1のPostインスタンス
    {
        return view("posts/show")->with(["post" => $post]);

        // viewにあるpostsフォルダのshow.blade.phpの表示の際に使うのでposts/showとする。
        // with[変数名=>値]とする。今回の場合はshow関数の引数の$postを渡す
    }
    
    public function create(Post $post)
    {
        return view("posts/create");
        //単にcreateページを返すだけだよ
        
    }
    
   public function store(PostRequest $request, Post $post )
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }
}
?>