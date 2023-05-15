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
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use Illuminate\Support\Facades\Hash;

use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

use App\Models\ParentGuardian;
use App\Models\Session;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Section;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\DB;


use Dompdf\Dompdf;
use Dompdf\Options;


class SchoolForm1Controller extends Controller
{
  public function index()
  {
    $sessions = Session::orderBy('school_year', 'desc')->get();
    $sf1data = Student::join('users', 'students.studentId', 'users.id')
      ->join('addresses', 'users.id', 'addresses.userId')
      ->orderBy('users.gender', 'desc')
      ->orderBy('users.name', 'asc')
      ->where('students.teacherId', auth()->user()->id)
      ->get();

    return view('web.backend.teacher.school-forms.sf1.index')->with([
      'sessions' => $sessions,
      'sf1data' => $sf1data,
    ]);
  }
  public function import(Request $request)
  {
    $request->validate([
      'sf1' => 'required|file|mimes:xls,xlsx'
    ]);

    $teacher_details = Teacher::where('teacherId', auth()->user()->id)->first();
    $the_file = $request->file('sf1');

    try {
      $spreadsheet = IOFactory::load($the_file->getRealPath());
      $sheet        = $spreadsheet->getActiveSheet();
      $row_limit    = $sheet->getHighestDataRow();
      $column_limit = $sheet->getHighestDataColumn();
      $row_range    = range(7, $row_limit);
      $column_range = range('F', $column_limit);
      $startcount = 7;
      $data = array();
      $lastInsertedUserId = null;

      foreach ($row_range as $row) {
        $con = $sheet->getCell('C' . $row)->getValue();
        $break = $sheet->getCell('C' . $row)->getValue();

        if ($con != '<=== TOTAL FEMALE') {
          if ($break == '<=== TOTAL MALE') {
            continue;
          }

          $email = $sheet->getCell('A' . $row)->getValue();
          $gender = $sheet->getCell('G' . $row)->getValue();

          $user = User::firstOrNew(['email' => $email]);
          $user->name = $sheet->getCell('C' . $row)->getValue();
          $user->gender = $gender == 'M' ? 'Male' : 'Female';
          $user->email = $email;
          $user->password = Hash::make(1234);
          $user->role = 3;
          $user->birthdate = $sheet->getCell('H' . $row)->getValue();
          $user->age = $sheet->getCell('J' . $row)->getValue();
          $user->save();

          $lastInsertedUserId = $user->id;

          $student = Student::firstOrNew(['studentId' => $lastInsertedUserId, 'school_year' => $request->school_year]);
          $student->adminId = $teacher_details->adminId;
          $student->teacherId = auth()->user()->id;
          $student->studentId = $lastInsertedUserId;
          $student->school_year = $request->school_year;
          $student->lrn = $email;
          $student->sectionId = $teacher_details->sectionId;
          $student->gradeLevelId = $teacher_details->gradeLevelId;
          $student->mothertongue = $sheet->getCell('L' . $row)->getValue();
          $student->ethnicgroup = $sheet->getCell('N' . $row)->getValue();
          $student->religion = $sheet->getCell('O' . $row)->getValue();
          $student->learning_modality = $sheet->getCell('AR' . $row)->getValue();
          $student->remarks = $sheet->getCell('AS' . $row)->getValue();
          $student->save();

          $address = Address::firstOrNew(['userId' => $lastInsertedUserId]);
          $address->userId = $lastInsertedUserId;
          $address->purok = $sheet->getCell('P' . $row)->getValue();
          $address->barangay = $sheet->getCell('R' . $row)->getValue();
          $address->city = $sheet->getCell('U' . $row)->getValue();
          $address->province = $sheet->getCell('W' . $row)->getValue();
          $address->save();

          $parent = ParentGuardian::firstOrNew(['studentId' => $lastInsertedUserId]);
          $parent->adminId = $teacher_details->adminId;
          $parent->teacherId = auth()->user()->id;
          $parent->studentId = $lastInsertedUserId;
          $parent->fathersFirstName = $sheet->getCell('AB' . $row)->getValue();
          $parent->mothersFirstName = $sheet->getCell('AF' . $row)->getValue();
          $parent->guardiansFirstName = $sheet->getCell('AK' . $row)->getValue();
          $parent->relationshiptoStudent = $sheet->getCell('AO' . $row)->getValue();
          $parent->contactNumber = $sheet->getCell('AP' . $row)->getValue();
          $parent->save();

          $startcount++;
        } elseif ($con == '<=== TOTAL FEMALE') {
          break;
        }
      }

      // Insert into school_form1s table
      // $data[] = [...]; // Uncomment the code and provide the necessary values

      DB::table('school_form1s')->insert($data);
    } catch (Exception $e) {
      return back()->withErrors('There was a problem uploading the data!');
    }

    return back()->withSuccess('Great! Data has been successfully uploaded.');
  }
  // public function export()
  // {
  //   // Fetch data from the database
  //   $students = Student::with('user')->get();

