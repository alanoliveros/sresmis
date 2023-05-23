<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName,
            'role' => 2,
            'middleName' => $this->faker->lastName,
            'lastName' => $this->faker->lastName,
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'birthdate' => $this->faker->date('Y-m-d', '-31 years'),
            'age' => $this->faker->numberBetween(18, 65),
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'image' => 'avatar.png',
            'remember_token' => Str::random(10),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (User $user) {
            $address = Address::factory()->create(['userId' => $user->id]);

            /*Teacher::factory()->create([
                'adminId' => 1, // Set the admin ID accordingly
                'teacherId' => $user->id,
                'school_year' => '2023',
                'sectionId' => 1, // Set the section ID accordingly
                'gradeLevelId' => 2, // Set the grade level ID accordingly
                'addressId' => $address->id,
                'designation' => 'Some Designation',
                'employeeNumber' => '123456',
                'position' => 'Some Position',
                'fundSource' => 'Some Fund Source',
                'degree' => 'Some Degree',
                'major' => 'Some Major',
                'minor' => 'Some Minor',
                'totalTeachingTimePerWeek' => 30,
                'numberOfAncillary' => 2,*/ // instead of this, i'll move the logic of creating a teacher to the TeacherFactory

            TeacherFactory::new()->create([
                'teacherId' => $user->id,
                'addressId' => $address->id,
            ]);
        });
    }
    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
}
