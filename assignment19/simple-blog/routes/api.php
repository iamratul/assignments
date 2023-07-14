<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Ajax Call Routes
Route::get('/postsData', [PostController::class, 'postsData']);
Route::get('/postData', [PostController::class, 'postData']);
Route::get('/posts/{id}', [PostController::class, 'show'])->name('post');
Route::get('/users/{id}', [UserController::class, 'show']);
