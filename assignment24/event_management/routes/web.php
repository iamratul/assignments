<?php

use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\EventController;
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

Route::post('/registration', [UserController::class, 'UserRegistration']);
Route::post('/login', [UserController::class, 'UserLogin']);

// User Logout
Route::get('/logout', [UserController::class, 'UserLogout']);

// Page Route
Route::get('/', [UserController::class, 'LoginPage']);
Route::get('/user-registration', [UserController::class, 'RegistrationPage']);
Route::get('/dashboard', [UserController::class, 'DashboardPage'])->middleware([TokenVerifyMiddleware::class]);
Route::get('/user-profile', [UserController::class, 'ProfilePage'])->middleware([TokenVerifyMiddleware::class]);
Route::get('/user-profile-info', [UserController::class, 'UserProfile'])->middleware([TokenVerifyMiddleware::class]);
Route::post('/update-user-profile', [UserController::class, 'UpdateUserProfile'])->middleware([TokenVerifyMiddleware::class]);

// Event Category API
Route::get('/event-category', [EventCategoryController::class, 'EventCategoryPage'])->middleware([TokenVerifyMiddleware::class]);
Route::get('/event-category-list', [EventCategoryController::class, 'EventCategoryList'])->middleware([TokenVerifyMiddleware::class]);
Route::post('/create-event-category', [EventCategoryController::class, 'CreateEventCategory'])->middleware([TokenVerifyMiddleware::class]);
Route::post('/update-event-category', [EventCategoryController::class, 'UpdateEventCategory'])->middleware([TokenVerifyMiddleware::class]);
Route::post('/delete-event-category', [EventCategoryController::class, 'DeleteEventCategory'])->middleware([TokenVerifyMiddleware::class]);
Route::post('/event-category-by-id', [EventCategoryController::class, 'EventCategoryById'])->middleware([TokenVerifyMiddleware::class]);

// Event API
Route::get('/events', [EventController::class, 'EventPage'])->middleware([TokenVerifyMiddleware::class]);
Route::get('/event-list', [EventController::class, 'EventList'])->middleware([TokenVerifyMiddleware::class]);
Route::post('/create-event', [EventController::class, 'CreateEvent'])->middleware([TokenVerifyMiddleware::class]);
Route::get('/event-details', [EventController::class, 'EventDetails'])->middleware([TokenVerifyMiddleware::class]);
Route::post('/update-event', [EventController::class, 'UpdateEvent'])->middleware([TokenVerifyMiddleware::class]);
Route::post('/delete-event', [EventController::class, 'DeleteEvent'])->middleware([TokenVerifyMiddleware::class]);
Route::post('/event-by-id', [EventController::class, 'EventById'])->middleware([TokenVerifyMiddleware::class]);