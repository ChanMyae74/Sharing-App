<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    protected $fillable = [
        'uuid',
        'title',
        'slug',
        'excerpt',
        'description',
        'body',
        'user_id',
        'form_frameworks',
        'gradient_left',
        'share_count',
        'article_create_date',
        'is_public',
        'visit_count'
    ];

    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $with = [
        'author',
        'reactions',
        'category',
        'comments',
        'article_photo',
        'tag'
    ];
    protected $dates = ['deleted_at'];

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            fn($query, $search) => $query->where(
                fn($query) => $query
                    ->where('title', 'like', '%' . request('search') . '%')
                    ->orWhere('body', 'like', '%' . request('search') . '%')
                    ->orWhere('excerpt', 'like', '%' . request('search') . '%')
            )
        );
        $query->when(
            $filters['category'] ?? false,
            fn($query, $category) => $query->whereHas(
                'category',
                fn($query) => $query->where('slug', $category)
            )
        );
        $query->when(
            $filters['tag'] ?? false,
            fn($query, $tag) => $query->whereHas(
                'tag',
                fn($query) => $query->where('slug', $tag)
            )
        );
        $query->when(
            $filters['author'] ?? false,
            fn($query, $author) => $query->whereHas(
                'author',
                fn($query) => $query->where('username', $author)
            )
        );
    }

    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'article_categories');
    }

    public function reactionBy(User $user)
    {
        return $this->reactions->contains('user_id', $user->id);
    }

    public function reactions(): HasMany
    {
        return $this->hasMany(Reaction::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function publish(): HasMany
    {
        return $this->hasMany(Article::class)->where('is_public', 'public');
    }
    public function article_photo(): HasOne
    {
        return $this->hasOne(Attachment::class)
            ->where('status', 'article_photo')
            ->latest();
    }

    public function comments_count(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
    public function tag(): BelongsToMany
    {
        return $this->belongsToMany(
            \App\Models\Tag::class,
            'article_tags',
            'article_id'
        );
    }

    public function profile_photo(): HasMany
    {
        return $this->hasMany(Attachment::class)->where(
            'status',
            'profile_photo'
        );
    }
}
