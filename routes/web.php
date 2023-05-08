<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\Indicator\PerformanceIndicatorController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ModalityController;
use App\Http\Controllers\SchoolForm1;
use App\Http\Controllers\SchoolForm2;
use App\Http\Controllers\SchoolForm9;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TemplateController;
use App\Models\Student;
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

    /** Template Controller
     * This is for the route of the sidebar menu
     */
    Route::get('/components-alerts', [TemplateController::class, 'componentAlerts'])->name('admin.components-alerts');
    Route::get('/components-accordion', [TemplateController::class, 'componentAccordion'])->name('admin.components-accordion');
    Route::get('/components-badges', [TemplateController::class, 'componentBadges'])->name('admin.components-badges');
    Route::get('/components-breadcrumbs', [TemplateController::class, 'componentBreadcrumbs'])->name('admin.components-breadcrumbs');
    Route::get('/components-buttons', [TemplateController::class, 'componentButtons'])->name('admin.components-buttons');
    Route::get('/components-cards', [TemplateController::class, 'componentCards'])->name('admin.components-cards');
    Route::get('/components-carousel', [TemplateController::class, 'componentCarousel'])->name('admin.components-carousel');
    Route::get('/components-list-group', [TemplateController::class, 'componentListGroup'])->name('admin.components-list-group');
    Route::get('/components-modal', [TemplateController::class, 'componentModal'])->name('admin.components-modal');
    Route::get('/components-tabs', [TemplateController::class, 'componentTabs'])->name('admin.components-tabs');
    Route::get('/components-pagination', [TemplateController::class, 'componentPagination'])->name('admin.components-pagination');
    Route::get('/components-progress', [TemplateController::class, 'componentProgress'])->name('admin.components-progress');
    Route::get('/components-spinners', [TemplateController::class, 'componentSpinners'])->name('admin.components-spinners');
    Route::get('/components-tooltips', [TemplateController::class, 'componentTooltips'])->name('admin.components-tooltips');

    /** User Profile */
    Route::get('/users-profile', [TemplateController::class, 'usersProfile'])->name('admin.users-profile');



});


/** Key Performance Indicator */
Route::middleware('isAdmin')->resource('performance-indicator', PerformanceIndicatorController::class);
/** Modality */
Route::middleware('isAdmin')->resource('modality', ModalityController::class);

/** Inventory */
Route::middleware('isAdmin')->resource('inventory', InventoryController::class);

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
    // filter student by school year | advisory
    Route::post('/student-advisory-by-school-year', [TeacherController::class, 'student_advisory_by_school_year'])->name('sresmis.teacher.advisory.by-school-year');

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

    // Student Information
    // By Subject
    Route::get('/by-subject', [TeacherController::class, 'info_by_subject'])->name('sresmis.teacher.by-subject');
    
    
    // Student Grades
    // By Advisory
    Route::get('/grades-advisory', [TeacherController::class, 'grades_advisory'])->name('sresmis.teacher.grades.advisory');
    // Filter By School Year
    Route::get('/grades-by-school-year', [TeacherController::class, 'grades_advisory_by_school_year'])->name('sresmis.teacher.advisory.grades-by-school-year');


});

/** Parent Dashboard */
Route::get('/sresmis/parent/dashboard', [TeacherController::class, 'index'])->name('sresmis.parent.dashboard')->middleware('isParent');


/** Student Dashboard */
Route::prefix('sresmis/student')->middleware('isStudent')->group(function () {
    Route::get('/dashboard', [StudentController::class, 'index'])->name('sresmis.student.dashboard');
});
