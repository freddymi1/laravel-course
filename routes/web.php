<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Posts\PostController;
use App\Http\Controllers\Posts\PostLikeController;
use App\Http\Controllers\Users\UserPostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
    return view('home');
})->name('home');


Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/users/{user:username}/posts',[UserPostController::class, 'index'])->name('users.posts');

Route::post('/logout',[LogoutController::class, 'store'])->name('logout');

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'store']);

Route::get('/register',[RegisteController::class, 'index'])->name('register');
Route::post('/register',[RegisteController::class, 'store']);

Route::get('/posts',[PostController::class, 'index'])->name('posts');
Route::get('/posts/{post}',[PostController::class, 'showPost'])->name('posts.show');
Route::post('/posts',[PostController::class, 'store']);
Route::delete('/posts/{post}',[PostController::class, 'destroy'])->name('posts.destroy');


Route::post('/posts/{post}/likes',[PostLikeController::class, 'storeLike'])->name('posts.likes');
Route::delete('/posts/{post}/likes',[PostLikeController::class, 'destroy'])->name('posts.likes');