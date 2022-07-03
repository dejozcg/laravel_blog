<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::truncate();
        Post::truncate();
        Category::truncate();
        \App\Models\User::factory(2)->create();

        $cat1 = Category::create([
            'name' => 'Work',
            'slug' => 'work',
        ]);

        $cat2 = Category::create([
            'name' => 'Travel',
            'slug' => 'travel',
        ]);

        Post::create([
            'title' => 'Prvi post',
            'slug' => 'first-post',
            'user_id' => 1,
            'category_id' => $cat1->id,
            'excerpt' => '<p>Lorem Ipsum is simply dummy text of</p>',
            'body' => "<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>"
        ]);
        Post::create([
            'title' => 'Drugi post',
            'slug' => 'second-post',
            'user_id' => 1,
            'category_id' => $cat2->id,
            'excerpt' => '<p>Lorem Ipsum is simply dummy text of</p>',
            'body' => "<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>"
       ]);
       Post::create([
        'title' => 'Treci post',
        'slug' => 'third-post',
        'user_id' => 2,
        'category_id' => $cat2->id,
        'excerpt' => '<p>Lorem Ipsum is simply dummy text of</p>',
        'body' => "<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>"
   ]);
    }
}
