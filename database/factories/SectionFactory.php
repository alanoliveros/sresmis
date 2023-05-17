<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Section::class;
    public function definition()
    {
        return [
            'adminId' => 1,
            /*'section_name' => $this->generateSectionName(),*/
            'sectionName' => ucfirst($this->faker->word),
            'gradeLevelId' => $this->faker->numberBetween(1, 7),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
    /*private function generateSectionName()
    {
        $sectionLetters = range('A', 'Z');
        $sectionNumber = $this->faker->numberBetween(1, 10);

        return 'Section ' . $sectionLetters[array_rand($sectionLetters)] . $sectionNumber;
    }*/
}
