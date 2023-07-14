<?php

namespace Database\Seeders;

use App\Models\Enrollment;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Grade4Seeder extends Seeder
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
            array_fill(0, $faker->numberBetween(3, 5), 'Dropped Out'),
            array_fill(0, $faker->numberBetween(3, 5), 'Transferred'),
            array_fill(0, $faker->numberBetween(1, 3), 'Not Enrolled'),
            array_fill(0, $numberOfStudents, 'Continuing')
        );
        shuffle($currentStatuses);

        $academicStatuses = array();
        $remarks = array();
        $movingUpStatuses = array();

        foreach ($currentStatuses as $status) {
            if ($status === 'Dropped Out') {
                $academicStatuses[] = 'N/A';
                $remarks[] = 'N/A';
                $movingUpStatuses[] = 'N/A';
            } elseif ($status === 'Transferred') {
                $academicStatuses[] = 'Transferred';
                $remarks[] = 'N/A';
                $movingUpStatuses[] = 'N/A';
            } elseif ($status === 'Not Enrolled') {
                $academicStatuses[] = 'N/A';
                $remarks[] = 'N/A';
                $movingUpStatuses[] = 'N/A';
            } elseif ($status === 'Continuing') {
                $academicStatuses[] = 'Enrolled';
                $remarks[] = 'Passed';
                $movingUpStatuses[] = 'Promoted';
            }
        }

        shuffle($academicStatuses);
        shuffle($remarks);
        shuffle($movingUpStatuses);

        for ($i = 0; $i < $numberOfStudents; $i++) {
            $dateOfBirth = $faker->dateTimeBetween('-5 years', '-4 years')->format('Y-m-d');

            if ($currentStatuses[$i] === 'Dropped Out') {
                $academicStatus = 'N/A';
                $remarksValue = 'N/A';
                $movingUpStatus = 'N/A';
            } elseif ($currentStatuses[$i] === 'Transferred') {
                $academicStatus = 'Transferred';
                $remarksValue = 'N/A';
                $movingUpStatus = 'N/A';
            } elseif ($currentStatuses[$i] === 'Not Enrolled') {
                $academicStatus = 'N/A';
                $remarksValue = 'N/A';
                $movingUpStatus = 'N/A';
            } elseif ($currentStatuses[$i] === 'Continuing') {
                $academicStatus = 'Enrolled';
                $remarksValue = ($remarks[$i] === 'Passed') ? 'Passed' : 'Failed';
                $movingUpStatus = ($remarks[$i] === 'Passed') ? 'Promoted' : 'Retained';
            }

            Enrollment::create([
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
                'grade_level_id' => 4,
                'school_year' => '2017-2018',
                'moving_up_status' => $movingUpStatus,
                'current_status' => $currentStatuses[$i],
                'academic_status' => $academicStatus,
                'remarks' => $remarksValue,
            ]);
        }
    }
}
