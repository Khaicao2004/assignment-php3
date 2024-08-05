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
        $categories = Category::query()->pluck('name','slug');
        // $find = Post::query()->with('photos')->first();
        $postHot = Post::query()->with(['tags','photos','author'])
            ->where('is_hot',true)
            ->paginate(6);
        $postsNews = Post::query()->with(['tags','photos','author'])->latest('id')
            ->paginate(1);
        $postsView = Post::query()->with(['tags','photos','author'])
            ->orderBy('is_view','desc')
            ->take(6)
            ->paginate(6);
        // dd($categories);
        return view('client.index',compact('categories','postsView','postsNews','postHot'));
    }
    public function search(Request $request){
        $categories = Category::query()->pluck('name','slug');
        $keyWord = $request->input('name');
        // dd($keyWord);    
        $posts = Post::where('name','LIKE', "%$keyWord%")->get();
        return view('client.search',compact('posts','categories'));
    }
    public function about(){
        $categories = Category::query()->pluck('name','slug');
        return view('client.about',compact('categories'));
    }
    public function contact(){
        $categories = Category::query()->pluck('name','slug');
        return view('client.contact',compact('categories'));
    }
}
