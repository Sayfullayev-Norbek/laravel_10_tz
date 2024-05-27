<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

// Yangliklar sahifasi route
Route::get('/', [MainController::class, "index"])->name('index');
Route::get("/category/{slug}", [MainController::class, "categoryPosts"]);
Route::get("/post/{slug}", [MainController::class, "postDetail"]);
Route::get("/contact", [MainController::class, "contact"]);

// Admin Route
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])
        ->name('register.create');

    Route::post('/register', [RegisteredUserController::class, 'register'])
        ->name('register.store');

    Route::get('/login', [RegisteredUserController::class, 'login'])
        ->name('register.login');

    Route::post('/login', [RegisteredUserController::class, 'store'])
        ->name('admin.store');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [RegisteredUserController::class, 'logout'])->name('logout');
    Route::get('/admin', [RegisteredUserController::class, 'index'])->name('admin.index');
});

