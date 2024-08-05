<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    const PATH_VIEW = 'admin.tags.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data = Tag::query()->latest('id')->get();
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
    public function store(StoreTagRequest $request)
    {
        try {
            $data = $request->all();
            $data['is_active'] = isset($data['is_active']) ? 1 : 0;
            Tag::query()->create($data);
            return redirect()
            ->route('tags.index')
            ->with('success','Thêm thành công');
        } catch (\Exception $exception) {
            return back()->with('error', 'Có lỗi xảy ra!');
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view(self::PATH_VIEW . __FUNCTION__,compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        try {
            $data = $request->all();
            $data['is_active'] = isset($data['is_active']) ? 1 : 0;
            $tag->update($data);
            return back()->with('success', 'Cập nhật thành công');
        } catch (\Exception $exception) {
            return back()->with('error','Lỗi cập nhật');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $Tag)
    {
        $Tag->delete();
        return back();
    }
}
