<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LearningModality;

class LearningModalitySeeder extends Seeder
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
                'mode_name' => 'Modular (print)',
                'description' => 'Modular',
            ],
            [
                'mode_name' => 'Homebase Learning',
                'description' => 'Home Base',
            ],
            [
                'mode_name' => 'Online Learning',
                'description' => 'Online',
            ],
            // Add more data as needed
        ];

        LearningModality::insert($data);
    }
}
