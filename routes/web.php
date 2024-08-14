<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminPostController;

Route::resource('posts', PostController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Admin dashboard
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // User management routes
    Route::resource('users', UserController::class);

    // Blog post management routes
    Route::resource('posts', AdminPostController::class);
});
