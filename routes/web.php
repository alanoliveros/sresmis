<?php


use App\Http\Controllers\Academic\ClassController;
use App\Http\Controllers\Academic\ClassRoomController;
use App\Http\Controllers\Academic\DailyAttendanceController;
use App\Http\Controllers\Academic\SubjectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Analytic\IndicatorController;
use App\Http\Controllers\BackOffice\LibraryController;
use App\Http\Controllers\BackOffice\NoticeboardController;
use App\Http\Controllers\BackOffice\SessionController;
use App\Http\Controllers\Manage\AdminStudentController;
use App\Http\Controllers\Manage\AdminTeacherController;
use App\Http\Controllers\SchoolForm1;
use App\Http\Controllers\SchoolForm2;
use App\Http\Controllers\SchoolForm9;
use App\Http\Controllers\Setting\AboutCountroller;
use App\Http\Controllers\Setting\SchoolController;
use App\Http\Controllers\Setting\SystemController;
use App\Http\Controllers\Setting\WebsiteCountroller;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\UserProfileController;
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

/** ================== Admin Controller ================== */
Route::prefix('admin')->middleware('isAdmin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    /** ================== User Profile ================== */
    Route::get('/users-profile', [TemplateController::class, 'usersProfile'])->name('admin.users-profile');
    Route::get('/profile', [UserProfileController::class, 'index'])->name('users-profile');

    /** ================== KPI Controller ================== */
    Route::prefix('analytics')->group(function () {
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















    Route::get('/teachers', [AdminController::class, 'teachers'])->name('admin.teachers');
    Route::post('/add-teacher', [AdminController::class, 'addTeacher'])->name('admin.add-teacher');


    /** ================== Users ================== */
    Route::prefix('manage-users')->group(function () {
        Route::get('/teacher', [AdminTeacherController::class, 'index'])->name('admin.users-teacher');
        Route::get('/add-teacher', [AdminTeacherController::class, 'create'])->name('admin.add.users-teacher');


        Route::get('/student', [AdminStudentController::class, 'index'])->name('admin.users-student');
    });






























    /** ================== Settings ================== */
    Route::prefix('settings')->group(function () {
        Route::get('/system-settings', [SystemController::class, 'index'])->name('admin.system-settings');
        Route::get('/website-settings', [WebsiteCountroller::class, 'index'])->name('admin.website-settings');
        Route::get('/school-settings', [SchoolController::class, 'index'])->name('admin.school-settings');
        Route::get('/about', [AboutCountroller::class, 'index'])->name('admin.about');
    });

    /** ================== Back office ================== */
    Route::prefix('back-office')->group(function () {
        Route::get('/library', [LibraryController::class, 'index'])->name('admin.library');
        Route::get('/session', [SessionController::class, 'index'])->name('admin.session');
        Route::get('/noticeboard', [NoticeboardController::class, 'index'])->name('admin.noticeboard');
    });

    /** ================== Academic ================== */
    Route::prefix('academic')->group(function () {
        Route::get('/daily-attendance', [DailyAttendanceController::class, 'index'])->name('admin.daily-attendance');
        Route::get('/subject', [SubjectController::class, 'index'])->name('admin.subject');
        Route::get('/class', [ClassController::class, 'index'])->name('admin.class');
        Route::get('/class-room', [ClassRoomController::class, 'index'])->name('admin.class-room');
    });


});
/** ======================================= Alan end routing ======================================= */

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
    Route::get('/grades-by-school-year', [TeacherController::class, 'grades_advisory_by_school_year'])->name('sresmis.teacher.advisory.grades-by-school-year');
});

/** Parent Dashboard */
Route::get('/sresmis/parent/dashboard', [TeacherController::class, 'index'])->name('sresmis.parent.dashboard')->middleware('isParent');


/** Student Dashboard */
Route::prefix('sresmis/student')->middleware('isStudent')->group(function () {
    Route::get('/dashboard', [StudentController::class, 'index'])->name('sresmis.student.dashboard');
});
