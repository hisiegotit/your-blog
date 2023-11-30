<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'short_desc' => fake()->paragraph(),
            'desc' => fake()->realText($maxNbChars = 4000, $indexSize = 2),
            'image' => fake()->imageUrl(500, 250, 'cats', true),
            'category_id' => rand(1, 3),
            'created_at' => now(),
        ];
    }
}
