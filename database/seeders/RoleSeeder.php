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

        //permissions
        $permission1 = Permission::create(['name' => 'add an employee']);
        $permission2 = Permission::create(['name' => 'can delete an employee']);
        $permission3 = Permission::create(['name' => 'can edit an employee']);
        $permission4 = Permission::create(['name' => 'can add an event']);
        $permission5 = Permission::create(['name' => 'can delete an event']);
        $permission6 = Permission::create(['name' => 'can edit an event']);
        $permission7 = Permission::create(['name' => 'approve training']);
        $permission8 = Permission::create(['name' => 'can add a training']);
        $permission9 = Permission::create(['name' => 'can delete a training']);
        $permission10 = Permission::create(['name' => 'can edit a training']);
        $permission11 = Permission::create(['name' => 'approve leave']);

    }
}
