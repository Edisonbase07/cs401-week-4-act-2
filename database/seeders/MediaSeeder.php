<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get existing posts
        $posts = Post::all();

        if ($posts->isEmpty()) {
            $this->command->warn('No posts found. Please run PostSeeder first.');
            return;
        }

        // Create 30 media files
        Media::factory(30)->create([
            'post_id' => function () use ($posts) {
                return $posts->random()->id;
            },
        ]);

        $this->command->info('Media seeded successfully!');
    }
}
