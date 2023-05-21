<?php

namespace Database\Seeders;

use App\Models\Session;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/*        DB::table('sessions')->insert([
            [
                'adminId' => 1,
                'school_year' => '2009-2010',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adminId' => 1,
                'school_year' => '2010-2011',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adminId' => 1,
                'school_year' => '2011-2012',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adminId' => 1,
                'school_year' => '2012-2013',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adminId' => 1,
                'school_year' => '2013-2014',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adminId' => 1,
                'school_year' => '2014-2015',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adminId' => 1,
                'school_year' => '2015-2016',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adminId' => 1,
                'school_year' => '2017-2018',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adminId' => 1,
                'school_year' => '2018-2019',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adminId' => 1,
                'school_year' => '2019-2020',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adminId' => 1,
                'school_year' => '2020-2021',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adminId' => 1,
                'school_year' => '2021-2022',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'adminId' => 1,
                'school_year' => '2022-2023',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ])*/;
        $data = [];
        $adminId = 1;
        $currentYear = date('Y');
        $startingYear = 2017;

        for ($year = $startingYear; $year <= $currentYear; $year++) {
            $schoolYear = $year . '-' . ($year + 1);
            $data[] = [
                'adminId' => $adminId,
                'school_year' => $schoolYear,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('sessions')->insert($data);

    }
}
