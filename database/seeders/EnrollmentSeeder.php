<?php

namespace Database\Seeders;

use App\Models\Enrollment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $numberOfStudents = $faker->numberBetween(60, 80); // Generate a random number between 1 and 100
        for ($i = 0; $i < $numberOfStudents; $i++) {
            $startDate = $faker->dateTimeBetween('-11 years', '-6 years');
            $endDate = $startDate->modify('+1 day');

            $dateOfBirth = $faker->dateTimeBetween($startDate, $endDate)->format('Y-m-d');


            Enrollment::create([
                'enrollment_status' => 1, // Random enrollment status (0 or 1)
                'student_id' => $faker->numberBetween(1000, 9999), // Random student ID between 1000 and 9999
                'adminId' => 1,
                'lrn' => $faker->numerify('##########'), // 10-digit random LRN
                'first_name' => $faker->firstName,
                'middle_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $dateOfBirth,
                'gender' => $faker->randomElement(['Male', 'Female']), // Random gender
                'religion' => 'Christianity', // Random religion
                'barangay' => $faker->randomElement(['San Roque', 'Dologon', 'Panadtalan']),
                'city' => 'Maramag',
                'province' => 'Bukidnon',
                'grade_level_id' => 1, // Random grade level ID between 1 and 12
                'school_year' => '2017-2018', // Random school year
                'current_status' => 'Enrolled', // Random current status (0 or 1)
                'academic_status' => 'Active', // Random academic status
            ]);

        }
    }
}
