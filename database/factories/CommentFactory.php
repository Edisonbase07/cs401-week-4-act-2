<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comment_content' => $this->faker->paragraph(),
            'comment_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'reviewer_name' => $this->faker->name(),
            'reviewer_email' => $this->faker->email(),
            'is_hidden' => $this->faker->boolean(20), // 20% chance of being hidden
            'post_id' => Post::factory(),
            'user_id' => User::factory(),
        ];
    }
}
