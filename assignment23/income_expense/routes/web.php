<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerifyMiddleware;
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

Route::post('/user-registration', [UserController::class, 'UserRegistration']);
Route::post('/user-login', [UserController::class, 'UserLogin']);

// User Logout
Route::get('/logout', [UserController::class, 'UserLogout']);

// Page Route
Route::get('/login', [UserController::class, 'LoginPage']);
Route::get('/registration', [UserController::class, 'RegistrationPage']);
Route::get('/dashboard', [UserController::class, 'DashboardPage'])->middleware([TokenVerifyMiddleware::class]);
Route::get('/user-profile-page', [UserController::class, 'ProfilePage'])->middleware([TokenVerifyMiddleware::class]);
Route::get('/user-profile', [UserController::class, 'UserProfile'])->middleware([TokenVerifyMiddleware::class]);
Route::post('/update-user-profile', [UserController::class, 'UpdateUserProfile'])->middleware([TokenVerifyMiddleware::class]);