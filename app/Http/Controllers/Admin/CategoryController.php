<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    const PATH_VIEW = 'admin.categories.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data = Category::query()->latest('id')->get();
       return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $data['is_active'] = isset($data['is_active']) ? 1 : 0;
            $data['slug'] = Str::slug($request->name);
            Category::query()->create($data);
            return redirect()
            ->route('categories.index')
            ->with('success','Thêm thành công');
        } catch (\Exception $exception) {
            return back()->with('error', 'Có lỗi xảy ra!');
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view(self::PATH_VIEW . __FUNCTION__,compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        try {
            $data = $request->all();
            $data['is_active'] = isset($data['is_active']) ? 1 : 0;
            $category->update($data);
            return back()->with('success', 'Cập nhật thành công');
        } catch (\Exception $exception) {
            return back()->with('error','Lỗi cập nhật');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }
}
