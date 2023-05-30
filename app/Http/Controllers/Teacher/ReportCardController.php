<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\GradeLevelSubject;
use Illuminate\Http\Request;

use App\Models\Session;
use App\Models\User;
use App\Models\Teacher;
use App\Models\School;
use App\Models\Student;
use App\Models\QuarterlySummaryGrade;
use App\Models\StudentReportCardCoreValues;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
// use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use Illuminate\Support\Facades\Hash;

use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class ReportCardController extends Controller
{
    public function index()
    {
        $sessions = Session::orderBy('school_year', 'desc')->get();
        return view('web.backend.teacher.report-card.index', [
            'sessions' => $sessions
        ]);
    }
    public function filter_students(Request $request)
    {

        $teacher = Teacher::where('teacherId', auth()->user()->id)->first();
        $students = Student::where([
            'teacherId' => auth()->user()->id,
            'adminId' => $teacher->adminId,
            'school_year' => $request->sy,
            'gradeLevelId' => $teacher->gradeLevelId,
        ])
            ->join('users', 'students.studentId', 'users.id')
            ->orderBy('users.lastname', 'asc')
            ->get();

        $subjects = GradeLevelSubject::where([
            'grade_level_subjects.admin_id' => $teacher->adminId,
            'grade_level_subjects.grade_level_id' => $teacher->gradeLevelId,
            'grade_level_subjects.school_year' => $request->sy,
        ])
            ->join('subjects', 'grade_level_subjects.subject_id', 'subjects.id')
            ->orderBy('subjects.id', 'asc')
            ->get();



        return response()->json([
            'students' => $students,
            'subjects' => $subjects,
        ]);
    }
    public function create(Request $request)
    {
        // $student_grades = $request->data;

        foreach ($request->data['subject_ids'] as $key => $id) {
            $teacher = Teacher::where('teacherId', auth()->user()->id)->first();
            $student_card = QuarterlySummaryGrade::firstOrNew([
                'school_year' => $request->data['sy'],
                'student_id' => $request->data['student_id'],
                'subject_id' => $id['id'],
                'admin_id' => $teacher->adminId,
                'teacher_id' => auth()->user()->id,
            ]);
            $student_card->school_year = $request->data['sy'];
            $student_card->admin_id = $teacher->adminId;
            $student_card->subject_id = $id['id'];
            $student_card->teacher_id = auth()->user()->id;
            $student_card->student_id = $request->data['student_id'];
            $student_card->section_id = $teacher->sectionId;
            $student_card->grade_level_id = $teacher->gradeLevelId;
            $student_card->quarter_1 = $id['grades'][0];
            $student_card->quarter_2 = $id['grades'][1];
            $student_card->quarter_3 = $id['grades'][2];
            $student_card->quarter_4 = $id['grades'][3];
            $student_card->final_grade = $id['finalGrading'];
            $student_card->remarks = $id['remarks'];
            $student_card->save();
        }

        $core_values = [
            'makadiyos' => $request->data['makadiyos'],
            'makatao' => $request->data['makatao'],
            'makakalikasan' => $request->data['makakalikasan'],
            'makabansa_first' => $request->data['makabansa_first'],
            'makabansa_second' => $request->data['makabansa_second'],
        ];

        foreach ($core_values as $key => $core) {
            $student_core_value = StudentReportCardCoreValues::firstOrNew([
                'student_id' => $request->data['student_id'],
                'admin_id' => $teacher->adminId,
                'teacher_id' => auth()->user()->id,
                'school_year' =>  $request->data['sy'],
                'core_values' =>  $key,
            ]);

            // $student_core_value->admin_id = 
            $student_core_value->teacher_id = auth()->user()->id;
            $student_core_value->student_id = $request->data['student_id'];
            $student_core_value->school_year = $request->data['sy'];
            $student_core_value->core_values = $key;
            $student_core_value->quarter_1 = $core[0];
            $student_core_value->quarter_2 = $core[1];
            $student_core_value->quarter_3 = $core[2];
            $student_core_value->quarter_4 = $core[3];
            $student_core_value->save();
        }

        return response()->json([
            'status' => 'success',
        ]);
    }
    public function show(Request $request)
    {

        $teacher = Teacher::where('teacherId', auth()->user()->id)->first();
        $student_card = QuarterlySummaryGrade::where([
            'school_year' => $request->sy,
            'student_id' => $request->student_id,
        ])
            ->get();

        $core_values = StudentReportCardCoreValues::where([
            'admin_id' => $teacher->adminId,
            'teacher_id' => auth()->user()->id,
            'student_id' => $request->student_id,
        ])->get();

        return response()->json([
            'students' => $student_card,
            'core_values' => $core_values,
        ]);
    }
    public function print_excel()
    {
        $spreadsheet = new Spreadsheet();

        // Get the active sheet
        $sheet = $spreadsheet->getActiveSheet();

        // Merge cells B5 to AF5
        $sheet->mergeCells('B5:AF5');

        // Set the value of the merged cells
        $sheet->setCellValue('B5', 'Republic of the Philippines');

        // Center align the text
        $sheet->getStyle('B5')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Set the font name and size
        $sheet->getStyle('B5')->getFont()->setName('Times New Roman');
        $sheet->getStyle('B5')->getFont()->setSize(9);

        // Calculate the approximate width in points for 12 pixels
        $columnWidth = 12 / 6.57; // Approximate conversion from pixels to points

        // Set the width of cells B5 to AF5
        foreach (range('B', 'AF') as $column) {
            $sheet->getColumnDimension($column)->setWidth($columnWidth);
        }

        // Create a PDF writer instance
        $writer = new Mpdf($spreadsheet);



        // Add another sheet
        // $sheet2 = $spreadsheet->createSheet();
        // $sheet2->setTitle('Sheet 2');
        // $sheet2->setCellValue('A1', 'Data for Sheet 2');

        // Save the spreadsheet
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . urlencode('SF-1.xlsx') . '"');
        // $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }

    // word
    public function print_word($id, $sy)
    {
        
        $teacher_detail = Teacher::where('teachers.teacherId', auth()->user()->id)
        ->join('users', 'teachers.teacherId', 'users.id')
        ->first();
        $teacher = new TemplateProcessor('storage/school-forms/SF-9/SF_9.docx');
        $school = School::where('adminId', $teacher_detail->adminId)->first();
        $teacher->setValue('schoolRegion', $school->schoolRegion);
        $teacher->setValue('schoolDivision', $school->schoolDivision);
        $teacher->setValue('schoolDistrict', $school->schoolDistrict);
        $teacher->setValue('schoolName', $school->schoolName);
        $student = QuarterlySummaryGrade::where('student_id', $id)->get();
        $student_detail = User::where('users.id',$id)
        ->join('students', 'users.id', 'students.studentId')
        ->join('grade_levels', 'students.gradeLevelId', 'grade_levels.id')
        ->join('sections', 'students.sectionId', 'sections.id')
        ->first();
        $admin_detail = User::find($teacher_detail->adminId)->first();
        $teacher->setValue('school_year', $sy);
        $fullname = $student_detail->lastname . ', ' . $student_detail->name. ($student_detail->middlename != NULL? ', '.$student_detail->middlename:'');
        $teacher->setValue('fullname', $fullname);
        $teacher->setValue('age', $student_detail->age);
        $teacher->setValue('gender', $student_detail->gender);
        $teacher->setValue('lrn', $student_detail->lrn);
        $teacher->setValue('sectionName', $student_detail->sectionName);
        $teacher->setValue('gradeLevelName', $student_detail->gradeLevelName);
        $teacherfullname = $teacher_detail->lastname . ', ' . $teacher_detail->name. ($teacher_detail->middlename != NULL? ', '.$teacher_detail->middlename:'');
        $teacher->setValue('teacherfullname', $teacherfullname);
        $adminfullname = $admin_detail->lastname . ', ' . $admin_detail->name. ($admin_detail->middlename != NULL? ', '.$admin_detail->middlename:'');
        $teacher->setValue('adminfullname', $adminfullname);

        $fileName = 'School-Form-9';
        $teacher->saveAs($fileName . '.docx');
        return response()->download($fileName . '.docx')->deleteFileAfterSend(true);
        
    }
}
