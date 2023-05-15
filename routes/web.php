<?php


use App\Http\Controllers\Academic\ClassController;
use App\Http\Controllers\Academic\ClassRoomController;
use App\Http\Controllers\Academic\DailyAttendanceController;
use App\Http\Controllers\Academic\GradeLevelController;
use App\Http\Controllers\Academic\SectionController;
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
use App\Http\Controllers\SchoolForm10;
use App\Http\Controllers\Setting\AboutCountroller;
use App\Http\Controllers\Setting\SchoolController;
use App\Http\Controllers\Setting\SystemController;
use App\Http\Controllers\Setting\WebsiteCountroller;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Teacher\StudentGradeController;
use App\Http\Controllers\Notifications\MailboxController;
use App\Http\Controllers\Attendance\StudentAttendance;

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

/** ======================================= Admin start routing ======================================= */
Route::get('/home', [AdminController::class, 'index'])->name('admin.dashboard')->middleware('isAdmin');
/** ================== Admin Controller ================== */
Route::prefix('admin')->middleware('isAdmin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    /** ================== User Profile ================== */
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
        Route::post('/add-teacher', [AdminTeacherController::class, 'create'])->name('admin.add.users-teacher');


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
        Route::get('/grade-level', [GradeLevelController::class, 'index'])->name('admin.grade-level');




        Route::get('/section', [SectionController::class, 'index'])->name('admin.section');
        Route::post('/getSection', [SectionController::class, 'getSection']);

        Route::post('/create', [SectionController::class, 'create'])->name('admin.section.create');




        Route::get('/subject', [SubjectController::class, 'index'])->name('admin.subject');
        Route::post('/create-subject', [SubjectController::class, 'create'])->name('admin.create-subject');

        Route::get('{gradeLevelName}/{id}', [SubjectController::class, 'show'])->name('admin.show.subject');
    });
});
/** ======================================= Admin end routing ======================================= */


/** Section */
Route::prefix('sresmis/admin')->middleware('isAdmin')->group(function () {
    Route::post('/getSection', [AdminController::class, 'getSection']);
    Route::get('/manage-sections', [AdminController::class, 'manageSections'])->name('manage-sections');
    Route::post('/create-section', [AdminController::class, 'create_section'])->name('create-section');
});



/** Subjects */
Route::prefix('/admin')->middleware('isAdmin')->group(function () {
    /*  Route::get('/manage-subjects', [AdminController::class, 'manageSubjects'])->name('manage-subjects');*/
    Route::get('/{name}/{id}', [AdminController::class, 'addsubjectByGradeLevel']);
    Route::post('/add-subjectBygradeLevel', [AdminController::class, 'add_subjectBygradeLevel'])->name('add-subjectBygradeLevel');
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
    Route::post('/student-information/by-subject/filter', [TeacherController::class, 'filter_info_by_subject'])->name('teacher.student-information.by-subject.filter');


    /** Teacher Controller */
    Route::get('/dashboard', [TeacherController::class, 'index'])->name('teacher.dashboard');
    Route::get('/advisory', [TeacherController::class, 'advisory'])->name('sresmis.teacher.advisory');
    Route::get('/grades/filter', [TeacherController::class, 'filterGrades'])->name('sresmis.teacher.grades.filter');

    /** Add Student */
    Route::post('/add-student', [TeacherController::class, 'addStudent'])->name('sresmis.teacher.add-student');
    Route::get('/delete-student/{id}', [TeacherController::class, 'deleteStudent']);






    /** Teacher Attendance */
    Route::get('/class-attendace/advisory', [StudentAttendance::class, 'advisory_index'])->name('teacher.class-attendance.advisory');
    Route::get('/create-attendance-by-advisory', [StudentAttendance::class, 'create_attendance']);
    Route::post('/submit-attendance/advisory', [TeacherController::class, 'submit_attendance']);

    

    




    //
    
    Route::get('/grades', [TeacherController::class, 'grades'])->name('sresmis.teacher.grades');
    Route::get('/students-information', [TeacherController::class, 'students_information'])->name('sresmis.teacher.students_information');

    /** Teacher School Forms */


    // sf1 teacher.sf1-view
    Route::get('/school-form-1', [SchoolForm1::class, 'index'])->name('teacher.sf1-view');
    Route::post('/get-student-sf1-by-school-year', [SchoolForm1::class, 'get_student_sf1_by_sy']);
    Route::get('/export-sf1/{id}', [SchoolForm1::class, 'export_sf1']);
    Route::get('/read', [SchoolForm1::class, 'readtemplate']);
    
    Route::post('/import-sf1-excel', [SchoolForm1::class, 'import'])->name('teacher.import-sf1-excel');











    // sf2
    Route::get('/sf2-view', [SchoolForm2::class, 'index'])->name('teacher.sf2-view');










    // sf9
    Route::get('/sf9-view', [SchoolForm9::class, 'index'])->name('teacher.sf9-view');







    // sf10
    Route::get('/sf10-view', [SchoolForm10::class, 'index'])->name('teacher.sf10-view');
    Route::post('/sf-10/find-section', [SchoolForm10::class, 'get_section']);
    Route::post('/sf-10/find-students', [SchoolForm10::class, 'get_students']);









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
    Route::post('/student-grades/filter-students', [StudentGradeController::class, 'filter_students'])->name('teacher.student-grades.filter-students');
    Route::post('/student-grades/transmuted-grade', [StudentGradeController::class, 'transmuted_grade']);
    // create grade
    Route::get('/create-grade/{sy}/{sub}/{sec}/{qtr}', [StudentGradeController::class, 'create_grade']);
    // save grades
    Route::post('/student-grades/save-grades', [StudentGradeController::class, 'save_grade']);






    // teacher/fetchMessage-for-teacher
    Route::get('/fetchMessage-for-teacher', [MailboxController::class, 'fetch_for_teacher']);



    Route::get('/mailbox', [MailboxController::class, 'teacher_index'])->name('teacher.mailbox');
    Route::post('/filter-send-to', [MailboxController::class, 'messageTo']);
    Route::post('/submit-message-to', [MailboxController::class, 'save_message']);
});

/** Parent Dashboard */
Route::get('/sresmis/parent/dashboard', [TeacherController::class, 'index'])->name('sresmis.parent.dashboard')->middleware('isParent');


/** Student Dashboard */
Route::prefix('sresmis/student')->middleware('isStudent')->group(function () {
    Route::get('/dashboard', [StudentController::class, 'index'])->name('sresmis.student.dashboard');
});
