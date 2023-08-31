<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeaveCategoryController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\RoleController;
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

Route::get('/login', [UserController::class, 'LoginPage']);
Route::get('/registration', [UserController::class, 'RegistrationPage']);

// User Logout
Route::get('/logout', [UserController::class, 'UserLogout']);

Route::get('/user-profile', [UserController::class, 'ProfilePage'])->middleware([TokenVerifyMiddleware::class]);
Route::get('/user-profile-info', [UserController::class, 'UserProfile'])->middleware([TokenVerifyMiddleware::class]);

Route::get('/employee/dashboard', [DashboardController::class, 'EmployeeDashboard'])->middleware([TokenVerifyMiddleware::class . ':employee']);

Route::get('/employee/leave-request', [LeaveController::class, 'LeavePage'])->middleware([TokenVerifyMiddleware::class . ':employee']);
Route::get('/employee/leave-request-list', [LeaveController::class, 'LeaveRequestList'])->middleware([TokenVerifyMiddleware::class . ':employee']);
Route::post('/employee/create-leave-request', [LeaveController::class, 'CreateLeaveRequest'])->middleware([TokenVerifyMiddleware::class . ':employee']);

Route::get('/admin/dashboard', [DashboardController::class, 'AdminDashboard'])->middleware([TokenVerifyMiddleware::class . ':admin']);

// Role api
Route::get('/add-role', [RoleController::class, 'AddRole'])->middleware([TokenVerifyMiddleware::class . ':admin']);
Route::post('/create-role', [RoleController::class, 'CreateRole'])->middleware([TokenVerifyMiddleware::class . ':admin']);
Route::get('/role-list', [RoleController::class, 'RoleList'])->middleware([TokenVerifyMiddleware::class . ':admin']);

// Leave Category api
Route::get('/admin/leave-category', [LeaveCategoryController::class, 'LeaveCategory'])->middleware([TokenVerifyMiddleware::class . ':admin']);
Route::post('/admin/create-leave-category', [LeaveCategoryController::class, 'CreateLeaveCategory'])->middleware([TokenVerifyMiddleware::class . ':admin']);
Route::get('/admin/leave-category-list', [LeaveCategoryController::class, 'LeaveCategoryList'])->middleware([TokenVerifyMiddleware::class . ':admin']);
Route::get('/admin/edit-leave-category', [LeaveCategoryController::class, 'EditLeaveCategory'])->middleware([TokenVerifyMiddleware::class . ':admin']);
Route::post('/admin/delete-leave-category', [LeaveCategoryController::class, 'DeleteLeaveCategory'])->middleware([TokenVerifyMiddleware::class . ':admin']);

// Leave Request List api
Route::get('/admin/leave-request', [LeaveRequestController::class, 'LeaveRequest'])->middleware([TokenVerifyMiddleware::class . ':admin']);
Route::get('/admin/leave-request-list', [LeaveRequestController::class, 'LeaveRequestList'])->middleware([TokenVerifyMiddleware::class . ':admin']);
