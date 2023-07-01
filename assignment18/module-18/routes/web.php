<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PostController::class, 'index']);

Route::delete('/posts/{id}/delete', [PostController::class, 'destroy'])->name('posts.delete');

Route::get('/categories/{id}/posts', [CategoryController::class, 'getCategoryPosts'])->name('category.posts');

Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');