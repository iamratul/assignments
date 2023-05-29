<?php

use App\Http\Controllers\RegistrationController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Redirect;
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

// Task 8: Blade Template Engine
Route::get('/', function () {
    return view('welcome');
});

// Task 1: Request Validation
Route::post('/register', [RegistrationController::class, 'register'])->name('register');

// Task 2: Request Redirect
Route::get('/home', function () {
    return Redirect::to('/dashboard', 302);
});

// Task 4: Route Middleware
Route::middleware([AuthMiddleware::class])->group(function(){
    Route::get('/profile', function () {
        // Profile route logic
    })->name('profile');

    Route::get('/settings', function () {
        // Settings route logic
    })->name('settings');
});