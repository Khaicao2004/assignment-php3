<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'category_id' => rand(1,10),
            'name' => fake()->name(15),
            'img_thumbnail' => fake()->imageUrl(),
            'overview' =>fake()->text(250),
            'content'=>fake()->text(500),
        ];
    }
}
