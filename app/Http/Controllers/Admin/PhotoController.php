<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    const PATH_VIEW = 'admin.photos.';
    const PATH_UPLOAD = 'photos';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data = Photo::query()->latest('id')->get();
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
    public function store(StorePhotoRequest $request)
    {
        try {
            $data = $request->except('file_path');
            $data['is_active'] = isset($data['is_active']) ? 1 : 0;
            if ($request->hasFile('file_path')) {
                $data['file_path'] = Storage::put(self::PATH_UPLOAD, $request->file('file_path'));
            }
            Photo::query()->create($data);
            return redirect()
            ->route('photos.index')
            ->with('success','Thêm thành công');
        } catch (\Exception $exception) {
            return back()->with('error', 'Có lỗi xảy ra!');
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        return view(self::PATH_VIEW . __FUNCTION__,compact('photo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhotoRequest $request, Photo $photo)
    {
        try {
            $data = $request->except('file_path');
            $data['is_active'] = isset($data['is_active']) ? 1 : 0;
            if ($request->hasFile('file_path')) {
                $data['file_path'] = Storage::put(self::PATH_UPLOAD, $request->file('file_path'));
            }
            $currentImage = $photo->file_path;
            $photo->update($data);
            if($request->hasFile('file_path') && Storage::exists($currentImage)){
                Storage::delete($currentImage);
            }
            return back()->with('success', 'Cập nhật thành công');
        } catch (\Exception $exception) {
            return back()->with('error','Lỗi cập nhật');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        $photo->delete();
        return back()->with('success', 'Xóa thành công');
    }
}
