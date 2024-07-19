<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function loaiTin(string $id){
        $categories = Category::query()->pluck('name','id');
        $posts = Post::query()->where('category_id', $id)->with('category')->get();
        if($posts->isEmpty()){
            return redirect()->route('home');
          }
        $category = $posts->first()->category;
        return view('client.loai-tin',compact('categories','posts','category'));
    }
    public function show(string $id)
    {
        $categories = Category::query()->pluck('name', 'id');
        $data = Post::findOrFail($id);
        return view('client.chi-tiet', compact('data', 'categories'));
    }
}
