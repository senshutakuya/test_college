<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
        
        return view('posts/index')->with(['posts' => $post->getPagenateByLimit()]);  
       //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入
       
       
    }
    
    public function show(Post $post)
    //ここのPostはモデルクラスのPost
    // web.phpのRoute::get('/posts/{post}', [PostController::class ,'show']);　の{$post}とここの$postは一緒にしないといけない
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
}
?>