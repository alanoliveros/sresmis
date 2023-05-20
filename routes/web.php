<?php


use App\Http\Controllers\Academic\ClassController;
use App\Http\Controllers\Academic\ClassRoomController;
use App\Http\Controllers\Academic\ClassScheduleController;
use App\Http\Controllers\Academic\DailyAttendanceController;
use App\Http\Controllers\Academic\GradeLevelController;
use App\Http\Controllers\Academic\SectionController;
use App\Http\Controllers\Academic\SubjectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Analytic\IndicatorController;
use App\Http\Controllers\BackOffice\LibraryController;
use App\Http\Controllers\BackOffice\NoticeboardController;
use App\Http\Controllers\BackOffice\SessionController;
use App\Http\Controllers\EnrollmentProfileController;
use App\Http\Controllers\Manage\AdminStudentController;
use App\Http\Controllers\Manage\AdminTeacherController;
use App\Http\Controllers\SchoolForm1Controller;
use App\Http\Controllers\SchoolForm2Controller;
use App\Http\Controllers\SchoolForm9;
use App\Http\Controllers\Setting\AboutCountroller;
use App\Http\Controllers\Setting\SchoolController;
use App\Http\Controllers\Setting\SystemController;
use App\Http\Controllers\Setting\WebsiteCountroller;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Teacher\StudentGradeController;
use App\Http\Controllers\Teacher\GradingComponentController;
use App\Http\Controllers\Notifications\MailboxController;
use App\Http\Controllers\Attendance\StudentAttendance;
use App\Http\Controllers\Teacher\QuarterlyGradeController;
use App\Http\Controllers\Teacher\GradeSummaryController;

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
    Route::get('/enrollment-profile', [EnrollmentProfileController::class, 'index'])->name('enrollmentprofile.dashboard');


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
        /*Route::get('/teacher', [AdminTeacherController::class, 'index'])->name('admin.users-teacher');
        Route::post('/add-teacher', [AdminTeacherController::class, 'create'])->name('admin.add.users-teacher');*/
        /*Route::get('/student', [AdminStudentController::class, 'index'])->name('admin.users-student');*/

        Route::post('/getStudents/by-school-year-and-grade-level', [AdminStudentController::class, 'getStudentsBySchoolYearAndGradeLevel']);
        Route::post('/getStudents/by-student-year', [AdminStudentController::class, 'getStudentsFilterBySchoolYear'])->name('admin.student.get_students_by_year');



        Route::resource('teacher', AdminTeacherController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
        Route::resource('student', AdminStudentController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

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
        /*Route::get('/class-schedule', [ClassController::class, 'index'])->name('admin.class');*/
        Route::get('/class-room', [ClassRoomController::class, 'index'])->name('admin.class-room');
        Route::get('/grade-level', [GradeLevelController::class, 'index'])->name('admin.grade-level');


        /** ================== class schedule ================== */
        Route::resource('class-schedule', ClassScheduleController::class)->only(['index', 'show', 'store']);

        Route::get('/class-schedule/{sid}/{gid}', [ClassScheduleController::class, 'show_by_section']);

        /*Route::get('/class-schedule', [AdminController::class, 'index'])->name('manage-class-schedules');*/
        /*Route::get('/schedules/view-by-gradelevel/{name}', [AdminController::class, 'view_by_gradeLevel']);*/
        /*Route::post('/schedules/add-schedule-by-section', [AdminController::class, 'add_schedule_by_section'])->name('add-schedule-by-section');*/


        /** ================== Section ================== */
        Route::resource('section', SectionController::class)->only(['index', 'store']);
        Route::post('/getSection', [SectionController::class, 'getSection']);


        Route::get('/subject', [SubjectController::class, 'index'])->name('admin.subject');
        Route::post('/create-subject', [SubjectController::class, 'create'])->name('admin.create-subject');

        Route::get('{gradeLevelName}/{id}', [SubjectController::class, 'show'])->name('admin.show.subject');
    });
});
/** ======================================= Admin end routing ======================================= */


/** Section */
Route::prefix('sresmis/admin')->middleware('isAdmin')->group(function () {
    //    Route::post('/getSection', [AdminController::class, 'getSection']);
    Route::get('/manage-sections', [AdminController::class, 'manageSections'])->name('manage-sections');
    Route::post('/create-section', [AdminController::class, 'create_section'])->name('create-section');
});



