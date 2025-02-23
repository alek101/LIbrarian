<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $author = Author::factory()->create();
        return [
            'author_id' => $author->id,
            'title' => fake()->word(),
            'isbn' => fake()->isbn13(),
            'description' => fake()->sentence(),
            'user_id' => $author->user_id,
        ];
    }
}
