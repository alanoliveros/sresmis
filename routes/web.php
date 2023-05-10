<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\Analytics\IndicatorController;
use App\Http\Controllers\SchoolForm1;
use App\Http\Controllers\SchoolForm2;
use App\Http\Controllers\SchoolForm9;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Teacher\StudentGradeController;
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

/** ======================================= Alan start routing ======================================= */
/** Admin Controller */
Route::prefix('admin')->middleware('isAdmin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('sresmis.admin.dashboard');
    Route::get('/teachers', [AdminController::class, 'teachers'])->name('sresmis.admin.teachers');
    Route::post('/add-teacher', [AdminController::class, 'addTeacher'])->name('sresmis.admin.add-teacher');

    /** Template Controller */
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
    Route::get('/profile', [UserProfileController::class, 'index'])->name('users-profile');

    /** KPI Controller */
    Route::prefix('analytics')  ->group(function () {
        /**
         * public function promotionIndex() { return view('web.backend.admin.analytics.promotion.index'); }
         * public function retentionIndex() { return view('web.backend.admin.analytics.retention.index'); }
         * public function cohortIndex() { return view('web.backend.admin.analytics.cohort.index'); }
         * public function graduationIndex() { return view('web.backend.admin.analytics.graduation.index'); }
         * public function dropoutIndex() { return view('web.backend.admin.analytics.dropout.index'); }
         * public function failureIndex() { return view('web.backend.admin.analytics.failure.index'); }
         * public function completionIndex() { return view('web.backend.admin.analytics.completion.index'); }
         * public function achievementIndex() { return view('web.backend.admin.analytics.achievement.index'); }
         * public function transitionIndex() { return view('web.backend.admin.analytics.transition.index'); }
         * public function participationIndex() { return view('web.backend.admin.analytics.participation.index'); }
         */

        Route::get('/promotion-rate', [IndicatorController::class, 'promotionIndex'])->name('admin.analytics');
        Route::get('/retention-rate', [IndicatorController::class, 'retentionIndex'])->name('admin.retention');
        Route::get('/cohort-survival-rate', [IndicatorController::class, 'cohortIndex'])->name('admin.cohort');
        Route::get('/graduation-rate', [IndicatorController::class, 'graduationIndex'])->name('admin.graduation');
        Route::get('/dropout-rate', [IndicatorController::class, 'dropoutIndex'])->name('admin.dropout');
        Route::get('/failure-rate', [IndicatorController::class, 'failureIndex'])->name('admin.failure');
        Route::get('/completion-rate', [IndicatorController::class, 'completionIndex'])->name('admin.completion');
        Route::get('/achievement-rate', [IndicatorController::class, 'achievementIndex'])->name('admin.achievement');
        Route::get('/transition-rate', [IndicatorController::class, 'transitionIndex'])->name('admin.transition');
        Route::get('/participation-rate', [IndicatorController::class, 'participationIndex'])->name('admin.participation');

    });

});
/** ======================================= Alan end routing ======================================= */

/** Subjects */
Route::prefix('/admin')->middleware('isAdmin')->group(function () {
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


Route::prefix('teacher')->middleware('isTeacher')->group(function () {
    // Student Information
    // filter student by school year | advisory
    Route::post('/student-information/advisory/{id}', [TeacherController::class, 'student_advisory_by_school_year']);


    // By Subject
    Route::get('/by-subject', [TeacherController::class, 'info_by_subject'])->name('sresmis.teacher.by-subject');
    Route::post('/student-information/by-subject/filter', [TeacherController::class, 'filter_info_by_subject']);


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
    Route::get('/student-grades', [TeacherController::class, 'student_grades'])->name('sresmis.teacher.student-grades');
    // Filter By School Year
    
    // Grading
    // filter by school year
    Route::post('/student-grades/filter-school-year', [StudentGradeController::class, 'filter_school_year']);
    // filter by subject
    Route::post('/student-grades/filter-subject', [StudentGradeController::class, 'filter_by_subject']);
    // filter by students
    Route::post('/student-grades/filter-students', [StudentGradeController::class, 'filter_students']);

});

/** Parent Dashboard */
Route::get('/sresmis/parent/dashboard', [TeacherController::class, 'index'])->name('sresmis.parent.dashboard')->middleware('isParent');


/** Student Dashboard */
Route::prefix('sresmis/student')->middleware('isStudent')->group(function () {
    Route::get('/dashboard', [StudentController::class, 'index'])->name('sresmis.student.dashboard');
});