  //   // Create a new Spreadsheet instance
  //   $spreadsheet = new Spreadsheet();
  //   $sheet = $spreadsheet->getActiveSheet();

  //   // Set column headers
  //   $sheet->setCellValue('A1', 'Name');
  //   $sheet->setCellValue('B1', 'Gender');
  //   $sheet->setCellValue('C1', 'Email');
  //   // Add more column headers as needed

  //   // Add data rows
  //   $row = 2;
  //   foreach ($students as $student) {
  //     $sheet->setCellValue('A' . $row, $student->user->name);
  //     $sheet->setCellValue('B' . $row, $student->user->gender);
  //     $sheet->setCellValue('C' . $row, $student->user->email);
  //     // Add more data columns as needed

  //     $row++;
  //   }

  //   // Set the file name
  //   $fileName = 'students.xlsx';

  //   // Create a new Xlsx Writer instance and save the spreadsheet to a file
  //   $writer = new Xlsx($spreadsheet);
  //   $writer->save($fileName);

  //   // Return the file as a download
  //   return response()->download($fileName)->deleteFileAfterSend(true);
  // }

  // public function export()
  // {
  //   // Retrieve the student data from your database
  //   $students = Student::all();

  //   // Load the student data template file
  //   $templatePath = storage_path('app/public/templates/student_data_template.xlsx');
  //   $spreadsheet = IOFactory::load($templatePath);

  //   // Get the active sheet
  //   $sheet = $spreadsheet->getActiveSheet();

  //   // Set the starting row to populate the data
  //   $startRow = 7;

  //   // Iterate over each student and populate the data in the sheet
  //   foreach ($students as $index => $student) {
  //     $row = $startRow + $index;

  //     // Set the values in the corresponding cells
  //     $sheet->setCellValue('A' . $row, $student->name);
  //     $sheet->setCellValue('B' . $row, $student->gender);
  //     $sheet->setCellValue('C' . $row, $student->email);
  //     // Set other student data as needed

  //     // Apply formatting or additional customization if required
  //   }

  //   // Set the file name
  //   $fileName = 'students_data.xlsx';

  //   // Create a new Xlsx Writer instance and save the spreadsheet to a file
  //   $writer = new Xlsx($spreadsheet);
  //   $writer->save($fileName);

  //   // Return the file as a download
  //   return response()->download($fileName)->deleteFileAfterSend(true);
  // }

  // public function export()
  // {
  //   $id = 2022-2023;
  //   $students = Student::where([
  //     'students.school_year' => $id,
  //     'students.teacherId' => auth()->user()->id,
  //   ])
  //     ->join('parent_guardians', 'students.studentId', 'parent_guardians.studentId')
  //     ->join('addresses', 'students.studentId', 'addresses.userId')
  //     ->join('users', 'students.studentId', 'users.id')
  //     ->get();

  //   $reader = IOFactory::createReader('Xlsx');
  //   $spreadsheet = $reader->load('school-forms/sf1-header.xlsx');

  //   $sheet = $spreadsheet->getActiveSheet()->setTitle('school_form_1_ver2014.2.1.1');

  //   $spreadsheet->getDefaultStyle()
  //     ->getFont()
  //     ->setName('SansSerif')
  //     ->setSize(10);

  //   foreach ($students as $key => $student) {
  //     $start = $key + 7;

  //     // lrn
  //     $sheet->mergeCells('A' . $start . ':B' . $start)
  //       ->setCellValue('A' . $start, $student->lrn)
  //       ->getStyle('A' . $start)->getFont()->setSize(7);
  //     $sheet->getStyle('A' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
  //     $sheet->getStyle('A' . $start . ':B' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));

