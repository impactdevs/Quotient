<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        //create a role
        $role1 = 'Staff';
        $role2 = 'Executive Secretary';
        $role3 = 'HR';
        $role4 = 'Head of Division';
        $role5 = 'Assistant Executive Secretary';
        $role1 = Role::create(['name' => $role1]);
        $role2 = Role::create(['name' => $role2]);
        $role3 = Role::create(['name' => $role3]);
        $role4 = Role::create(['name' => $role4]);
        $role5 = Role::create(['name' => $role5]);
    }
}
