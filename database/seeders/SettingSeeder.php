<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('general_settings')->insert([
            'nssf_cap' => 30000000,
            'employee_nssf_rate' => 5,
            'employer_nssf_rate' => 10 ,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
