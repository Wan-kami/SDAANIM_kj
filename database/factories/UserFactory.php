<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
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
            'Usu_documento' => fake()->unique()->numberBetween(1000000, 999999999),
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'Usu_telefono' => fake()->phoneNumber(),
            'role' => 'Adoptante',
            'Usu_direccion' => fake()->address(),
            'password' => static::$password ??= Hash::make('password'),
            'status' => 'Activo',
            'remember_token' => Str::random(10),
        ];
    }
}
