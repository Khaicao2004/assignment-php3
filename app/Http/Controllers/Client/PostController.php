<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function loaiTin(string $slug)
    {
        $parentCategories = Category::query()
        ->with('children') // Load danh mục con
        ->whereNull('parent_id') // Lấy các danh mục cha (có parent_id là null)
        ->get();
        $category = Category::query()->where('slug', $slug)->firstOrFail();
        $posts = Post::query()->where('category_id', $category->id)
            ->with(['category', 'author', 'tags'])->get();
        if ($posts->isEmpty()) {
            return redirect()->route('home');
        }
        $category = $posts->first()->category;
        return view('client.loai-tin', compact('parentCategories', 'posts', 'category'));
    }
    public function detail($slug)
    {
        $parentCategories = Category::query()
        ->with('children') // Load danh mục con
        ->whereNull('parent_id') // Lấy các danh mục cha (có parent_id là null)
        ->get();
        $post = Post::query()->with('photos')->where('slug', $slug)->firstOrFail();
        $post->increment('is_view');
        return view('client.chi-tiet', compact('post', 'parentCategories'));
    }
    public function binhLuan(Request $request, $slug)
    {
        $post = Post::query()->where('slug', $slug)->first();
        Comment::query()->create([
            'post_id' => $post->id,
            'user_id' => Auth::id(),
            'comment' => $request->comment
        ]);
        return redirect()->route('chitiet', compact('post', 'slug'));
    }
}
