<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $departments = [
            'Human Resources',
            'Finance',
            'Marketing',
            'Sales',
            'IT',
            'Customer Support',
            'Research & Development',
            'Operations',
            'Legal',
            'Procurement',
            'Administration',
            'Engineering',
            'Public Relations',
            'Quality Assurance',
            'Supply Chain'
        ];

        $role4 = 'Head of Division';

        $user = User::factory()->create();

        $user->assignRole($role4); // Assign the "Staff" role

        return [
            "department_id" => (string) Str::uuid(),
            "department_name" => $this->faker->randomElement($departments),
            "department_head" => $user->id
        ];
    }
}
