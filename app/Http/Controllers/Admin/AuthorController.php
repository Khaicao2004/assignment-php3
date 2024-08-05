<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    const PATH_VIEW = 'admin.authors.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $data = Author::query()->latest('id')->get();
      return view(self::PATH_VIEW . __FUNCTION__,compact('data'));
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
    public function store(StoreAuthorRequest $request)
    {
        try{
            $data = $request->all();
            $data['is_active'] = isset($data['is_active']) ? 1 : 0;
            Author::query()->create($data);
            return redirect()->route('authors.index')->with('success', 'Thêm thành công');
        }catch(\Exception $exception){
            return back()->with('error','Có lỗi xảy ra' . $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view(self::PATH_VIEW . __FUNCTION__,compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view(self::PATH_VIEW . __FUNCTION__,compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        try {
            $data = $request->all();
            $data['is_active'] = isset($data['is_active']) ? 1 : 0;
            $author->update($data);
            return back()->with('success', 'Cập nhật thành công');
        } catch (\Exception $exception) {
            return back()->with('error','Có lỗi xảy ra');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
      $author->delete();
      return back()->with('success', 'Xóa thành công');
    }
}
