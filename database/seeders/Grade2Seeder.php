<?php

namespace Database\Seeders;

use App\Models\Enrollment;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Grade2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $numberOfStudents = $faker->numberBetween(60, 80); // Generate a random number of students between 60 and 80

        for ($i = 0; $i < $numberOfStudents; $i++) {

            // Generate a random date of birth within a specific range to ensure the resulting age falls between 6 and 11 years at the time the code is executed.
            $startDate = $faker->dateTimeBetween('-8 years', '-7 years');
            $endDate = $startDate->modify('+1 day');
            $dateOfBirth = $faker->dateTimeBetween($startDate, $endDate)->format('Y-m-d');

            // Create an array of barangays (locations) with a mix of predefined values and random duplicates
            $barangays = [];
            $barangays = array_merge($barangays, array_fill(0, $faker->numberBetween(3, 5), 'Dologon')); // Add 3-5 instances of "Dologon"
            $barangays = array_merge($barangays, array_fill(0, $faker->numberBetween(3, 5), 'Panadtalan')); // Add 3-5 instances of "Panadtalan"
            $remaining = $numberOfStudents - count($barangays);
            $barangays = array_merge($barangays, array_fill(0, $remaining, 'San Roque')); // Add the remaining instances as "San Roque"

            shuffle($barangays); // Randomly shuffle the barangays


            // Create a new enrollment record with randomly generated data
            Enrollment::create([
                'enrollment_status' => 1,
                'student_id' => $faker->numberBetween(1000, 9999), // Random student ID between 1000 and 9999
                'adminId' => 1,
                'lrn' => $faker->numerify('############'), // Random LRN
                'first_name' => $faker->firstName,
                'middle_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $dateOfBirth,
                'gender' => $faker->randomElement(['Male', 'Female']), // Random gender
                'religion' => 'Christianity',
                'barangay' => $barangays[$i],
                'city' => 'Maramag', //
                'province' => 'Bukidnon', //
                'grade_level_id' => 2,
                'school_year' => '2017-2018',
                'current_status' => 'Enrolled',
                'academic_status' => 'Active',
            ]);

        }
    }
}
