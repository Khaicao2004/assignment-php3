<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class UserController extends Controller
{
    const PATH_VIEW = 'admin.users.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $data = User::query()->latest('id')->get();
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
    public function store(StoreUserRequest $request)
    {
        try{
            User::query()->create($request->all());
            return redirect()->route('users.index')->with('success', 'Thêm thành công');
        }catch(\Exception $exception){
            Log::error('Lỗi thêm bài viết: ' . $exception->getMessage());
            return back()->with('error','Lỗi');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view(self::PATH_VIEW . __FUNCTION__,compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view(self::PATH_VIEW . __FUNCTION__,compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try{
            $data =$request->all();
            $user->update($data);
            return back()->with('success', 'Cập nhật thành công');
        }catch(\Exception $exception){
            Log::error('Lỗi: ' . $exception->getMessage());
            return back()->with('error','Lỗi');
        }
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
      $user->delete();
      return back();
    }
}