// /** Subjects */
//Route::prefix('/admin')->middleware('isAdmin')->group(function () {
//    Route::get('/manage-subjects', [AdminController::class, 'manageSubjects'])->name('manage-subjects');
//    Route::get('/{name}/{id}', [AdminController::class, 'addsubjectByGradeLevel']);
//    Route::post('/add-subjectBygradeLevel', [AdminController::class, 'add_subjectBygradeLevel'])->name('add-subjectBygradeLevel');
//});



/** Manage Class Schedules */
/*Route::prefix('sresmis/admin')->middleware('isAdmin')->group(function () {
    Route::get('/manage-class-schedules', [AdminController::class, 'manage_class_schedules'])->name('manage-class-schedules');
    Route::get('/schedules/view-by-gradelevel/{name}', [AdminController::class, 'view_by_gradeLevel']);
    Route::get('/schedules/view-by-section/{sid}/{gid}', [AdminController::class, 'view_by_section']);
    Route::post('/schedules/add-schedule-by-section', [AdminController::class, 'add_schedule_by_section'])->name('add-schedule-by-section');
});*/

Route::prefix('teacher')->middleware('isTeacher')->group(function () {

    // Dashboard and Advisory
    Route::get('/dashboard', [TeacherController::class, 'index'])->name('teacher.dashboard');
    Route::get('/advisory', [TeacherController::class, 'advisory'])->name('sresmis.teacher.advisory');
    Route::get('/grades/filter', [TeacherController::class, 'filterGrades'])->name('sresmis.teacher.grades.filter');
    Route::get('/delete-student/{id}', [TeacherController::class, 'deleteStudent']);

    // Attendance and Class Schedule
    // advisory
    Route::get('/class-attendance/advisory', [StudentAttendance::class, 'advisory_index'])->name('teacher.class-attendance.advisory');
    Route::get('/create-attendance-by-advisory', [StudentAttendance::class, 'create_attendance']);
    // Route::get('/class-schedule', [TeacherController::class, 'class_schedule'])->name('teacher.class-schedule');


    // subject
    Route::get('/class-attendance/subject', [StudentAttendance::class, 'subject_index'])->name('teacher.class-attendance.subject');
    Route::get('/create-attendance-by-subject/{ids}', [StudentAttendance::class, 'create_attendance_subject']);
    Route::post('/attendance/filter-section/by-subject', [StudentAttendance::class, 'filter_section']);
    Route::post('/attendance/view-student/by-subject', [StudentAttendance::class, 'view_student_subject']);

    // Grades and Student Information
    Route::get('/grades', [TeacherController::class, 'grades'])->name('sresmis.teacher.grades');
    Route::get('/students-information', [TeacherController::class, 'students_information'])->name('sresmis.teacher.students_information');
    Route::get('/student-grades', [TeacherController::class, 'student_grades'])->name('sresmis.teacher.student-grades');
    Route::get('/create-grade/{sy}/{sub}/{sec}/{qtr}', [StudentGradeController::class, 'create_grade']);

    // Student inf by sub
    Route::post('/student-information/filter-section', [TeacherController::class, 'filter_section']);


    // School Forms

    // sf1
    Route::get('/school-form-1', [SchoolForm1Controller::class, 'index'])->name('teacher.sf1-view');
    Route::get('/export-sf1/{id}', [SchoolForm1Controller::class, 'export_sf1']);
    Route::get('/export-sf1-by-school_year', [SchoolForm1Controller::class, 'export']);

    // teacher/SchoolForm2Controller
    Route::get('/export-sf2-by-school_year', [SchoolForm2Controller::class, 'export']);


    Route::get('/read', [SchoolForm1Controller::class, 'readtemplate']);
    Route::get('/sf2-view', [SchoolForm2Controller::class, 'index'])->name('teacher.sf2-view');
    Route::get('/sf9-view', [SchoolForm9::class, 'index'])->name('teacher.sf9-view');
    Route::get('/sf10-view', [SchoolForm1Controller::class, 'index'])->name('teacher.sf10-view');

    // By Subject and Mailbox
    Route::get('/by-subject', [TeacherController::class, 'info_by_subject'])->name('sresmis.teacher.by-subject');
    Route::get('/fetchMessage-for-teacher', [MailboxController::class, 'fetch_for_teacher']);
    Route::get('/mailbox', [MailboxController::class, 'teacher_index'])->name('teacher.mailbox');

    // Other Routes
    Route::post('/student-information/advisory/{id}', [TeacherController::class, 'student_advisory_by_school_year']);
    Route::post('/student-information/by-subject/filter', [TeacherController::class, 'filter_student_by_subject']);
    Route::post('/add-student', [TeacherController::class, 'create_student'])->name('teacher.add-student');


    // Student Attendance
    Route::get('/create-attendance/advisory', [StudentAttendance::class, 'create_attendance'])->name('teacher.create-attendance.advisory');
    Route::post('/save-attendance/advisory', [StudentAttendance::class, 'save_attendance'])->name('teacher.save-attendance.advisory');
    Route::post('/filter-attendance/by-advisory', [StudentAttendance::class, 'filter_attendance']);
    // Student Crud
    Route::get('/student-delete/{id}', [TeacherController::class, 'delete_student']);

    Route::post('/get-student-sf1-by-school-year', [SchoolForm1Controller::class, 'get_student_sf1_by_sy']);
    Route::post('/import-sf1-excel', [SchoolForm1Controller::class, 'import'])->name('teacher.import-sf1-excel');
    Route::post('/sf-10/find-section', [SchoolForm1Controller::class, 'get_section']);
    Route::post('/sf-10/find-students', [SchoolForm1Controller::class, 'get_students']);
    Route::post('/student-grades/filter-school-year', [StudentGradeController::class, 'filter_school_year']);
    Route::post('/student-grades/filter-subject', [StudentGradeController::class, 'filter_by_subject']);
    Route::post('/student-grades/filter-students', [StudentGradeController::class, 'filter_students'])->name('teacher.student-grades.filter-students');
    Route::post('/student-grades/transmuted-grade', [StudentGradeController::class, 'transmuted_grade']);
    Route::post('/student-grades/save-grades', [StudentGradeController::class, 'save_grade']);
    Route::post('/filter-send-to', [MailboxController::class, 'messageTo']);
    Route::post('/submit-message-to', [MailboxController::class, 'save_message']);















    // Student Grading System Written Works Performance Tasks and Quarterly Assessment
    Route::get('/grade-component-index', [GradingComponentController::class, 'index'])->name('teacher.grade-component-index');
    Route::get('/grade-component-create-grade', [GradingComponentController::class, 'create'])->name('teacher.create-grade.grade-component');
    Route::post('/grade-component/filter-subject', [GradingComponentController::class, 'filter_subject']);
    Route::post('/grade-component/save', [GradingComponentController::class, 'save']);

    Route::post('/grade-component/display_subjects', [GradingComponentController::class, 'display_subjects']);


    // Revise
    Route::post('/student-grades/get-subjects-by-school-year', [GradingComponentController::class, 'find_subjects']);
    Route::post('/grade-component/filter-sections', [GradingComponentController::class, 'find_sections']);
    Route::post('/grade-component/filter-students', [GradingComponentController::class, 'filter_students']);

    // Summary of grades
    Route::get('/grade-summary-index', [GradeSummaryController::class, 'index'])->name('teacher.grade-summary-index');
    Route::get('/grade-summary/filter-student', [GradeSummaryController::class, 'filter_student']);























    // Fitler Student grades
    Route::get('/student/grades', [QuarterlyGradeController::class, 'index'])->name('teacher.student.grades');
    Route::post('/student-grade/quarterly', [QuarterlyGradeController::class, 'getStudents']);

    // save quarterly grade by advisory
    Route::get('/create-grade/student-advisory', [QuarterlyGradeController::class, 'createGrade'])->name('teacher.create-grade.student-advisory');
    Route::post('/save-quarterly-grade/by-advisory', [QuarterlyGradeController::class, 'saveGrade'])->name('teacher.save-quarterly-grade.by-advisory');
    Route::post('/student-information/by-subject/filter', [StudentGradeController::class, 'filter_by_subject'])->name('teacher.student-information.by-subject.filter');



    // Fitler Student grades
    Route::get('/teacher/student/grades', [QuarterlyGradeController::class, 'index'])->name('teacher.student.grades');


    // Generate PDF
    Route::get('/generate', [SchoolForm1Controller::class, 'generatePDF']);
});


/** Student Dashboard */
Route::prefix('student')->middleware('isStudent')->group(function () {
    Route::get('/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
});
