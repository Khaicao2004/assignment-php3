<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountUpgrade;
use App\Models\Author;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AccountUpgradeController extends Controller
{
    const PATH_VIEW = 'admin.upgrades.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = AccountUpgrade::query()->paginate(5);
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AccountUpgrade $upgrade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AccountUpgrade $upgrade)
    {
        // dd($upgrade);
        return view(self::PATH_VIEW . __FUNCTION__, compact('upgrade'));
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AccountUpgrade $upgrade)
    {
        // dd($request->all());
        if($upgrade->status !== 'pending'){
            return back()->with('error', 'Yêu cầu này đã được xử lý.');
        }
        try {
            
            $upgrade->update($request->all());
            $user = $upgrade->user;
            $user->update(['type' => User::TYPE_AUTHOR]);

            Author::query()->create([
                'user_id' => $user->id,
                'phone' => $upgrade->phone,
                'address' => $upgrade->address,
                'image' => $upgrade->image,
                'is_active' => true
            ]);

            return redirect()->route('upgrades.index')->with('success', 'Yêu cầu nâng cấp đã được phê duyệt thành công.');
        } catch (\Exception $exception) {
            Log::error('Lỗi' . $exception->getMessage());
            return back()->with('error', 'Đã có lỗi xảy ra. Vui lòng thử lại sau.');;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccountUpgrade $upgrade)
    {
        $upgrade->delete();
        return back()->with('success', 'Yêu cầu nâng cấp đã được xóa.');
    }
}
