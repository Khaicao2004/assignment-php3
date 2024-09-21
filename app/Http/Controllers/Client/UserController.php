<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\AccountUpgrade;
use App\Models\Author;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Mockery\CountValidator\AtMost;

class UserController extends Controller
{
    public function profile()
    {
        $parentCategories = Category::query()
        ->with('children') // Load danh mục con
        ->whereNull('parent_id') // Lấy các danh mục cha (có parent_id là null)
        ->get();
        $user = Auth::user();
        return view('client.profile', compact('user', 'parentCategories'));
    }
    public function updateProfile(Request $request, User $user)
    {
        $request->validate([
            'name' => 'string|required|max:50',
            'password' => 'nullable|min:8|confirmed'
        ]);

        $data = $request->only('name');
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('profile')->with('success', 'Cap nhat thanh cong');
    }
    public function showFormAccount()
    {
        $parentCategories = Category::query()
        ->with('children') // Load danh mục con
        ->whereNull('parent_id') // Lấy các danh mục cha (có parent_id là null)
        ->get();
        return view('client.upgrade-account', compact('parentCategories'));
    }
    public function upgradeAccount(Request $request)
    {

        $request->validate([
            'phone' => 'required|max:11',
            'address' => 'required|max:255|string',
            'image' => 'nullable|mimes:png,jpg'
        ]);

        $user = Auth::user();

        try {
            
            AccountUpgrade::query()->create([
                'user_id' => $user->id,
                'phone' => $request->phone,
                'address' => $request->address,
                'image' => Storage::put('authors', $request->file('image')),
                'status' => 'pending'
            ]);

            return redirect()->route('profile')->with('success', 'Yêu cầu nâng cấp tài khoản của bạn đã được gửi. Vui lòng chờ phê duyệt từ admin.');
        } catch (\Exception $exception) {
            Log::error('Lỗi' . $exception->getMessage());
            return back()->with('error', 'Đã có lỗi xảy ra. Vui lòng thử lại sau.');;
        }
    }
}
