<?php

use App\Models\Student;
use App\Models\Organization;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrganizationController;

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

Route::get('/employee-dashboard', function() {
    return view('employee.dashboard');
});

Route::get('/sample-dashboard', function() {
    return view('sampleDashboard');
});

Route::get('/dashBase', function() {
    return view('components.dashboard-base');
});

Route::post('/create-student', [StudentController::class, 'create']);
Route::post('/create-employee', [EmployeeController::class, 'create']);
Route::post('/create-organization', [OrganizationController::class, 'create']);