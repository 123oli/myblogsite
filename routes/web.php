<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/all-blog', [WelcomeController::class, 'welcomeBlog'])->name('all-blog');
Route::get('/all-post', [WelcomeController::class, 'welcomePost'])->name('all-post');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/blog', [App\Http\Controllers\HomeController::class, 'blog'])->name('blog');

//Posts
Route::get('/posts/{postId}/show', [PostController::class, 'show'])->name('posts.show');
Route::group(['middleware' => 'auth'], function () {
    Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/all', [HomeController::class, 'allPosts'])->name('posts.all');
    Route::get('/posts/{postId}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::post('/posts/{postId}/update', [PostController::class, 'update'])->name('posts.update');
    Route::get('/posts/{postId}/delete', [PostController::class, 'delete'])->name('posts.delete');
});

//Blogs
Route::get('/blogs/{blogId}/show', [BlogController::class, 'show'])->name('blogs.show');
Route::group(['middleware' => 'auth'], function () {
    Route::post('/blogs/store', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('/blogs/all', [HomeController::class, 'allBlogs'])->name('blogs.all');
    Route::get('/blogs/{blogId}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::post('/blogs/{blogId}/update', [BlogController::class, 'update'])->name('blogs.update');
    Route::get('/blogs/{blogId}/delete', [BlogController::class, 'delete'])->name('blogs.delete');
});

//Admin routes
Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->middleware('admin')->name('dashboard');
});


