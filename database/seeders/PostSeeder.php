<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 30; $i++) {
            $category = Category::query()->inRandomOrder()->firstOrFail();
            $title = Str::random(20);

            Post::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'content' => '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>',
                'category_id' => $category->id,
                'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit',
                'posted' => 'yes',
            ]);
        }
    }
}
