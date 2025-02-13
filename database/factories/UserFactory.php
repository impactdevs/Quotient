<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }
    /**
     * check if the employee does not exist and create one
     */


    /**
     * Assign the "Staff" role to the created user.
     */
    public function withStaffRole(): static
    {
        return $this->afterCreating(function (User $user) {
            //get a random role
            $user->assignRole(Role::pluck('name')->random()); // Assign the "Staff" role

            //ensure that employee record is created for this user
            Employee::factory()->create([
                'user_id' => $user->id, //associate employee with the created user
            ]);
        });
    }

}
