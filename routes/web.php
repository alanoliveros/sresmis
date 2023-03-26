<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


// AdminController
Route::get('/sresmis/admin/dashboard', [App\Http\Controllers\Auth\AdminController::class, 'index'])->name('sresmis.admin.dashboard')->middleware('isAdmin');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/sresmis/admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('sresmis.admin.dashboard');

// Route::get('/sresmis/admin/performance-indicator', [App\Http\Controllers\AdminController::class, 'performance_indicator'])->name('sresmis.admin.performance-indicator');
// End of AdminController


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// TeacherController


Route::get('/sresmis/teacher/dashboard', [App\Http\Controllers\TeacherController::class, 'index'])->name('sresmis.teacher.dashboard');
Route::get('/sresmis/teacher/attendance', [App\Http\Controllers\TeacherController::class, 'attendance'])->name('sresmis.teacher.attendance');
Route::get('/sresmis/teacher/grades', [App\Http\Controllers\TeacherController::class, 'grades'])->name('sresmis.teacher.grades');
Route::get('/sresmis/teacher/students-information', [App\Http\Controllers\TeacherController::class, 'students_information'])->name('sresmis.teacher.students_information');

// teacher school forms
Route::get('/sresmis/teacher/school-form-1', [App\Http\Controllers\TeacherController::class, 'sf1'])->name('sresmis.teacher.sf1');
