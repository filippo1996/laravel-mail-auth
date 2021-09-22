<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ContactController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::name('api.')->group(function(){
    Route::resource('posts', PostController::class);
    Route::get('/nav-top', function(){
        return [
            [
                'path' => '/',
                'label' => 'Home',
                'routeName' => 'home'
            ],
            [
                'path' => '/posts',
                'label' => 'Posts',
                'routeName' => 'posts'
            ],
            [
              'path' => '/about',
              'label' => 'Chi siamo?',
              'routeName' => 'about'
            ]
        ];
    });

    // Form contact
    Route::post('/contact', [ContactController::class, 'store'])->name('contact');
});
