<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// これをUseするとDB::table('posts')->insertの部分のDBファサードが使える様になる
use DateTime;
// 日付と時間を扱うための組み込みクラスです。シーディング時に created_at および updated_at カラムに日時を設定するために使用されています。

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // DB::table('テーブル名')->insert(['カラム名' => 'データ' ] );
    // use Illuminate\Support\Facades\DB;　を追記
    // use DateTime;　を追記

    public function run()
    {
        // DB ファサードを使用して、posts テーブルに新しい行（レコード）を挿入しています。insert メソッドの引数には、連想配列を指定して挿入するデータを定義しています。
            DB::table('posts')->insert([
                    'title' => '命名の心得',
                    'body' => '命名はデータを基準に考える',
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime(),
             ]);
    }
}
