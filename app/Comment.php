<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
 * Class Comment
 *
 * @package App
 *
 * @property \App\Category $category
 * @property \App\Post $post
 * @property string $author
 * @property string $content
 * @property int $category_id
 * @property int $post_id
 */
class Comment extends Model
{
    protected $fillable = ['author', 'content', 'category_id', 'post_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
