<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //seed positions
        $positions = [
            ['position_id' => Str::uuid(), 'position_name' => 'Manager'],
            ['position_id' => Str::uuid(), 'position_name' => 'Developer'],
            ['position_id' => Str::uuid(), 'position_name' => 'Designer'],
            ['position_id' => Str::uuid(), 'position_name' => 'Analyst'],
            ['position_id' => Str::uuid(), 'position_name' => 'Tester'],
        ];

        DB::table('positions')->insert($positions);

        //leave types
        $leaveTypes = [
            ['leave_type_id' => Str::uuid(), 'leave_type_name' => 'Annual Leave'],
            ['leave_type_id' => Str::uuid(), 'leave_type_name' => 'Sick Leave'],
            ['leave_type_id' => Str::uuid(), 'leave_type_name' => 'Maternity Leave'],
            ['leave_type_id' => Str::uuid(), 'leave_type_name' => 'Paternity Leave'],
            ['leave_type_id' => Str::uuid(), 'leave_type_name' => 'Study Leave'],
        ];

        DB::table('leave_types')->insert($leaveTypes);

        //seed user roles
        $this->call(RoleSeeder::class);

        $this->call(DepartmentSeeder::class);
        //seed the users with their corresponding
        $this->call(UserSeeder::class);

        $this->call(EventsSeeder::class);

        $this->call(AttendanceSeeder::class);

        $this->call(TaxConfigurationSeeder::class);
        
        $this->call(SettingSeeder::class);
    }
}
