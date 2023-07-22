<?php

namespace App\Service;

use Inertia\Inertia;

class DashboardService
{
    public function index($article, $category, $user)
    {
        $article_count = $article->where('user_id', auth()->id() )->get();
        $category_count = $category->where('user_id', auth()->id() )->get();
        $user_count = $user->all();
        return Inertia::render('Dashboard',[
            'article_count' => $article_count->count(),
            'category_count' => $category_count->count(),
            'user_count' => $user_count->count()
        ]);
    }
}
