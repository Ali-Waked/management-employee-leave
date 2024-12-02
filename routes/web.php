<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeDashboardController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LeaveRequestController;
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

Route::get('/', function () {
    return view('welcome');
});
// Route::view('/dashboard', 'dashboard');

Route::prefix('/admin/dashboard')->middleware(['auth:web'])->group(function () {
    Route::resource('/leave', LeaveController::class)->names('leave');
    Route::resource('/employee', EmployeeController::class)->names('employee');
    Route::resource('/employee/request/leave', LeaveRequestController::class)->only(['index','update'])->names('request.leave');
});
Route::resource('/dashboard/employee', EmployeeDashboardController::class)->names('employee.dashbaord')->middleware('auth:employee');
