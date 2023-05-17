<?php

namespace Database\Seeders;

use App\Models\GradeLevel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grade_levels')->insert([
             [
                 'gradeLevelName' => 'KINDERGARTEN',
                 'created_at' => now(),
                 'updated_at' => now(),
             ],
             [
                 'gradeLevelName' => 'GRADE I',
                 'created_at' => now(),
                 'updated_at' => now(),
             ],
             [
                 'gradeLevelName' => 'GRADE II',
                 'created_at' => now(),
                 'updated_at' => now(),
             ],
             [
                 'gradeLevelName' => 'GRADE III',
                 'created_at' => now(),
                 'updated_at' => now(),
             ],
             [
                 'gradeLevelName' => 'GRADE IV',
                 'created_at' => now(),
                 'updated_at' => now(),
             ],
             [
                 'gradeLevelName' => 'GRADE V',
                 'created_at' => now(),
                 'updated_at' => now(),
             ],
             [
                 'gradeLevelName' => 'GRADE VI',
                 'created_at' => now(),
                 'updated_at' => now(),
             ],
         ]);
    }
}
