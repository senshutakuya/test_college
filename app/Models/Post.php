<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// 倫理削除をする事が出来るSoftDeletesをuse

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    // ここにもUse宣言をする事でクラス内でも使える
    // 以降はdeleted_atが追加され削除扱いになり論理削除ができる。
    
    protected $fillable = [
        'title',
        'body',
        'category_id'
    ];
    // fillが可能なプロパティを指定しています。
    // これを定義する事でfill関数とsave関数は元々Postモデルクラスが継承しているModelクラスのメソッドを参照して利用が可能なので、今回モデルに実装するのは以下のfillableのみでOK
    // これを設定するとpostメソッドのtitleとbodyとcategory_idいうキーに関して保存ができる
        
    
    public function getPagenateByLimit(int $limit_count = 5)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
        // this::with(リレーション名)とする
    }
    // Categoryに対するリレーション

    //「1対多」の関係なので単数系に
    public function category()
    {
        return $this->belongsTo(Category::class);
        // belongsTo メソッドを使用してリレーションを定義し、Category::class は関連する１つのモデルクラスを指しています。
    }

}
