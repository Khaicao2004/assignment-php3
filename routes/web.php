<?php

use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\PostController;
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

Route::get('/',[HomeController::class ,'index'])->name('home');
Route::post('/search',[HomeController::class ,'search'])->name('search');
Route::get('loai-tin/{id}',[PostController::class,'loaiTin'])->name('loaitin');
Route::get('chi-tiet/{id}',[PostController::class, 'show'])->name('chitiet');


