<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenController extends Controller
{
    public function showFormLogin(){
        $categories = Category::query()->pluck('name', 'id');
        return view('auth.login', compact('categories'));
     }
     public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
         if(Auth::attempt($credentials)){
             $request->session()->regenerate();
             /**
              * @var User $user
              */
             $user = Auth::user();
             if($user->isAdmin()){
                 return redirect()->route('categories.index');
             }
             return redirect()->route('home');
         }
 
         return back()->withErrors([
             'email' => 'Thông tin không trùng khớp'
             ])->onlyInput('email');
     }
     public function showFormRegister()
     {
        $categories = Category::query()->pluck('name', 'id');
        return view('auth.register', compact('categories'));
     }
     public function register(Request $request)
     {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);
         $user = User::query()->create($request->all());
         Auth::login($user);
         $request->session()->regenerate();
         return redirect()->route('home');
     }

     public function logout(Request $request){
         Auth::logout();
         $request->session()->invalidate();
         $request->session()->regenerateToken();
         return redirect()->route('login');
     }
}
