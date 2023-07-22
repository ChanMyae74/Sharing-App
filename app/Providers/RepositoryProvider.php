<?php

namespace App\Providers;

use App\Repository\ArticleInterface;
use App\Repository\ArticleRepository;
use App\Repository\CategoriesInterface;
use App\Repository\CategoriesRepository;
use App\Repository\CommentInterface;
use App\Repository\CommentRepository;
use App\Repository\DashboardInterface;
use App\Repository\DashboardRepository;
use App\Repository\ForumInterface;
use App\Repository\ForumRepository;
use App\Repository\TagsInterface;
use App\Repository\TagsRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            ArticleInterface::class,
            ArticleRepository::class,
        );
        $this->app->bind(
            CategoriesInterface::class,
            CategoriesRepository::class,
        );
        $this->app->bind(
            ForumInterface::class,
            ForumRepository::class,
        );
        $this->app->bind(
            DashboardInterface::class,
            DashboardRepository::class,
        );
        $this->app->bind(
            CommentInterface::class,
            CommentRepository::class,
        );
        $this->app->bind(
            TagsInterface::class,
            TagsRepository::class,
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
