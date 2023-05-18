<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*DB::table('sections')->insert([
            [
                'admin_id' => 1,
                'section_name' => 'Section A',
                'grade_lvl_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'admin_id' => 1,
                'section_name' => 'Section B',
                'grade_lvl_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more sections as needed
        ]);*/

        Section::factory()->count(15)->create();
    }
}
