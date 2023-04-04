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
Route::get('/sresmis/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('sresmis.admin.dashboard')->middleware('isAdmin');


// TeacherController
Route::get('/sresmis/teacher/dashboard', [App\Http\Controllers\TeacherController::class, 'index'])->name('sresmis.teacher.dashboard')->middleware('isTeacher');

// ParentController
Route::get('/sresmis/student/dashboard', [App\Http\Controllers\TeacherController::class, 'index'])->name('sresmis.student.dashboard')->middleware('isStudent');

// ParentController
Route::get('/sresmis/parent/dashboard', [App\Http\Controllers\TeacherController::class, 'index'])->name('sresmis.parent.dashboard')->middleware('isParent');



Route::get('/sresmis/teacher/attendance', [App\Http\Controllers\TeacherController::class, 'attendance'])->name('sresmis.teacher.attendance')->middleware('isTeacher');
Route::get('/sresmis/teacher/grades', [App\Http\Controllers\TeacherController::class, 'grades'])->name('sresmis.teacher.grades')->middleware('isTeacher');
Route::get('/sresmis/teacher/students-information', [App\Http\Controllers\TeacherController::class, 'students_information'])->name('sresmis.teacher.students_information')->middleware('isTeacher');

 // teacher school forms
Route::get('/sresmis/teacher/school-form-9', [App\Http\Controllers\TeacherController::class, 'sf9'])->name('sresmis.teacher.sf9')->middleware('isTeacher');
