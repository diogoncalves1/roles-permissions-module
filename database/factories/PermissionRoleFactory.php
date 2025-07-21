<?php

namespace Database\Factories;

use App\Models\Permissions;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PermissionRole>
 */
class PermissionRoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'role_id' => Role::pluck('id')->random(),
            'permission_id' => Permissions::pluck('id')->random()
        ];
    }
}