  //     // students complete name
  //     $sheet->mergeCells('C' . $start . ':F' . $start)
  //       ->setCellValue('C' . $start, $student->lastname . ', ' . $student->name . ($student->middlename != NULL ? ', ' . $student->middlename : ''))
  //       ->getStyle('C' . $start)->getFont()->setSize(7);
  //     $sheet->getStyle('C' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
  //     $sheet->getStyle('C' . $start . ':F' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
  //     $sheet->getRowDimension($start)->setRowHeight(30, 'pt');

  //     // gender
  //     $sheet->setCellValue('G' . $start, $student->gender[0])
  //       ->getStyle('G' . $start)->getFont()->setSize(7);
  //     $sheet->getStyle('G' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
  //     $sheet->getStyle('G' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
  //     $sheet->getRowDimension($start)->setRowHeight(30, 'pt');

  //     // birthdate
  //     $sheet->mergeCells('H' . $start . ':I' . $start)
  //       ->setCellValue('H' . $start, date('m-d-Y', strtotime($student->birthdate)))
  //       ->getStyle('H' . $start)->getFont()->setSize(7);
  //     $sheet->getStyle('H' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
  //     $sheet->getStyle('H' . $start . ':I' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
  //     // ...

  //     // Set the page properties for fitting the bond paper
  //     $spreadsheet->getActiveSheet()->getPageSetup()
  //       ->setOrientation(PageSetup::ORIENTATION_LANDSCAPE)
  //       ->setPaperSize(PageSetup::PAPERSIZE_A4)
  //       ->setFitToWidth(1)
  //       ->setFitToHeight(0);

  //     // Auto-size the columns to fit the content
  //     foreach ($sheet->getColumnIterator() as $column) {
  //       $spreadsheet->getActiveSheet()->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
  //     }

  //     // Save the spreadsheet to a file
  //     $writer = new Xlsx($spreadsheet);
  //     $filename = 'export_sf1.xlsx'; // Adjust the filename as needed
  //     $writer->save($filename);

  //     // Download the file
  //     header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  //     header('Content-Disposition: attachment; filename="' . $filename . '"');
  //     header('Cache-Control: max-age=0');

  //     readfile($filename);
  //     unlink($filename); // Delete the temporary file

  //     exit();
  //   }
  // }



  public function get_student_sf1_by_sy(Request $request)
  {
    $students = Student::where([
      'students.schoolYearId' => $request->sy_id,
      'students.teacherId' => auth()->user()->id,
    ])->join('users', 'students.studentId', 'users.id')->get();

    $myInfo = Teacher::where('teacherId', auth()->user()->id)->first();
    $section_gradeLevel = Section::where('sections.id', $myInfo->sectionId)->join('grade_levels', 'sections.gradeLevelId', 'grade_levels.id')->first();

    $male = Student::where([
      'students.schoolYearId' => $request->sy_id,
      'students.teacherId' => auth()->user()->id,
      'users.gender' => 'Male',
    ])->join('users', 'students.studentId', 'users.id')->get('users.gender');

    $female = Student::where([
      'students.schoolYearId' => $request->sy_id,
      'students.teacherId' => auth()->user()->id,
      'users.gender' => 'Female',
    ])->join('users', 'students.studentId', 'users.id')->get('users.gender');



    return response()->json([
      'students' => $students,
      'myInfo' => $myInfo,
      'section_gradeLevel' => $section_gradeLevel,
      'male' => $male,
      'female' => $female,

    ]);
  }

