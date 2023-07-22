<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'article_id',
        'user_id',
        'parent_id',
        'body'
    ];
    protected $with = ['replies','reactions','author'];

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reactionBy(User $user)
    {
        return $this->reactions->contains('user_id', $user->id);
    }

    public function comment_photo(): BelongsTo
    {
        return $this->belongsTo(Attachment::class, 'user_id')->where('status', 'article_photo');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
    public function reactions(): HasMany
    {
        return $this->hasMany(Reaction::class);
    }
}
