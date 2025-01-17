<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolYearsSeeder extends Seeder
{
    public function run()
    {
        DB::table('school_years')->insert([
            [
                'name' => 'Năm học 2020-2021',
                'start_year' => 2020,
                'end_year' => 2021,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Năm học 2021-2022',
                'start_year' => 2021,
                'end_year' => 2022,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Năm học 2022-2023',
                'start_year' => 2022,
                'end_year' => 2023,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Năm học 2023-2024',
                'start_year' => 2023,
                'end_year' => 2024,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
