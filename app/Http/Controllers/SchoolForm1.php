<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Models\Session;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Section;
use App\Models\User;
class SchoolForm1 extends Controller
{
    public function sf1(){
        $sessions = Session::orderBy('school_year','desc')->get();
        


        return view('backend.teacher.school-forms.school-form-1.index')->with([
                'sessions' => $sessions,
        ]);
    }
    public function get_student_sf1_by_sy(Request $request){
       $students = Student::where([
        'students.schoolYearId' => $request->sy_id,
        'students.teacherId' => auth()->user()->id,
       ])->join('users','students.studentId', 'users.id')->get();

       $myInfo = Teacher::where('teacherId', auth()->user()->id)->first();
       $section_gradeLevel = Section::where('sections.id', $myInfo->sectionId)->join('grade_levels', 'sections.gradeLevelId','grade_levels.id')->first();

       $male = Student::where([
        'students.schoolYearId' => $request->sy_id,
        'students.teacherId' => auth()->user()->id,
        'users.gender' => 'Male',
       ])->join('users','students.studentId', 'users.id')->get('users.gender');

       $female = Student::where([
        'students.schoolYearId' => $request->sy_id,
        'students.teacherId' => auth()->user()->id,
        'users.gender' => 'Female',
       ])->join('users','students.studentId', 'users.id')->get('users.gender');

        

       return response()->json([
        'students' => $students,
        'myInfo' => $myInfo,
        'section_gradeLevel' => $section_gradeLevel,
        'male' => $male,
        'female' => $female,
      
      ]);
    }
    public function export_sf1(){

      $users = User::all();
      $spreadsheet = new Spreadsheet();
      $activeWorksheet = $spreadsheet->getActiveSheet();

      

      foreach($users as $key=>$user){
        $start = $key+4;
          $activeWorksheet->setCellValue('A'.$start, $user->name);
      }
      $writer = new Xlsx($spreadsheet);
      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment; filename="'. urlencode('helloworld.xlsx').'"');
      $writer->save('php://output');


    }
}
