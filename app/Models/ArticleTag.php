<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ArticleTag extends Model
{
    use HasFactory;
    protected $fillable = ['uuid', 'tag_id', 'article_id'];

    public function Article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