  public function export_sf1($id)
  {

    $students = Student::where(['students.schoolYearId' => $id, 'students.teacherId' => auth()->user()->id,])
      ->join('parent_guardians', 'students.studentId', 'parent_guardians.studentId')
      ->join('addresses', 'students.studentId', 'addresses.userId')
      ->join('users', 'students.studentId', 'users.id')
      ->join('learning_modalities', 'students.learning_modality_id', 'learning_modalities.id')
      ->get();

    $reader = IOFactory::createReader('Xlsx');
    $spreadsheet = $reader->load('school-forms/sf1-header.xlsx');

    // $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet()->setTitle('school_form_1_ver2014.2.1.1');



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

    foreach ($students as $key => $student) {
      $start = $key + 7;
      // lrn
      $sheet->mergeCells('A' . $start . ':B' . $start)->setCellValue('A' . $start, $student->lrn)->getStyle('A' . $start)->getFont()->setSize(7);
      $sheet->getStyle('A' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('A' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('A' . $start . ':B' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));

      // end lrn

      // students complete name
      $sheet->mergeCells('C' . $start . ':F' . $start)->setCellValue('C' . $start, $student->lastname . ', ' . $student->name . ($student->middlename != NULL ? ', ' . $student->middlename : ''))->getStyle('C' . $start)->getFont()->setSize(7);
      $sheet->getStyle('C' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('C' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('C' . $start . ':F' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
      $sheet->getRowDimension($start)->setRowHeight(30, 'pt');
      // end students complete name

      // gender
      $sheet->setCellValue('G' . $start, $student->gender[0])->getStyle('G' . $start)->getFont()->setSize(7);
      $sheet->getStyle('G' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('G' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('G' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
      $sheet->getRowDimension($start)->setRowHeight(30, 'pt');
      // end gender

      // birthdate
      $sheet->mergeCells('H' . $start . ':I' . $start)->setCellValue('H' . $start, date('m-d-Y', strtotime($student->birthdate)))->getStyle('H' . $start)->getFont()->setSize(7);
      $sheet->getStyle('H' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('H' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('H' . $start . ':I' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
      $sheet->getRowDimension($start)->setRowHeight(30, 'pt');
      // end birthdate

      // AGE
      $sheet->mergeCells('J' . $start . ':K' . $start)->setCellValue('J' . $start, $student->age)->getStyle('J' . $start)->getFont()->setSize(7);
      $sheet->getStyle('J' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('J' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('J' . $start . ':K' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
      $sheet->getRowDimension($start)->setRowHeight(30, 'pt');
      // end AGE

      // mothertongue
      $sheet->mergeCells('L' . $start . ':M' . $start)->setCellValue('L' . $start, $student->mothertongue)->getStyle('L' . $start)->getFont()->setSize(7);
      $sheet->getStyle('L' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('L' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('L' . $start . ':M' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
      $sheet->getRowDimension($start)->setRowHeight(30, 'pt');
      // end mothertongue

      // mothertongue
      $sheet->mergeCells('L' . $start . ':M' . $start)->setCellValue('L' . $start, $student->mothertongue)->getStyle('L' . $start)->getFont()->setSize(7);
      $sheet->getStyle('L' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('L' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('L' . $start . ':M' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
      $sheet->getRowDimension($start)->setRowHeight(30, 'pt');
      // end mothertongue

      // ethnic
      $sheet->setCellValue('N' . $start, $student->ethnicgroup)->getStyle('N' . $start)->getFont()->setSize(7);
      $sheet->getStyle('N' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('N' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('N' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
      $sheet->getRowDimension($start)->setRowHeight(30, 'pt');
      // end ethnic

      // religion 
      $sheet->setCellValue('O' . $start, $student->religion)->getStyle('O' . $start)->getFont()->setSize(7);
      $sheet->getStyle('O' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('O' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('O' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
      $sheet->getRowDimension($start)->setRowHeight(30, 'pt');
      // end religion 

      // purok strt
      $sheet->mergeCells('P' . $start . ':Q' . $start)->setCellValue('P' . $start, $student->purok)->getStyle('P' . $start)->getFont()->setSize(7);
      $sheet->getStyle('P' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('P' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('P' . $start . ':Q' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
      $sheet->getRowDimension($start)->setRowHeight(30, 'pt');
      // end purok strt

      // brngy
      $sheet->mergeCells('R' . $start . ':T' . $start)->setCellValue('R' . $start, strtoupper($student->barangay))->getStyle('R' . $start)->getFont()->setSize(7);
      $sheet->getStyle('R' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('R' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('R' . $start . ':T' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
      $sheet->getRowDimension($start)->setRowHeight(30, 'pt');
      // end brngy

      // CIty
      $sheet->mergeCells('U' . $start . ':V' . $start)->setCellValue('U' . $start, strtoupper($student->city))->getStyle('U' . $start)->getFont()->setSize(7);
      $sheet->getStyle('U' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('U' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('U' . $start . ':V' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
      $sheet->getRowDimension($start)->setRowHeight(30, 'pt');
      // end city

      // province
      $sheet->mergeCells('W' . $start . ':AA' . $start)->setCellValue('W' . $start, strtoupper($student->province))->getStyle('W' . $start)->getFont()->setSize(7);
      $sheet->getStyle('W' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('W' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('W' . $start . ':AA' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
      $sheet->getRowDimension($start)->setRowHeight(30, 'pt');
      // end province

      // fathers complete name
      $sheet->mergeCells('AB' . $start . ':AE' . $start)->setCellValue('AB' . $start, $student->fathersLastName . ',' . $student->fathersFirstName . ($student->fathersMiddleName != NULL ? ', ' . $student->fathersMiddleName : ''))->getStyle('AB' . $start)->getFont()->setSize(7);
      $sheet->getStyle('AB' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('AB' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('AB' . $start . ':AE' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
      $sheet->getRowDimension($start)->setRowHeight(30, 'pt');
      // end fathers complete name

      // mothers complete name
      $sheet->mergeCells('AF' . $start . ':AJ' . $start)->setCellValue('AF' . $start, $student->mothersLastName . ',' . $student->mothersFirstName . ($student->mothersMiddleName != NULL ? ', ' . $student->fathersMiddleName : ''))->getStyle('AF' . $start)->getFont()->setSize(7);
      $sheet->getStyle('AF' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('AF' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('AF' . $start . ':AJ' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
      $sheet->getRowDimension($start)->setRowHeight(30, 'pt');
      // end mothers complete name

      // mothers complete name
      $sheet->setCellValue('AR' . $start, $student->mode_name)->getStyle('AR' . $start)->getFont()->setSize(7);
      $sheet->getStyle('AR' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('AR' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('AR' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
      $sheet->getRowDimension($start)->setRowHeight(30, 'pt');
      // end mothers complete name


    }

    // $writer = new Xlsx($spreadsheet);
    // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    // header('Content-Disposition: attachment; filename="'. urlencode('helloworld.xlsx').'"');
    // $writer->save('php://output');


    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . urlencode('SF-1.xlsx') . '"');
    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('php://output');
  }
  public function readtemplate()
  {
  }

  // public function export()
  // {

  //   $students = Student::all();
  //   // Create a new Spreadsheet object
  //   $spreadsheet = new Spreadsheet();

  //   // Set the data to the active sheet
  //   $sheet = $spreadsheet->getActiveSheet();
  //   $sheet->setCellValue('A1', 'Name');
  //   $sheet->setCellValue('B1', 'Age');
  //   $sheet->setCellValue('C1', 'Email');

  //   // Set the student data
  //   $row = 2;
  //   foreach ($students as $student) {
  //     $sheet->setCellValue('A' . $row, $student['name']);
  //     $sheet->setCellValue('B' . $row, $student['age']);
  //     $sheet->setCellValue('C' . $row, $student['email']);
  //     $row++;
  //   }

  //   // Set the page properties for fitting the bond paper
  //   $spreadsheet->getActiveSheet()->getPageSetup()
  //     ->setOrientation(PageSetup::ORIENTATION_LANDSCAPE)
  //     ->setPaperSize(PageSetup::PAPERSIZE_A4)
  //     ->setFitToWidth(1)
  //     ->setFitToHeight(0);

  //   // Auto-size the columns to fit the content
  //   foreach ($sheet->getColumnIterator() as $column) {
  //     $spreadsheet->getActiveSheet()->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
  //   }

  //   // Save the spreadsheet to a file
  //   $writer = new Xlsx($spreadsheet);
  //   $filename = 'students.xlsx'; // Adjust the filename as needed
  //   $writer->save($filename);

  //   // Download the file
  //   header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  //   header('Content-Disposition: attachment; filename="' . $filename . '"');
  //   header('Cache-Control: max-age=0');

  //   readfile($filename);
  //   unlink($filename); // Delete the temporary file

  //   exit();
  // }

  // // Example usage
  // $students = [
  //     ['name' => 'John Doe', 'age' => 25, 'email' => 'john@example.com'],
  //     ['name' => 'Jane Smith', 'age' => 30, 'email' => 'jane@example.com'],
  //     // Add more student data as needed
  // ];

  // exportStudentsToExcel($students);


  // yes functional
  public function export()
  {
    // Load the Excel template

    $students = Student::join('addresses', 'students.studentId', '=', 'addresses.userId')
      ->join('parent_guardians', 'students.studentId', '=', 'parent_guardians.studentId')
      ->join('users', 'students.studentId', '=', 'users.id')
      ->get();
    $templatePath = storage_path('app/public/templates/sf1-header.xlsx');
    $spreadsheet = IOFactory::load($templatePath);

    // Get the active sheet
    $sheet = $spreadsheet->getActiveSheet();

    // Set the student data
    foreach ($students as $key => $student) {
      $start = $key + 7;
      // lrn
      $sheet->mergeCells('A' . $start . ':B' . $start)->setCellValue('A' . $start, $student->lrn)->getStyle('A' . $start)->getFont()->setSize(7);
      $sheet->getStyle('A' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('A' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('A' . $start . ':B' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));

      // end lrn

      // students complete name
      $sheet->mergeCells('C' . $start . ':F' . $start)->setCellValue('C' . $start, $student->lastname . ', ' . $student->name . ($student->middlename != NULL ? ', ' . $student->middlename : ''))->getStyle('C' . $start)->getFont()->setSize(7);
      $sheet->getStyle('C' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('C' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('C' . $start . ':F' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
      $sheet->getRowDimension($start)->setRowHeight(30, 'pt');
      // end students complete name

      // gender
      $sheet->setCellValue('G' . $start, $student->gender)->getStyle('G' . $start)->getFont()->setSize(7);
      $sheet->getStyle('G' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('G' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('G' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
      $sheet->getRowDimension($start)->setRowHeight(30, 'pt');
      // end gender

      // birthdate
      $sheet->mergeCells('H' . $start . ':I' . $start)->setCellValue('H' . $start, date('m-d-Y', strtotime($student->birthdate)))->getStyle('H' . $start)->getFont()->setSize(7);
      $sheet->getStyle('H' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('H' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('H' . $start . ':I' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
      $sheet->getRowDimension($start)->setRowHeight(30, 'pt');
      // end birthdate

      // AGE
      $sheet->mergeCells('J' . $start . ':K' . $start)->setCellValue('J' . $start, $student->age)->getStyle('J' . $start)->getFont()->setSize(7);
      $sheet->getStyle('J' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('J' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('J' . $start . ':K' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
      $sheet->getRowDimension($start)->setRowHeight(30, 'pt');
      // end AGE

      // mothertongue
      $sheet->mergeCells('L' . $start . ':M' . $start)->setCellValue('L' . $start, $student->mothertongue)->getStyle('L' . $start)->getFont()->setSize(7);
      $sheet->getStyle('L' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('L' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('L' . $start . ':M' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
      $sheet->getRowDimension($start)->setRowHeight(30, 'pt');
      // end mothertongue

      // mothertongue
      $sheet->mergeCells('L' . $start . ':M' . $start)->setCellValue('L' . $start, $student->mothertongue)->getStyle('L' . $start)->getFont()->setSize(7);
      $sheet->getStyle('L' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('L' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('L' . $start . ':M' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
      $sheet->getRowDimension($start)->setRowHeight(30, 'pt');
      // end mothertongue

      // ethnic
      $sheet->setCellValue('N' . $start, $student->ethnicgroup)->getStyle('N' . $start)->getFont()->setSize(7);
      $sheet->getStyle('N' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('N' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('N' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
      $sheet->getRowDimension($start)->setRowHeight(30, 'pt');
      // end ethnic

      // religion 
      $sheet->setCellValue('O' . $start, $student->religion)->getStyle('O' . $start)->getFont()->setSize(7);
      $sheet->getStyle('O' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('O' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('O' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
      $sheet->getRowDimension($start)->setRowHeight(30, 'pt');
      // end religion 

      // purok strt
      $sheet->mergeCells('P' . $start . ':Q' . $start)->setCellValue('P' . $start, $student->purok)->getStyle('P' . $start)->getFont()->setSize(7);
      $sheet->getStyle('P' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('P' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('P' . $start . ':Q' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
      $sheet->getRowDimension($start)->setRowHeight(30, 'pt');
      // end purok strt

      // brngy
      $sheet->mergeCells('R' . $start . ':T' . $start)->setCellValue('R' . $start, strtoupper($student->barangay))->getStyle('R' . $start)->getFont()->setSize(7);
      $sheet->getStyle('R' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('R' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('R' . $start . ':T' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
      $sheet->getRowDimension($start)->setRowHeight(30, 'pt');
      // end brngy

      // CIty
      $sheet->mergeCells('U' . $start . ':V' . $start)->setCellValue('U' . $start, strtoupper($student->city))->getStyle('U' . $start)->getFont()->setSize(7);
      $sheet->getStyle('U' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('U' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('U' . $start . ':V' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
      $sheet->getRowDimension($start)->setRowHeight(30, 'pt');
      // end city

      // province
      $sheet->mergeCells('W' . $start . ':AA' . $start)->setCellValue('W' . $start, strtoupper($student->province))->getStyle('W' . $start)->getFont()->setSize(7);
      $sheet->getStyle('W' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('W' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('W' . $start . ':AA' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
      $sheet->getRowDimension($start)->setRowHeight(30, 'pt');
      // end province

      // fathers complete name
      $sheet->mergeCells('AB' . $start . ':AE' . $start)->setCellValue('AB' . $start, $student->fathersLastName . ',' . $student->fathersFirstName . ($student->fathersMiddleName != NULL ? ', ' . $student->fathersMiddleName : ''))->getStyle('AB' . $start)->getFont()->setSize(7);
      $sheet->getStyle('AB' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('AB' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('AB' . $start . ':AE' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
      $sheet->getRowDimension($start)->setRowHeight(30, 'pt');
      // end fathers complete name

      // mothers complete name
      $sheet->mergeCells('AF' . $start . ':AJ' . $start)->setCellValue('AF' . $start, $student->mothersLastName . ',' . $student->mothersFirstName . ($student->mothersMiddleName != NULL ? ', ' . $student->fathersMiddleName : ''))->getStyle('AF' . $start)->getFont()->setSize(7);
      $sheet->getStyle('AF' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('AF' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('AF' . $start . ':AJ' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
      $sheet->getRowDimension($start)->setRowHeight(30, 'pt');
      // end mothers complete name

      // mothers complete name
      $sheet->setCellValue('AR' . $start, $student->mode_name)->getStyle('AR' . $start)->getFont()->setSize(7);
      $sheet->getStyle('AR' . $start)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
      $sheet->getStyle('AR' . $start)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
      $sheet->getStyle('AR' . $start)->getBorders()->getOutline()->setBorderStyle(Border::BORDER_THIN)->setColor(new Color('000000'));
      $sheet->getRowDimension($start)->setRowHeight(30, 'pt');
      // end mothers complete name


    }

    // Set the page properties for fitting the bond paper
    $spreadsheet->getActiveSheet()->getPageSetup()
      ->setOrientation(PageSetup::ORIENTATION_LANDSCAPE)
      ->setPaperSize(PageSetup::PAPERSIZE_A4)
      ->setFitToWidth(1)
      ->setFitToHeight(0);

    // Auto-size the columns to fit the content
    foreach ($sheet->getColumnIterator() as $column) {
      $spreadsheet->getActiveSheet()->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
    }

    // Save the spreadsheet to a file
    $writer = new Xlsx($spreadsheet);
    $filename = 'students.xlsx'; // Adjust the filename as needed
    $writer->save($filename);

    // Download the file
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Cache-Control: max-age=0');

    readfile($filename);
    unlink($filename); // Delete the temporary file

    exit();
  }

  // generate pdf
  public function generatePDF()
  {
    $pdfOptions = new Options();
    $pdfOptions->set('defaultFont', 'Arial');

    $dompdf = new Dompdf($pdfOptions);

    // Render the view file to HTML

    $sessions = Session::orderBy('school_year', 'desc')->get();
    $sf1data = Student::join('users', 'students.studentId', 'users.id')
      ->join('addresses', 'users.id', 'addresses.userId')
      ->orderBy('users.gender', 'desc')
      ->orderBy('users.name', 'asc')
      ->where('students.teacherId', auth()->user()->id)
      ->get();

      $html =  view('web.backend.teacher.school-forms.sf1.index')->with([
      'sessions' => $sessions,
      'sf1data' => $sf1data,
    ])->render();
    // $html = view('web.backend.teacher.school-forms.sf1.index')->render();

    // Load HTML content into Dompdf
    $dompdf->loadHtml($html);

    // (Optional) Set paper size and orientation
    $dompdf->setPaper('A4', 'landscape');
    

    // Render PDF
    $dompdf->render();

    // Output PDF to the browser
    $dompdf->stream('document.pdf', ['Attachment' => false]);
  }
}
