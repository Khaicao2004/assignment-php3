<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth','isAdmin'])->group(function(){
    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class);
});