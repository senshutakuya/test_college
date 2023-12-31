<?php

namespace App\Http\Controllers;


use App\Models\Category;//カテゴリー別に選ぶためにuse
use App\Models\Post;
use App\Http\Requests\PostRequest; // バリデーションチェックの為にPostRequestをuse



class CategoryController extends Controller
{


    public function index(Category $category)
    {
        return view('categories.index')->with(['posts' => $category->getByCategory()]);
    }
}








