<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get existing posts and users
        $posts = Post::all();
        $users = User::all();

        if ($posts->isEmpty() || $users->isEmpty()) {
            $this->command->warn('No posts or users found. Please run PostSeeder and UserSeeder first.');
            return;
        }

        // Create 50 comments
        Comment::factory(50)->create([
            'post_id' => function () use ($posts) {
                return $posts->random()->id;
            },
            'user_id' => function () use ($users) {
                return $users->random()->id;
            },
        ]);

        $this->command->info('Comments seeded successfully!');
    }
}
