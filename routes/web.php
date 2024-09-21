<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\Auth\RegisterController;

Route::resource('posts', PostController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'store']);

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Admin dashboard
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // User management routes
    Route::resource('users', UserController::class);

    // Blog post management routes
    Route::resource('posts', AdminPostController::class);

});

Route::prefix('api')->group(function () {
    // Get list of all blog posts
    Route::get('/posts', [ApiController::class, 'index']);

    // Get details of a single blog post by ID
    Route::get('/posts/{id}', [ApiController::class, 'show']);
});