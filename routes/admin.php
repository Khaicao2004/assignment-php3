<?php

use App\Http\Controllers\Admin\AccountUpgradeController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('users', UserController::class);
    Route::resource('authors', AuthorController::class);
    Route::resource('tags', TagController::class);
    Route::resource('photos', PhotoController::class);
    Route::resource('upgrades', AccountUpgradeController::class);
});

Route::middleware(['auth', 'tpyeCheck'])->group(function () {
    Route::resource('posts', PostController::class);
});
