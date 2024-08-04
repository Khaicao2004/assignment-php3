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
        \App\Models\User::factory(5)->create();
            // $post = Post::find(10);
            // $tags = [1,2,3];
            // $post->tags()->attach($tags);
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
            'name' => rand(),
            'slug' => rand()
          ]);
          $author = Author::query()->create([
            'name' =>fake()->realText(20),
            'email' => rand(),
            'phone' => rand(),
            'address' => rand(),
          ]);
          Post::query()->create([
            'category_id' => rand(1,10),
            'author_id' => rand(1,10),
            'name' => fake()->name(15),
            'slug' => rand(),
            'sku' => rand(),
            'img_thumbnail' => fake()->imageUrl(),
            'overview' =>fake()->text(250),
            'content'=>fake()->text(500),
          ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
