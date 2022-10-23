<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;


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
    $posts = Post::latest()->paginate(5);
    $postnew = Post::orderBy('created_at', 'desc')->limit(8)->get();
    return view('index', compact('posts','postnew'));
});

Route::get('/article/{id}', [App\Http\Controllers\PostController::class, 'view'])->name('article');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/posts', App\Http\Controllers\PostController::class);
});
