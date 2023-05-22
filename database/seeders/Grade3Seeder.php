<?php

namespace Database\Seeders;

use App\Models\Enrollment;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Grade3Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $numberOfStudents = $faker->numberBetween(60, 80);

        $barangays = array_merge(
            array_fill(0, $faker->numberBetween(3, 5), 'Dologon'),
            array_fill(0, $faker->numberBetween(3, 5), 'Panadtalan'),
            array_fill(0, $numberOfStudents, 'San Roque')
        );
        shuffle($barangays);

        $currentStatuses = array_merge(
            array_fill(0, $faker->numberBetween(3, 5), 'Repeater'),
            array_fill(0, $faker->numberBetween(3, 5), 'Transferred'),
            array_fill(0, $faker->numberBetween(1, 3), 'Suspended'),
            array_fill(0, $numberOfStudents, 'Continuing')
        );
        shuffle($currentStatuses);

        $academicStatuses = array_merge(
        /*array_fill(0, $faker->numberBetween(3, 5), 'Graduated'),*/
            array_fill(0, $faker->numberBetween(3, 5), 'Dropped Out'),
            array_fill(0, $faker->numberBetween(1, 3), 'Not Enrolled'),
            array_fill(0, $numberOfStudents, 'Enrolled')
        );
        shuffle($academicStatuses);

        $remarks = array_merge(
            array_fill(0, $faker->numberBetween(3, 5), 'Failed'),
            array_fill(0, $numberOfStudents, 'Passed')
        );
        shuffle($remarks);

        $movingUpStatuses = array_merge(
            array_fill(0, $faker->numberBetween(3, 5), 'Retained'),
            array_fill(0, $numberOfStudents, 'Proceed')
        );
        shuffle($movingUpStatuses);

        for ($i = 0; $i < $numberOfStudents; $i++) {
            $dateOfBirth = $faker->dateTimeBetween('-5 years', '-4 years')->format('Y-m-d');

            Enrollment::create([
                'enrollment_status' => 1,
                'student_id' => $faker->numberBetween(1000, 9999),
                'adminId' => 1,
                'lrn' => $faker->numerify('############'),
                'first_name' => $faker->firstName,
                'middle_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $dateOfBirth,
                'gender' => $faker->randomElement(['Male', 'Female']),
                'religion' => 'Christianity',
                'barangay' => $barangays[$i],
                'city' => 'Maramag',
                'province' => 'Bukidnon',
                'grade_level_id' => 3,
                'school_year' => '2017-2018',
                'moving_up_status' => $movingUpStatuses[$i],
                'current_status' => $currentStatuses[$i],
                'academic_status' => $academicStatuses[$i],
                'remarks' => $remarks[$i],
            ]);
        }
        for ($i = 0; $i < $numberOfStudents; $i++) {
            $dateOfBirth = $faker->dateTimeBetween('-5 years', '-4 years')->format('Y-m-d');

            Enrollment::create([
                'enrollment_status' => 1,
                'student_id' => $faker->numberBetween(1000, 9999),
                'adminId' => 1,
                'lrn' => $faker->numerify('############'),
                'first_name' => $faker->firstName,
                'middle_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $dateOfBirth,
                'gender' => $faker->randomElement(['Male', 'Female']),
                'religion' => 'Christianity',
                'barangay' => $barangays[$i],
                'city' => 'Maramag',
                'province' => 'Bukidnon',
                'grade_level_id' => 3,
                'school_year' => '2018-2019',
                'moving_up_status' => $movingUpStatuses[$i],
                'current_status' => $currentStatuses[$i],
                'academic_status' => $academicStatuses[$i],
                'remarks' => $remarks[$i],
            ]);
        }
        for ($i = 0; $i < $numberOfStudents; $i++) {
            $dateOfBirth = $faker->dateTimeBetween('-5 years', '-4 years')->format('Y-m-d');

            Enrollment::create([
                'enrollment_status' => 1,
                'student_id' => $faker->numberBetween(1000, 9999),
                'adminId' => 1,
                'lrn' => $faker->numerify('############'),
                'first_name' => $faker->firstName,
                'middle_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $dateOfBirth,
                'gender' => $faker->randomElement(['Male', 'Female']),
                'religion' => 'Christianity',
                'barangay' => $barangays[$i],
                'city' => 'Maramag',
                'province' => 'Bukidnon',
                'grade_level_id' => 3,
                'school_year' => '2019-2020',
                'moving_up_status' => $movingUpStatuses[$i],
                'current_status' => $currentStatuses[$i],
                'academic_status' => $academicStatuses[$i],
                'remarks' => $remarks[$i],
            ]);
        }
        for ($i = 0; $i < $numberOfStudents; $i++) {
            $dateOfBirth = $faker->dateTimeBetween('-5 years', '-4 years')->format('Y-m-d');

            Enrollment::create([
                'enrollment_status' => 1,
                'student_id' => $faker->numberBetween(1000, 9999),
                'adminId' => 1,
                'lrn' => $faker->numerify('############'),
                'first_name' => $faker->firstName,
                'middle_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $dateOfBirth,
                'gender' => $faker->randomElement(['Male', 'Female']),
                'religion' => 'Christianity',
                'barangay' => $barangays[$i],
                'city' => 'Maramag',
                'province' => 'Bukidnon',
                'grade_level_id' => 3,
                'school_year' => '2020-2021',
                'moving_up_status' => $movingUpStatuses[$i],
                'current_status' => $currentStatuses[$i],
                'academic_status' => $academicStatuses[$i],
                'remarks' => $remarks[$i],
            ]);
        }
        for ($i = 0; $i < $numberOfStudents; $i++) {
            $dateOfBirth = $faker->dateTimeBetween('-5 years', '-4 years')->format('Y-m-d');

            Enrollment::create([
                'enrollment_status' => 1,
                'student_id' => $faker->numberBetween(1000, 9999),
                'adminId' => 1,
                'lrn' => $faker->numerify('############'),
                'first_name' => $faker->firstName,
                'middle_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $dateOfBirth,
                'gender' => $faker->randomElement(['Male', 'Female']),
                'religion' => 'Christianity',
                'barangay' => $barangays[$i],
                'city' => 'Maramag',
                'province' => 'Bukidnon',
                'grade_level_id' => 3,
                'school_year' => '2021-2022',
                'moving_up_status' => $movingUpStatuses[$i],
                'current_status' => $currentStatuses[$i],
                'academic_status' => $academicStatuses[$i],
                'remarks' => $remarks[$i],
            ]);
        }
        for ($i = 0; $i < $numberOfStudents; $i++) {
            $dateOfBirth = $faker->dateTimeBetween('-5 years', '-4 years')->format('Y-m-d');

            Enrollment::create([
                'enrollment_status' => 1,
                'student_id' => $faker->numberBetween(1000, 9999),
                'adminId' => 1,
                'lrn' => $faker->numerify('############'),
                'first_name' => $faker->firstName,
                'middle_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $dateOfBirth,
                'gender' => $faker->randomElement(['Male', 'Female']),
                'religion' => 'Christianity',
                'barangay' => $barangays[$i],
                'city' => 'Maramag',
                'province' => 'Bukidnon',
                'grade_level_id' => 3,
                'school_year' => '2022-2023',
                'moving_up_status' => $movingUpStatuses[$i],
                'current_status' => $currentStatuses[$i],
                'academic_status' => $academicStatuses[$i],
                'remarks' => $remarks[$i],
            ]);
        }
        for ($i = 0; $i < $numberOfStudents; $i++) {
            $dateOfBirth = $faker->dateTimeBetween('-5 years', '-4 years')->format('Y-m-d');

            Enrollment::create([
                'enrollment_status' => 1,
                'student_id' => $faker->numberBetween(1000, 9999),
                'adminId' => 1,
                'lrn' => $faker->numerify('############'),
                'first_name' => $faker->firstName,
                'middle_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $dateOfBirth,
                'gender' => $faker->randomElement(['Male', 'Female']),
                'religion' => 'Christianity',
                'barangay' => $barangays[$i],
                'city' => 'Maramag',
                'province' => 'Bukidnon',
                'grade_level_id' => 3,
                'school_year' => '2023-2024',
                'moving_up_status' => $movingUpStatuses[$i],
                'current_status' => $currentStatuses[$i],
                'academic_status' => $academicStatuses[$i],
                'remarks' => $remarks[$i],
            ]);
        }
    }
}
