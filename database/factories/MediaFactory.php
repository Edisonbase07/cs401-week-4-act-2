<?php

namespace Database\Factories;

use App\Models\Media;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Media::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fileTypes = ['jpg', 'png', 'gif', 'mp4', 'pdf', 'doc'];
        $fileType = $this->faker->randomElement($fileTypes);
        
        return [
            'file_name' => $this->faker->word() . '.' . $fileType,
            'file_type' => $fileType,
            'file_size' => $this->faker->numberBetween(1000, 10000000), // 1KB to 10MB
            'url' => $this->faker->url(),
            'upload_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'description' => $this->faker->sentence(),
            'post_id' => Post::factory(),
        ];
    }
}
