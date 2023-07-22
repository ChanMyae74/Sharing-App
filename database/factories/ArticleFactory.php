<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => Str::uuid()->toString(),
            'title' => fake()->title,
            'slug' => fake()->slug,
            'description' => fake()->word(), // password
            'body' => $this->faker->word(),
            'is_public' => 'public',
            'form_frameworks' => fake()->hexColor(),
            'gradient_left' => fake()->hexColor(),
            'article_create_date' => now(),
            'excerpt' => fake()->sentence(),
            'user_id' => 1
        ];
    }
}
