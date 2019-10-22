<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
 * Class Category
 *
 * @package App
 *
 * @property \App\Comment $comments
 * @property \App\Post $posts
 * @property string $name
 * @property string $description
 */

class Category extends Model
{
    protected $fillable = ['name', 'description'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
