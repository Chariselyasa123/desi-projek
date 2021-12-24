<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id', 'comment_content', 'comment_author', 'comment_author_email', 'comment_author_ip',
    ];

    /**
     * One to Many relationship with Post.
     */
    public function post(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
