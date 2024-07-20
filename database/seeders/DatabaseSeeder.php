<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $post = Post::find(1);
        $tags = [1,2,3,4];
        $post->tags()->attach($tags);
        Schema::disableForeignKeyConstraints();
        Tag::truncate();
        Author::truncate();
        Post::truncate();
        Category::truncate();
        for ($i=0; $i < 10; $i++) { 
            Tag::query()->create([
                'name' => fake()->realText(20)
            ]);
          Category::query()->create([
            'name' => fake()->realText(20)
          ]);
          $author = Author::query()->create([
            'name' =>fake()->realText(20)
          ]);
          Post::query()->create([
            'category_id' => rand(1,10),
            'author_id' => rand(1,10),
            'name' => fake()->name(15),
            'img_thumbnail' => fake()->imageUrl(),
            'overview' =>fake()->text(250),
            'content'=>fake()->text(500),
          ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
