<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
// スキーマを定義する時に使うblueprint
use Illuminate\Support\Facades\Schema;
// データーベースの構造を定義する時に使う

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    // upメソッドはデータベースに新しいテーブル、カラム、またはインデックスを追加するために使用します。
    {
        // postsテーブルの定義
        Schema::create('posts', function (Blueprint $table) {
            // createメソッドを使用します。createメソッドは２つの引数を取ります。
            // １つ目はテーブルの名前で、２つ目は新しいテーブルを定義するために使用できるuseしたBlueprintオブジェクトを受け取る変数です。
            
            $table->id();
            $table->string('title', 50);
            $table->string('body', 200);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    // downメソッドでは、upメソッドによって実行する操作を逆にし、以前の状態へ戻す必要があります。
    {
        Schema::dropIfExists('posts');
    }
};