<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
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

// Web API Routes
Route::post('/user-registration', [UserController::class, 'UserRegistration']);
Route::post('/user-login', [UserController::class, 'UserLogin']);

// User Logout
Route::get('/logout', [UserController::class, 'UserLogout']);

// Page Routes
Route::get('/login', [UserController::class, 'LoginPage']);
Route::get('/registration', [UserController::class, 'RegistrationPage']);
Route::get('/dashboard', [DashboardController::class, 'DashboardPage'])->middleware([TokenVerifyMiddleware::class]);
Route::get('/user-profile-page', [UserController::class, 'ProfilePage'])->middleware([TokenVerifyMiddleware::class]);
Route::get('/user-profile', [UserController::class, 'UserProfile'])->middleware([TokenVerifyMiddleware::class]);
Route::get('/customer', [CustomerController::class, 'CustomerPage'])->middleware([TokenVerifyMiddleware::class]);

// Customer API
Route::post('/create-customer', [CustomerController::class, 'CreateCustomer'])->middleware([TokenVerifyMiddleware::class]);
Route::get('/customer-list', [CustomerController::class, 'CustomerList'])->middleware([TokenVerifyMiddleware::class]);
Route::post('/update-customer', [CustomerController::class, 'UpdateCustomer'])->middleware([TokenVerifyMiddleware::class]);
Route::post('/delete-customer', [CustomerController::class, 'DeleteCustomer'])->middleware([TokenVerifyMiddleware::class]);
Route::post('/customer-by-id', [CustomerController::class, 'CustomerById'])->middleware([TokenVerifyMiddleware::class]);