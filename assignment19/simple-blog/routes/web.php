<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
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

Route::get('/', [PostController::class, 'AllPost']);
// Route::get('/posts/{id}', [PostController::class, 'show'])->name('post');
Route::get('/posts/{id}', [PostController::class, 'getPost']);
Route::post('/comments', [CommentController::class, 'store']);

Route::get('/users/{id}', [UserController::class, 'show']);

// Ajax Call Routes
Route::get('/postsData', [PostController::class, 'postsData']);
Route::get('/postData', [PostController::class, 'getPost']);