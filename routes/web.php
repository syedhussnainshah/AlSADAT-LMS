<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('forgot-password', function () {
    return view('Dashboard.Auth.forgot-password');
});
Route::post('forgot-submit', [AuthController::class, 'forgotsubmit']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('new-password/{email}/{token', [AuthController::class, 'newpassword']);
Route::post('new-pas}sword-submit', [AuthController::class, 'newpasswordsubmit']);
Route::get('signin', function () {
    return view('Dashboard.Auth.login');
});
Route::post('signin-submit', [AuthController::class, 'login']);
Route::get('signup', function () {
    return view('Dashboard.Auth.registration');
});
Route::post('signup-submit', [AuthController::class, 'create']);


Route::middleware(['Session'])->group(function () {
    Route::get('index', [AuthController::class, 'index']);
    Route::get('AF', [StudentController::class, 'AddmissionForm']);
    Route::post('AS', [StudentController::class, 'addstudent']);
    Route::get('All-Student', [StudentController::class, 'allstudent']);
    Route::post('Student-Update-Form', [StudentController::class, 'StudentUdatedForm']);
    Route::post('US', [StudentController::class, 'UpdateStudent']);

    // Campus Id 
    Route::get('Campus-Attendances', [StudentController::class, 'campusselects']);




    Route::get('Go-To-Class', [StudentController::class, 'GoToClass']);
});

Route::get('Campus-Attendance/{id}', [StudentController::class, 'campusselect']);
