<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GradeLevel>
 */
class GradeLevelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'gradeLevelName' => (['KINDERGARTEN', 'GRADE I', 'GRADE II', 'GRADE III', 'GRADE IV', 'GRADE V', 'GRADE VI']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
