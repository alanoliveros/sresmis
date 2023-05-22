<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class QuarterlyGrading extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'quarter_name' => '1st Quarter',
                'status' => 1,
            ],
           
            [
                'quarter_name' => '2nd Quarter',
                'status' => 2,
            ],
           
            [
                'quarter_name' => '3rd Quarter',
                'status' => 2,
            ],
           
            [
                'quarter_name' => '4th Quarter',
                'status' => 2,
            ],
           
            // Add more data as needed
        ];

        DB::table('quarterly_gradings')->insert($data);
    }
}
