<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "title",
        "body"
        
    ];
    // fillが可能なプロパティを指定しています。
    // これを定義する事でfill関数とsave関数は元々Postモデルクラスが継承しているModelクラスのメソッドを参照して利用が可能なので、今回モデルに実装するのは以下のfillableのみでOK
    // これを設定するとpostメソッドのtitleとbodyというキーに関して保存ができる
        
    
    public function getPagenateByLimit(int $limit_count = 5)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

}
