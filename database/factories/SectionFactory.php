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
        static $sectionNumber = 1;

        return [
            'adminId' => 1,
            'sectionName' => 'Section ' . $sectionNumber++,
            'gradeLevelId' => $this->faker->numberBetween(1, 7),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }


}
