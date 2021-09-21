<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// gestione rotte auth
Auth::routes();

// home page guest
//Route::get('/', [HomeController::class, 'index']);
Route::view('/{any}', 'layouts.app')->where('any','.*');
