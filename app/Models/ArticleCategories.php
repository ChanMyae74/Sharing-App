<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ArticleCategories extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'category_id',
        'article_id',
    ];

    public function Article(): HasOne
    {
        return $this->hasOne(Article::class);
    }
}
