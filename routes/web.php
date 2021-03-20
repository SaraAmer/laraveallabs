<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});

    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/create' ,[PostController::class,'create'])->name('post.create');
    Route::get('/edit' ,[PostController::class,'edit'])->name('post.edit');
    Route::get('/show/{post}' , [PostController::class , 'show'])->name('post.show');
    