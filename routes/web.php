<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TrashController;
use App\Http\Controllers\UserFollowerController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $articles = Article::where('is_public', 'public')
        ->latest()
        ->filter(request(['search', 'category', 'author', 'tag']))
        ->orderBy('id', 'desc')
        ->paginate(20)
        ->withQueryString();

    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'articles' => $articles,
    ]);
})->name('home');
Route::middleware(['auth', 'verified'])
    ->prefix('session/')
    ->group(
        callback: function () {
            Route::get('dashboard', [
                DashboardController::class,
                'index',
            ])->name('session.dashboard');
            Route::get('profile/edit/{user:uuid}', [
                ProfileController::class,
                'edit',
            ])->name('profile.edit');
            Route::get('profile/information/{user:uuid}', [
                ProfileController::class,
                'information',
            ])->name('profile.information');
            Route::patch('profile/update/{user:uuid}', [
                ProfileController::class,
                'update',
            ])->name('profile.update');
            Route::post('profile/upload_profile/{user:uuid}', [
                ProfileController::class,
                'upload_profile',
            ])->name('profile.upload_profile');
            Route::post('profile/profile.upload_cover/{user:uuid}', [
                ProfileController::class,
                'upload_cover',
            ])->name('profile.upload_cover');
            Route::delete('profile/destroy', [
                ProfileController::class,
                'destroy',
            ])->name('profile.destroy');

            // User Following

            Route::get('/{user:username}/followings', [
                UserFollowerController::class,
                'index',
            ])->name('user.index');

            Route::get('/{user:username}/trash', [
                TrashController::class,
                'trash',
            ])->name('user.trash');
            Route::post('/{user:username}/{article}/restore', [
                TrashController::class,
                'restoreArticle',
            ])
                ->name('article.restore')
                ->withTrashed();

            //Article Route
            Route::get('articles/my_articles', [
                ArticleController::class,
                'index',
            ])->name('article.index');
            Route::get('articles/article_lists', [
                ArticleController::class,
                'lists',
            ])->name('article.lists');
            Route::get('articles/article_create', [
                ArticleController::class,
                'create',
            ])->name('article.create');
            Route::post('articles/article_store', [
                ArticleController::class,
                'store',
            ])->name('article.store');
            Route::get('articles/article_edit/{article:slug}', [
                ArticleController::class,
                'edit',
            ])->name('article.edit');
            Route::post('articles/article_edit/{article:uuid}', [
                ArticleController::class,
                'update',
            ])->name('article.update');
            Route::get('articles/{article:uuid}', [
                ArticleController::class,
                'show',
            ])->name('article.show');
            Route::delete('articles/article_destroy/{article:uuid}', [
                ArticleController::class,
                'destroy',
            ])->name('article.destroy');

            //Article Reaction Route

            Route::post('article/reaction/like/{article:uuid}', [
                ArticleController::class,
                'store_reaction',
            ])->name('article.store_reaction');
            Route::delete('article/reaction/unlike/{article:uuid}', [
                ArticleController::class,
                'destroy_reaction',
            ])->name('article.destroy_reaction');

            //Article Comment
            Route::post('articles/comment/{article:slug}', [
                CommentController::class,
                'store',
            ])->name('comment.store');
            Route::put('articles/comment/update/{comment:uuid}', [
                CommentController::class,
                'update',
            ])->name('comment.update');
            Route::post('articles/comment/replies/{comment:uuid}', [
                CommentController::class,
                'replies',
            ])->name('comment.replies');

            //Comment Reaction Route

            Route::get('comment/reaction/like/{comment:uuid}', [
                CommentController::class,
                'store_reaction',
            ])->name('comment.store_reaction');
            Route::get('comment/reaction/unlike/{comment:uuid}', [
                CommentController::class,
                'destroy_reaction',
            ])->name('comment.destroy_reaction');

            //Categories Route
            Route::get('categories', [
                CategoryController::class,
                'index',
            ])->name('category.index');
            Route::post('categories/store', [
                CategoryController::class,
                'store',
            ])->name('category.store');
            Route::get('categories/edit/{category:uuid}', [
                CategoryController::class,
                'edit',
            ])->name('category.edit');
            Route::put('categories/edit/{category:uuid}', [
                CategoryController::class,
                'update',
            ])->name('category.update');
            Route::delete('categories/destroy/{category:uuid}', [
                CategoryController::class,
                'destroy',
            ])->name('category.destroy');

            //Forum Route
            Route::get('forum', [
                ForumController::class,
                'index',
            ])->name('forum.index');
            //Tag Route
            Route::get('tags', [TagController::class, 'index'])->name(
                'tag.index'
            );
            Route::get('tags/edit/{tag:uuid}', [
                TagController::class,
                'edit',
            ])->name('tag.edit');
            Route::post('tags/store', [TagController::class, 'store'])->name(
                'tag.store'
            );
            Route::put('tags/update/{tag:uuid}', [
                TagController::class,
                'update',
            ])->name('tag.update');
            Route::delete('tags/destroy/{tag:uuid}', [
                TagController::class,
                'destroy',
            ])->name('tag.destroy');
        }
    );

require __DIR__.'/auth.php';
