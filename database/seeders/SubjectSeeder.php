<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('subjects')->insert([
        //     [
        //         'adminId' => 1,
        //         'gradeLevelId' => 1,
        //         'subjectName' => 'Mother Tongue',
        //         'description' => 'Mother Tongue subject description',
        //         'written_work_percentage' => 50,
        //         'performance_tasks_percentage' => 30,
        //         'quarterly_assessment_percentage' => 20,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'adminId' => 1,
        //         'gradeLevelId' => 1,
        //         'sectionName' => 1,
        //         'subjectName' => 'Filipino',
        //         'description' => 'Filipino subject description',
        //         'written_work_percentage' => 50,
        //         'performance_tasks_percentage' => 30,
        //         'quarterly_assessment_percentage' => 20,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'adminId' => 1,
        //         'gradeLevelId' => 1,
        //         'sectionName' => 1,
        //         'subjectName' => 'English',
        //         'description' => 'English subject description',
        //         'written_work_percentage' => 50,
        //         'performance_tasks_percentage' => 30,
        //         'quarterly_assessment_percentage' => 20,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'adminId' => 1,
        //         'gradeLevelId' => 1,
        //         'sectionName' => 1,
        //         'subjectName' => 'Mathematics',
        //         'description' => 'Math subject description',
        //         'written_work_percentage' => 40,
        //         'performance_tasks_percentage' => 40,
        //         'quarterly_assessment_percentage' => 20,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'adminId' => 1,
        //         'gradeLevelId' => 1,
        //         'sectionName' => 1,
        //         'subjectName' => 'Science',
        //         'description' => 'Science subject description',
        //         'written_work_percentage' => 40,
        //         'performance_tasks_percentage' => 40,
        //         'quarterly_assessment_percentage' => 20,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'adminId' => 1,
        //         'gradeLevelId' => 1,
        //         'sectionName' => 1,
        //         'subjectName' => 'Araling Panlipunan',
        //         'description' => 'Araling Panlipunan subject description',
        //         'written_work_percentage' => 30,
        //         'performance_tasks_percentage' => 50,
        //         'quarterly_assessment_percentage' => 20,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'adminId' => 1,
        //         'gradeLevelId' => 1,
        //         'sectionName' => 1,
        //         'subjectName' => 'Edukasyon sa Pagpapakatao (EsP)',
        //         'description' => 'EsP subject description',
        //         'written_work_percentage' => 30,
        //         'performance_tasks_percentage' => 30,
        //         'quarterly_assessment_percentage' => 20,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'adminId' => 1,
        //         'gradeLevelId' => 1,
        //         'sectionName' => 1,
        //         'subjectName' => 'Music',
        //         'description' => 'Music subject description',
        //         'written_work_percentage' => 50,
        //         'performance_tasks_percentage' => 30,
        //         'quarterly_assessment_percentage' => 20,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'adminId' => 1,
        //         'gradeLevelId' => 1,
        //         'sectionName' => 1,
        //         'subjectName' => 'Arts',
        //         'description' => 'Arts subject description',
        //         'written_work_percentage' => 50,
        //         'performance_tasks_percentage' => 30,
        //         'quarterly_assessment_percentage' => 20,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'adminId' => 1,
        //         'gradeLevelId' => 1,
        //         'sectionName' => 1,
        //         'subjectName' => 'Physical Education',
        //         'description' => 'Physical Education subject description',
        //         'written_work_percentage' => 50,
        //         'performance_tasks_percentage' => 30,
        //         'quarterly_assessment_percentage' => 20,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'adminId' => 1,
        //         'gradeLevelId' => 1,
        //         'sectionName' => 1,
        //         'subjectName' => 'Health',
        //         'description' => 'Health subject description',
        //         'written_work_percentage' => 50,
        //         'performance_tasks_percentage' => 30,
        //         'quarterly_assessment_percentage' => 20,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'adminId' => 1,
        //         'gradeLevelId' => 1,
        //         'sectionName' => 1,
        //         'subjectName' => 'Edukasyong Pantahanan at Pangkabuhayan (EPP)',
        //         'description' => 'EPP subject description',
        //         'written_work_percentage' => 50,
        //         'performance_tasks_percentage' => 30,
        //         'quarterly_assessment_percentage' => 20,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'adminId' => 1,
        //         'gradeLevelId' => 1,
        //         'sectionName' => 1,
        //         'subjectName' => 'Technology and Livelihood Education (TLE)',
        //         'description' => 'TLE subject description',
        //         'written_work_percentage' => 20,
        //         'performance_tasks_percentage' => 60,
        //         'quarterly_assessment_percentage' => 20,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ]);
    }
}


