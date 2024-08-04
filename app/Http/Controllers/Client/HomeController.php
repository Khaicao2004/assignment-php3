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
        $find = Post::query()->with('photos')->first();
        $postsNews = Post::query()->with(['tags','photos','author'])->latest('id')->paginate(1);
        $posts = Post::query()->with(['tags','photos','author'])->paginate(3);
        $postRight = Post::query()->limit(6)->get();
        // dd($categories);
        return view('client.index',compact('categories','posts','postsNews','postRight'));
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
