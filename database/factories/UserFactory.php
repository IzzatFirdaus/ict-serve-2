<?php

namespace Database\Factories;

use App\Enums\UserStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
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
            'title' => fake()->title(),
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'identification_number' => fake()->unique()->numerify('###########'),
            'passport_number' => fake()->optional()->bothify('??######'),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'identification_number' => fake()->unique()->numerify('######-##-####'),
            'mobile_number' => fake()->phoneNumber(),
            'status' => UserStatus::AKTIF,
            'lang' => 'ms',
            'theme' => 'system',
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
