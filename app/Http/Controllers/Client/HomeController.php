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
        $parentCategories = Category::query()
            ->with('children') // Load danh mục con
            ->whereNull('parent_id') // Lấy các danh mục cha (có parent_id là null)
            ->get();
            // dd($parentCategories->toArray());
        $postHot = Post::query()->with(['tags', 'photos', 'author'])
            ->where('is_hot', true)
            ->paginate(6);
        $postsNews = Post::query()->with(['tags', 'photos', 'author'])->latest('id')
            ->paginate(1);
        $postsView = Post::query()->with(['tags', 'photos', 'author'])
            ->orderBy('is_view', 'desc')
            ->take(6)
            ->paginate(6);
        // dd($categories);
        return view('client.index', compact('parentCategories', 'postsView', 'postsNews', 'postHot'));
    }
    public function search(Request $request)
    {
        $parentCategories = Category::query()
        ->with('children') // Load danh mục con
        ->whereNull('parent_id') // Lấy các danh mục cha (có parent_id là null)
        ->get();
        $keyWord = $request->input('name');
        // dd($keyWord);    
        $posts = Post::where('name', 'LIKE', "%$keyWord%")->get();
        return view('client.search', compact('posts', 'parentCategories'));
    }
    public function about()
    {
        $parentCategories = Category::query()
        ->with('children') // Load danh mục con
        ->whereNull('parent_id') // Lấy các danh mục cha (có parent_id là null)
        ->get();
        return view('client.about', compact('parentCategories'));
    }
    public function contact()
    {
        $parentCategories = Category::query()
        ->with('children') // Load danh mục con
        ->whereNull('parent_id') // Lấy các danh mục cha (có parent_id là null)
        ->get();
        return view('client.contact', compact('parentCategories'));
    }
}
