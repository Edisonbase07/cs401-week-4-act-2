<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'News',
            'Review',
            'Podcast',
            'Opinion',
            'Lifestyle',
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['category_name' => $category],
                [
                    'slug' => Str::slug($category),
                    'description' => "Content related to {$category}.",
                ]
            );
        }
    }
} 