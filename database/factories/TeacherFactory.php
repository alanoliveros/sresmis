<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $positions = [
            'HEAD TEACHER I',
            'MASTER TEACHER I',
            'TEACHER III',
            'TEACHER II',
            'TEACHER I',
        ];

        $degree = [
            'BEED',
            'BSA',
            'BSHE',
        ];

        $majorList = [
            'GENERAL/MATHEMATICS',
            'GENERAL/FILIPINO',
            'GENERAL/SOCIAL STUDIES',
            'FILIPINO/SOCIAL STUDIES',
            'Ag ED/SOCIAL STUDIES',
            'AGED/SOCIAL STUDIES',
            'SOCIAL STUDIES',
            'SOCIAL STUDIES',
            'GENERAL EDUCATION',
            'ENGLISH',
            'AG. ED',
            'HEED'
        ];





        static $sectionIdNumber = 1;



        $currentYear = date('Y');
        $randomSchoolYear = $this->faker->numberBetween(2017, $currentYear);
        $nextYear = $randomSchoolYear + 1;
        $schoolYear = $randomSchoolYear . '-' . $nextYear;

        return [
            'adminId' => 1, // Set the admin ID accordingly
            'school_year' => $schoolYear,
            'sectionId' => $sectionIdNumber++,
            'gradeLevelId' => $this->faker->numberBetween(1, 7),
            'designation' => 'HEAD TEACHER', // Assuming the designation is always HEAD TEACHER
            'employeeNumber' => $this->faker->randomNumber(7),
            'position' => $this->faker->randomElement($positions), // Assuming the position is always one of the elements in the $positions array
            'fundSource' => $this->faker->word,
            'degree' => $this->faker->randomElement($degree), // Assuming the degree is always one of the elements in the $degree array
            'major' => $this->faker->randomElement($majorList), // Assuming the major is always one of the elements in the $majorList array
            'minor' => 'None',
            'totalTeachingTimePerWeek' => $this->faker->numberBetween(1000, 2400),
            'numberOfAncillary' => '1',
        ];

    }
}
