<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\Indicator\PerformanceIndicatorController;
use App\Http\Controllers\ModalityController;
use App\Http\Controllers\SchoolForm1;
use App\Http\Controllers\SchoolForm2;
use App\Http\Controllers\SchoolForm9;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Auth;
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

/** Admin Controller */
Route::prefix('sresmis/admin')->middleware('isAdmin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('sresmis.admin.dashboard');
    Route::get('/teachers', [AdminController::class, 'teachers'])->name('sresmis.admin.teachers');
    Route::post('/add-teacher', [AdminController::class, 'addTeacher'])->name('sresmis.admin.add-teacher');
});

/** Key Performance Indicator */
Route::middleware('isAdmin')->resource('performance-indicator', PerformanceIndicatorController::class);
/** Modality  */
Route::middleware('isAdmin')->resource('modality', ModalityController::class);

/** Subjects */
Route::prefix('sresmis/admin')->middleware('isAdmin')->group(function () {
    Route::get('/manage-subjects', [AdminController::class, 'manageSubjects'])->name('manage-subjects');
    Route::get('/{name}/{id}', [AdminController::class, 'addsubjectByGradeLevel']);
    Route::post('/add-subjectBygradeLevel', [AdminController::class, 'add_subjectBygradeLevel'])->name('add-subjectBygradeLevel');
});

/** Section */
Route::prefix('sresmis/admin')->middleware('isAdmin')->group(function () {
    Route::post('/getSection', [AdminController::class, 'getSection']);
    Route::get('/manage-sections', [AdminController::class, 'manageSections'])->name('manage-sections');
    Route::post('/create-section', [AdminController::class, 'create_section'])->name('create-section');
});

/** Manage Class Schedules */
Route::prefix('sresmis/admin')->middleware('isAdmin')->group(function () {
    Route::get('/manage-class-schedules', [AdminController::class, 'manage_class_schedules'])->name('manage-class-schedules');
    Route::get('/schedules/view-by-gradelevel/{name}', [AdminController::class, 'view_by_gradeLevel']);
    Route::get('/schedules/view-by-section/{sid}/{gid}', [AdminController::class, 'view_by_section']);
    Route::post('/schedules/add-schedule-by-section', [AdminController::class, 'add_schedule_by_section'])->name('add-schedule-by-section');
});


Route::prefix('sresmis/teacher')->middleware('isTeacher')->group(function () {
    /** Teacher Controller */
    Route::get('/dashboard', [TeacherController::class, 'index'])->name('sresmis.teacher.dashboard');
    Route::get('/advisory', [TeacherController::class, 'advisory'])->name('sresmis.teacher.advisory');
    Route::get('/grades/filter', [TeacherController::class, 'filterGrades'])->name('sresmis.teacher.grades.filter');

    /** Add Student */
    Route::post('/add-student', [TeacherController::class, 'addStudent'])->name('sresmis.teacher.add-student');
    Route::get('/delete-student/{id}', [TeacherController::class, 'deleteStudent']);

    /** Teacher Attendance */
    Route::get('/attendance/advisory', [TeacherController::class, 'attendance'])->name('sresmis.teacher.attendance.by-advisory');
    Route::post('/submit-attendance/advisory', [TeacherController::class, 'submit_attendance']);


    // 
    Route::get('/add-attendance-by-advisory', [TeacherController::class, 'add_attendance_by_advisory']);
    Route::get('/grades', [TeacherController::class, 'grades'])->name('sresmis.teacher.grades');
    Route::get('/students-information', [TeacherController::class, 'students_information'])->name('sresmis.teacher.students_information');

    /** Teacher School Forms */
    // sf1
    Route::get('/school-form-1', [SchoolForm1::class, 'sf1'])->name('sresmis.teacher.sf1');
    Route::post('/get-student-sf1-by-school-year', [SchoolForm1::class, 'get_student_sf1_by_sy']);
    Route::get('/export-sf1/{id}', [SchoolForm1::class, 'export_sf1']);
    Route::get('/read', [SchoolForm1::class, 'readtemplate']);

    // sf2
    Route::get('/school-form-2', [SchoolForm2::class, 'sf2'])->name('sresmis.teacher.sf2');

    // sf9
    Route::get('/school-form-9', [SchoolForm9::class, 'sf9'])->name('sresmis.teacher.sf9');


    /** Manage Class Schedules */
    Route::get('/class-schedule', [TeacherController::class, 'class_schedule'])->name('sresmis.teacher.class-schedule');
});


/** Student Dashboard */
Route::get('/sresmis/student/dashboard', [TeacherController::class, 'index'])->name('sresmis.student.dashboard')->middleware('isStudent');

/** Parent Dashboard */
Route::get('/sresmis/parent/dashboard', [TeacherController::class, 'index'])->name('sresmis.parent.dashboard')->middleware('isParent');

