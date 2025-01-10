<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\License>
 */
class LicenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $expires = $this->faker->boolean;
        $key = $this->faker->uuid;

        return [
            'key' => $key,
            'key_first_part' => substr($key, 0, 5),
            'email' => $this->faker->unique()->safeEmail,
            'expires_at' => $expires ? $this->faker->optional()->dateTimeBetween('now', '+1 year') : null,
        ];
    }
}
