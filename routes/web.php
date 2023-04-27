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
Route::get('/sresmis/admin/teachers', [App\Http\Controllers\AdminController::class, 'teachers'])->name('sresmis.admin.teachers')->middleware('isAdmin');
Route::post('/sresmis/admin/add-teacher', [App\Http\Controllers\AdminController::class, 'addTeacher'])->name('sresmis.admin.add-teacher')->middleware('isAdmin');
// subjects
Route::get('/sresmis/admin/manage-subjects', [App\Http\Controllers\AdminController::class, 'manageSubjects'])->name('manage-subjects')->middleware('isAdmin');
Route::get('/sresmis/admin/{name}/{id}', [App\Http\Controllers\AdminController::class, 'addsubjectByGradeLevel'])->middleware('isAdmin');
Route::post('/sresmis/admin/add-subjectBygradeLevel', [App\Http\Controllers\AdminController::class, 'add_subjectBygradeLevel'])->name('add-subjectBygradeLevel')->middleware('isAdmin');
// section
Route::post('/sresmis/admin/getSection', [App\Http\Controllers\AdminController::class, 'getSection'])->middleware('isAdmin');
Route::get('/sresmis/admin/manage-sections', [App\Http\Controllers\AdminController::class, 'manageSections'])->name('manage-sections')->middleware('isAdmin');
Route::post('/sresmis/admin/create-section', [App\Http\Controllers\AdminController::class, 'create_section'])->name('create-section')->middleware('isAdmin');
// end section

// manage class schedules
Route::get('/sresmis/admin/manage-class-schedules', [App\Http\Controllers\AdminController::class, 'manage_class_schedules'])->name('manage-class-schedules')->middleware('isAdmin');
Route::get('/sresmis/admin/schedules/view-by-gradelevel/{name}', [App\Http\Controllers\AdminController::class, 'view_by_gradeLevel'])->middleware('isAdmin');
Route::get('/sresmis/admin/schedules/view-by-section/{sid}/{gid}', [App\Http\Controllers\AdminController::class, 'view_by_section'])->middleware('isAdmin');
Route::post('/sresmis/admin/schedules/add-schedule-by-section', [App\Http\Controllers\AdminController::class, 'add_schedule_by_section'])->name('add-schedule-by-section')->middleware('isAdmin');
// TeacherController
Route::get('/sresmis/teacher/dashboard', [App\Http\Controllers\TeacherController::class, 'index'])->name('sresmis.teacher.dashboard')->middleware('isTeacher');
Route::get('/sresmis/teacher/advisory', [App\Http\Controllers\TeacherController::class, 'advisory'])->name('sresmis.teacher.advisory')->middleware('isTeacher');
Route::get('/sresmis/teacher/grades/filter', [App\Http\Controllers\TeacherController::class, 'filterGrades'])->name('sresmis.teacher.grades.filter')->middleware('isTeacher');
// add student
Route::post('/sresmis/teacher/add-student', [App\Http\Controllers\TeacherController::class, 'addStudent'])->name('sresmis.teacher.add-student')->middleware('isTeacher');
Route::get('/sresmis/teacher/delete-student/{id}', [App\Http\Controllers\TeacherController::class, 'deleteStudent'])->middleware('isTeacher');

// ParentController
Route::get('/sresmis/student/dashboard', [App\Http\Controllers\TeacherController::class, 'index'])->name('sresmis.student.dashboard')->middleware('isStudent');

// ParentController
Route::get('/sresmis/parent/dashboard', [App\Http\Controllers\TeacherController::class, 'index'])->name('sresmis.parent.dashboard')->middleware('isParent');



Route::get('/sresmis/teacher/attendance/advisory', [App\Http\Controllers\TeacherController::class, 'attendance'])->name('sresmis.teacher.attendance.by-advisory')->middleware('isTeacher');
Route::get('/sresmis/teacher/grades', [App\Http\Controllers\TeacherController::class, 'grades'])->name('sresmis.teacher.grades')->middleware('isTeacher');
Route::get('/sresmis/teacher/students-information', [App\Http\Controllers\TeacherController::class, 'students_information'])->name('sresmis.teacher.students_information')->middleware('isTeacher');

 // teacher school forms
Route::get('/sresmis/teacher/school-form-9', [App\Http\Controllers\TeacherController::class, 'sf9'])->name('sresmis.teacher.sf9')->middleware('isTeacher');
