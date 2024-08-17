<?php

use App\Http\Controllers\Auth\AuthenController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\PostController;
use App\Http\Controllers\Client\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//authencation
//Login
Route::get(
    'login',
    [AuthenController::class, 'showFormLogin']
)->name('login');
Route::post('login', [AuthenController::class, 'login']);

//Register
Route::get('register', [AuthenController::class, 'showFormRegister'])
->name('register');

Route::post('register', [AuthenController::class, 'register']);

//Logout
Route::post('logout', [AuthenController::class, 'logout'])->name('logout');

//view
Route::get('/',[HomeController::class ,'index'])->name('home');
Route::get('gioi-thieu',[HomeController::class ,'about'])->name('about');
Route::get('liên-hệ',[HomeController::class ,'contact'])->name('contact');
Route::post('/search',[HomeController::class ,'search'])->name('search');

Route::controller(PostController::class)->group(function(){
    Route::get('category/{slug}', 'loaiTin')->name('loaitin');
    Route::get('detail/{slug}', 'detail')->name('chitiet');
    //bình luận
    Route::post('binh-luan/{slug}'   , 'binhLuan')
        ->name('binhluan')
        ->middleware(['auth','isMember']);
});

Route::middleware(['auth','isMember'])
->controller(UserController::class)
->group(function(){
    //profile
    Route::get('profile',        'profile')->name('profile');
    Route::put('profile/{user}', 'updateProfile')->name('updateProfile');

    //update Account
    Route::get('upgrade-account', 'showFormAccount')->name('showUpgradeAccount');
    Route::post('upgrade-account', 'upgradeAccount')->name('upgradeAccount');
});
