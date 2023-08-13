<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained();   
            //'category_id' は 'categoriesテーブル' の 'id' を参照する外部キーです
            // foreignId メソッドは、整数カラムを表す外部キーを定義します。
            // constrained メソッドは、外部キー制約を指定するためのメソッドで、引数なしで呼び出すことで、カラム名と参照先のテーブルを自動的に判別します。
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }
};
