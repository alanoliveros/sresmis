<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;

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
    public function export_sf1($id){

      $students = Student::where(['students.schoolYearId' => $id,'students.teacherId' => auth()->user()->id,])->join('users','students.studentId', 'users.id')->get();

      $reader = IOFactory::createReader('Xlsx');
      $spreadsheet = $reader->load('school-forms/sf1-header.xlsx');

      // $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();

      $spreadsheet->getDefaultStyle()
                  ->getFont()
                  ->setName('SansSerif')
                  ->setSize(10);

// header start
      // $sheet->mergeCells('A1:AT1')->setCellValue('A1','School Form 1 (SF 1) School Register');
      // $sheet->getStyle('A1')->getFont()->setSize(21)->setBold(true);
      // $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      
      // $sheet->mergeCells('A2:AT2')->setCellValue('A2','(This replaces  Form 1, Master List & STS Form 2-Family Background and Profile)');
      // $sheet->getStyle('A2')->getFont()->setSize(7)->setItalic(true);
      // $sheet->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

// school header info
      // $sheet->mergeCells('A3:E3')->setCellValue('A3','School ID');
      // $sheet->getStyle('A3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
      
  // end school header info


// end header

      foreach($students as $key=>$student){
        $start = $key+7;
        // lrn
          $sheet->mergeCells('A'.$start.':B'.$start)->setCellValue('A'.$start, $student->lrn)->getStyle('A'.$start)->getFont()->setSize(7);
          $sheet->getStyle('A'.$start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
          $sheet->getStyle('A'.$start.':B'.$start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
          
        // end lrn

        // students complete name
          $sheet->mergeCells('A'.$start.':B'.$start)->setCellValue('A'.$start, $student->lrn)->getStyle('A'.$start)->getFont()->setSize(7);
          $sheet->getStyle('A'.$start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
          $sheet->getStyle('A'.$start.':B'.$start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
        // end students complete name

      }
      
      // $writer = new Xlsx($spreadsheet);
      // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      // header('Content-Disposition: attachment; filename="'. urlencode('helloworld.xlsx').'"');
      // $writer->save('php://output');
      

      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment; filename="'. urlencode('SF-1.xlsx').'"');
      $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
      $writer->save('php://output');


    }
    public function readtemplate(){


    
      

    }
}
