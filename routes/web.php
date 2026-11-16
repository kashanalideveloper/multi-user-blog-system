<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorPostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserProfileController;

// Public Blog Routes
Route::get('/', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/news', [BlogController::class, 'news'])->name('news.index');
Route::view('/services', 'pages.services')->name('services');
Route::view('/faq', 'pages.faq')->name('faq');
Route::view('/privacy-policy', 'pages.privacy-policy')->name('privacy-policy');
Route::view('/terms-and-conditions', 'pages.terms-and-conditions')->name('terms-and-conditions');
Route::get('/posts/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/categories/{category}', [BlogController::class, 'category'])->name('blog.category');
Route::get('/@{username}', [UserProfileController::class, 'show'])
    ->where('username', '^(?!admin-user$)[A-Za-z0-9][A-Za-z0-9_-]*$')
    ->name('profile.show');
Route::get('/authors/{author}', [BlogController::class, 'author'])->name('blog.author');

// Guest & Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Comment Route
Route::post('/posts/{post}/comments', [BlogController::class, 'storeComment'])->name('comments.store')->middleware('auth');

// Author Routes
Route::middleware(['auth', 'role:author,admin'])->prefix('author')->name('author.')->group(function () {
    Route::get('/posts', [AuthorPostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [AuthorPostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [AuthorPostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [AuthorPostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [AuthorPostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [AuthorPostController::class, 'destroy'])->name('posts.destroy');
});

// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::patch('/users/{user}/role', [AdminController::class, 'updateUserRole'])->name('users.role');
    Route::get('/categories', [AdminController::class, 'categories'])->name('categories');
    Route::post('/categories', [AdminController::class, 'storeCategory'])->name('categories.store');
});
