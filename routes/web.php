<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;  //外部にあるPostControllerクラスをインポート。



   

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('posts.index');
// });

Route::get('/', [PostController::class, 'index']);

Route::get("/posts/create",[PostController::class,"create"]);

Route::post('/posts', [PostController::class, 'store']);

Route::get("/posts/{post}",[PostController::class,"show"]);
// 今回は/posts/(対象データID)なのでPostController.phpのshow関数のreturn view("posts/show")->with["post"=>$post]のwithで設定した変数名"posts"を対象データIDの部分にする
Route::get("/posts/{post}/edit",[PostController::class,"edit"]);
// 今更ながらこの{post}はPostControllerにあるPost
Route::put("/posts/{post}",[PostController::class,"update"]);