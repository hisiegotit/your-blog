<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SinglePostController;

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

Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::get('/dashboard', [LoginController::class, 'index'])->name('home');

Route::resource('category', CategoryController::class);

Route::resource('customer', CustomerController::class);

Route::resource('post', PostController::class);

Route::get('/', [HomeController::class, 'index']);

Route::get('/search', [HomeController::class, 'search']);


Route::get('/post/{id}', [SinglePostController::class, 'show']);
