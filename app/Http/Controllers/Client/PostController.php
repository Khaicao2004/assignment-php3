<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function loaiTin(string $slug){
        $categories = Category::query()->pluck('name','slug');
        $category = Category::query()->where('slug', $slug)->firstOrFail();
        $posts = Post::query()->where('category_id', $category->id)
                    ->with(['category','author','tags'])->get();
        if($posts->isEmpty()){
            return redirect()->route('home');
          }
        $category = $posts->first()->category;
        return view('client.loai-tin',compact('categories','posts','category'));
    }
    public function detail($slug)
    {
        $categories = Category::query()->pluck('name','slug');
        $post = Post::query()->where('slug', $slug)->firstOrFail();
        // dd($post);
        return view('client.chi-tiet', compact('post', 'categories'));
    }
   public function binhLuan(Request $request,Post $post){
        Comment::query()->create([
            'post_id' => $post->id,
            'user_id' => Auth::id(),
            'comment' => $request->comment
        ]);
    return redirect()->route('chitiet',$post);
   }
}
