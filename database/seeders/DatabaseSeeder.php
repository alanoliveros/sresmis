<?php

namespace Database\Seeders;

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
            ],
            [
                'name' => 'Teacher User',
                'role' => 2,
                'middlename' => 'The',
                'lastname' => 'Teacher',
                'suffix' => null,
                'gender' => 'Female',
                'birthdate' => '1995-01-01',
                'age' => 26,
                'email' => 'teacher@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'image' => 'avatar.png',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Student User',
                'role' => 3,
                'middlename' => 'The',
                'lastname' => 'Student',
                'suffix' => null,
                'gender' => 'Male',
                'birthdate' => '2000-01-01',
                'age' => 21,
                'email' => 'student@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'image' => 'avatar.png',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('grade_levels')->insert([
            [
                'gradeLevelName' => 'KINDERGARTEN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gradeLevelName' => 'GRADE I',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gradeLevelName' => 'GRADE II',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gradeLevelName' => 'GRADE III',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gradeLevelName' => 'GRADE IV',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gradeLevelName' => 'GRADE V',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gradeLevelName' => 'GRADE VI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
