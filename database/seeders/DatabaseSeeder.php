<?php

namespace Database\Seeders;

use App\Models\Session;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'role' => 1,
                'middlename' => 'The',
                'lastname' => 'Admin',
                'suffix' => null,
                'gender' => 'Male',
                'birthdate' => '1990-01-01',
                'age' => 31,
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'image' => 'avatar.png',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        $this->call([
            GradeLevelSeeder::class,
            SessionSeeder::class,
            SectionSeeder::class,
            SubjectSeeder::class
            // Other seeders you want to run
        ]);
    }
}
