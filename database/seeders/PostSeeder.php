<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 50 posts
        $posts = Post::factory(50)->create();

        // Get all categories and tags
        $categories = Category::all();
        $tags = Tag::all();

        // Attach categories and tags to each post
        $posts->each(function ($post) use ($categories, $tags) {
            // Attach one or more categories
            $post->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );

            // Attach a few tags
            $post->tags()->attach(
                $tags->random(rand(2, 5))->pluck('id')->toArray()
            );
        });
    }
} 