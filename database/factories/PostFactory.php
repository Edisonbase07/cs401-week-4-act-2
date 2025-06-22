<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
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
        $title = fake()->sentence();
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'title' => $title,
            'content' => fake()->paragraphs(3, true),
            'slug' => Str::slug($title),
            'publication_date' => now(),
            'last_modified_date' => now(),
            'status' => fake()->randomElement(['D', 'P', 'I']),
            'featured_image_url' => fake()->imageUrl(),
            'views_count' => fake()->numberBetween(0, 10000),
        ];
    }
} 