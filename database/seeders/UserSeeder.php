<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Insert User */
        /** Insert Address */
        /** Insert Teacher */
        User::factory()->count(20)->create();
    }
}
