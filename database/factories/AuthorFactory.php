<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake('sr_RS')->firstName(),
            'surname' => fake('sr_RS')->lastName(),
            'picture' => fake()->imageUrl(200, 200, 'people'),
            'user_id' => User::factory(),
        ];
    }
}
