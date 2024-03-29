<?php

use App\Http\Controllers\UserController;
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

Route::post('registration', [UserController::class, 'UserRegister']);
Route::post('login', [UserController::class, 'UserLogin']);
Route::get('logout', [UserController::class, 'logout']);
