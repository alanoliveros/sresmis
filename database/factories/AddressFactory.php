<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'userId' => null, // Assuming it will be set later
            'purok' => $this->faker->word,
            'barangay' => $this->faker->word,
            'city' => $this->faker->city,
            'province' => $this->faker->state,
            /*'zipCode' => $this->faker->postcode,*/ // Use a shorter postal code format kay mag error siya, kay ang type sa zipCode kay integer
            'zipCode' => $this->faker->numberBetween(10000, 99999), // Generate a random 5-digit zip code
        ];
    }
}
