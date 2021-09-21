<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;

/*
|--------------------------------------------------------------------------
| Admin Routes Prefix dashboard
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('dashboard.index');

// Routing for the controller Post
Route::resource('posts', PostController::class, ['except'=>['show','edit']]);
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post:slug}/edit', [PostController::class, 'edit'])->name('posts.edit');

// Routing for the controller Category
Route::resource('category', CategoryController::class);