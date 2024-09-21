<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    const PATH_VIEW = 'admin.categories.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data = Category::query()->with(['children.parent'])->latest('id')->get();
       return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parentCategories = Category::query()->with(['children'])->whereNull('parent_id')->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
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
            Log::error('Lỗi thêm danh mục ' . $exception->getMessage());
            return back()->with('error', 'Lỗi thêm danh mục');
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
        $parentCategories = Category::query()->with(['children'])->whereNull('parent_id')->get();
        return view(self::PATH_VIEW . __FUNCTION__, compact('category','parentCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            $data = $request->all();
            $data['is_active'] = isset($data['is_active']) ? 1 : 0;
            $category->update($data);
            return back()->with('success', 'Cập nhật thành công');
        } catch (\Exception $exception) {
            Log::error('Lỗi cập nhật danh mục' . $exception->getMessage());
            return back()->with('error', 'Lỗi cập nhật danh mục');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return back()->with('success', 'Xóa đơn vị thành công');
        } catch (\Exception $exception) {
            Log::error('Lỗi xóa danh mục sản phẩm ' . $exception->getMessage());
            return back()->with('error', 'Lỗi xóa đơn vị');
        }
    }
}
