<?php

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
        factory(\App\Category::class, 5)->create()->each(function ($category){
            $category->posts()->saveMany(factory(\App\Post::class, 10)->make())->each(function ($post){
                $post->comments()->saveMany(factory(\App\Comment::class, 10)->make());
            });
            $category->comments()->saveMany(factory(\App\Comment::class, 10)->make());
        });
    }
}
