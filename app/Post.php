<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
 * Class Post
 *
 * @package App
 *
 * @property \App\Category $category
 * @property \App\Comment $comments
 * @property string $name
 * @property string $content
 */

class Post extends Model
{
    protected $fillable = ['name', 'content', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
