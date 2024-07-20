<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::query()->pluck('name','id');
        $postsNews = Post::query()->latest('id')->paginate(1);
        $posts = Post::query()->paginate(3);
        $postRight = Post::query()->limit(6)->get();
        // dd($categories);
        return view('client.index',compact('categories','posts','postsNews','postRight'));
    }
    public function search(Request $request){
        $categories = Category::query()->pluck('name','id');
        $keyWord = $request->input('name');
        // dd($keyWord);    
        $posts = Post::where('name','LIKE', "%$keyWord%")->get();
        return view('client.search',compact('posts','categories'));
    }
}
