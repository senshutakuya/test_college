<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use HasFactory;
    // Postに対するリレーション

    //「1対多」の関係なので'posts'と複数形に
    public function posts()   
    {
        return $this->hasMany(Post::class); 
        // hasMany メソッドを使用してリレーションを定義し、Post::class は関連する複数のモデルクラスを指しています。
    }
    public function getByCategory(int $limit_count = 5)
    {
         return $this->posts()->with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
