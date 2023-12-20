<?php

use App\Models\Student;
use App\Models\Organization;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SweepController;
use App\Http\Controllers\Login2Controller;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\SweepHistoriesController;

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
});

//Render Signup View
Route::get('/signUp', function() {
    return view('users.signup');
});

Route::get('/dashboard', function() {
    return view('users.dashboard');
});

Route::get('/student-dashboard',[StudentController::class,'dashboard']);

Route::get('/employee-dashboard', function() {
    return view('employee.dashboard');
});

Route::post('/create-task', [SweepController::class, 'createTask']);

Route::post('/assign-student', [SweepHistoriesController::class, 'store'])
    ->name('assign.student');

Route::get('/fetch-sweep-histories', [SweepHistoriesController::class, 'fetchHistories'])
    ->name('fetch.sweep.histories');

Route::get('/dashBase', function() {
    return view('components.dashboard-base');
});

Route::post('/create-student', [StudentController::class, 'create']);
Route::post('/create-employee', [EmployeeController::class, 'create']);
Route::post('/create-organization', [OrganizationController::class, 'create']);


Route::get('/login',[LoginController::class,'index']);

Route::middleware(['web'])->group(function () {
    Route::post('/login', [LoginController::class, 'login']);
});

Route::middleware(['web'])->group(function () {
    Route::post('/login', [LoginController::class, 'login']);
});

Route::get('/logout',[LoginController::class,'logout']);