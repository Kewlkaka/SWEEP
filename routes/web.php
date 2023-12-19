<?php

use App\Models\Student;
use App\Models\Organization;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\LoginController;

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
    return view('index');
    session()->flush();
});

//Render Signup View
Route::get('/signUp', function() {
    return view('users.signup');
});

Route::get('/dashboard', function() {
    return view('users.dashboard');
});

Route::get('student-dashboard',[StudentController::class,'dashboard']);

Route::post('/create-student', [StudentController::class, 'create']);
Route::post('/create-employee', [EmployeeController::class, 'create']);
Route::post('/create-organization', [OrganizationController::class, 'create']);


Route::get('/login',[LoginController::class,'index']);

Route::middleware(['web'])->group(function () {
    Route::post('/login', [LoginController::class, 'login']);
});
Route::get('/logout',[LoginController::class,'logout']);