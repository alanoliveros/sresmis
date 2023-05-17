<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Session>
 */
class SessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'adminId' => 1,
            'school_year' => $this->faker->unique()->randomElement([
                '2009-2010',
                '2010-2011',
                '2011-2012',
                '2012-2013',
                '2013-2014',
                '2014-2015',
                '2015-2016',
                '2017-2018',
                '2018-2019',
                '2019-2020',
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
