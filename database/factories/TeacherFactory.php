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
        static $sectionIdNumber = 1;

        return [
            'adminId' => 1, // Set the admin ID accordingly
            'school_year' => $this->faker->year,
            'sectionId' => $sectionIdNumber++,
            'gradeLevelId' => $this->faker->numberBetween(1, 7),
            'designation' => 'HEAD TEACHER', // Assuming the designation is always HEAD TEACHER
            'employeeNumber' => $this->faker->randomNumber(7),
            'position' => $this->faker->randomElement($positions), // Assuming the position is always one of the elements in the $positions array
            'fundSource' => $this->faker->word,
            'degree' => $this->faker->randomElement($degree), // Assuming the degree is always one of the elements in the $degree array
            'major' => $this->faker->word,
            'minor' => $this->faker->word,
            'totalTeachingTimePerWeek' => $this->faker->numberBetween(20, 40),
            'numberOfAncillary' => $this->faker->numberBetween(1, 5),
        ];
    }
}