<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommentReplies extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'article_id',
        'comment_id',
        'body'
    ];

    public function CommentReply() : BelongsTo
    {
        return $this->belongsTo(Comment::class);
    }
}
