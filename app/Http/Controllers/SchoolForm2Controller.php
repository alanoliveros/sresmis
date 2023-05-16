<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;



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
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Section;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\DB;

use PhpOffice\PhpSpreadsheet\Style\Font;

use PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf;


use Dompdf\Dompdf;
use Dompdf\Options;


class SchoolForm2Controller extends Controller
{
    public function index()
    {
        $sessions = Session::orderBy('school_year', 'desc')->get();
        return view('web.backend.teacher.school-forms.sf2.index')->with([
            'sessions' => $sessions,
        ]);
    }

    public function export()
    {
        // $spreadsheet = new Spreadsheet();

        // // Get the active sheet
        // $sheet = $spreadsheet->getActiveSheet();

        // // Data for the cells
        // $data = ['Value 1', 'Value 2', 'Value 3', 'Value 4', 'Value 5'];

        // // Counter variable
        // $counter = 0;

        // // Iterate over the data array
        // foreach ($data as $value) {
        //     $column = chr(65 + $counter); // Get the column letter based on the counter

        //     // Set the cell value
        //     $sheet->setCellValue($column . '1', $value);

        //     // Check if the counter is divisible by 2
        //     if ($counter % 2 == 0 && $counter > 0) {
        //         $previousColumn = chr(65 + $counter - 1); // Get the previous column letter

        //         // Merge the cells in the range of previousColumn1 to column1
        //         $sheet->mergeCells($previousColumn . '1:' . $column . '1');
        //     }

        //     $counter++;
        // }


        // Create a new spreadsheet instance

        $spreadsheet = new Spreadsheet();

        // Get the active sheet
        $worksheet = $spreadsheet->getActiveSheet();

        // Set the cell values
        $worksheet->setCellValue('A1', 'School Form 2 (SF2) Daily Attendance Report of Learners');
        $worksheet->setCellValue('A2', '(This replaces Form 1, Form 2 & STS Form 4 - Absenteeism and Dropout Profile)');
        $worksheet->setCellValue('A4', 'School ID');
        $worksheet->setCellValue('B4', '126674');
        $worksheet->setCellValue('D4', 'School Year');
        $worksheet->setCellValue('E4', '2021 - 2022');
        $worksheet->setCellValue('G4', 'Report for the Month of');
        $worksheet->setCellValue('H4', 'Learner Attendance Conversion Tool');
        $worksheet->setCellValue('A6', 'Name of School');
        $worksheet->setCellValue('B6', 'San Roque ES');
        $worksheet->setCellValue('D6', 'Grade Level');
        $worksheet->setCellValue('E6', 'Grade 1');
        $worksheet->setCellValue('G6', 'Section');
        $worksheet->setCellValue('H6', 'GRADE 1-DAISY');

        // Merge cells for the heading
        $worksheet->mergeCells('A1:H1');
        $worksheet->mergeCells('A2:H2');

        // Center align the heading
        $headingStyle = $worksheet->getStyle('A1:H2');
        $headingStyle->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Set font style for the heading
        $fontStyle = $headingStyle->getFont();
        $fontStyle->setSize(14);
        $fontStyle->setBold(true);


        // // Save the spreadsheet as a file
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . urlencode('SF-1.xlsx') . '"');
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }
}
