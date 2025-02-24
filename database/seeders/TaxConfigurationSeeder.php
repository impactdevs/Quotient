<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $yesterday = date('Y-m-d', strtotime('yesterday'));

        DB::table('tax_configurations')->insert([
            'min_amount' => 0,
            'max_amount' => 235000,
            'rate' => 0,
            'effective_date' => $yesterday,
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        DB::table('tax_configurations')->insert([
            'min_amount' => 235000,
            'max_amount' => 335000,
            'rate' => 10,
            'effective_date' => $yesterday ,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        DB::table('tax_configurations')->insert([
            'min_amount' => 335000,
            'max_amount' => 410000,
            'rate' => 20,
            'effective_date' => $yesterday ,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tax_configurations')->insert([
            'min_amount' => 410000,
            'max_amount' => 10000000,
            'rate' => 30,
            'effective_date' => $yesterday ,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
