<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\ArticleCategories;
use App\Models\ArticleTag;
use App\Models\Attachment;
use App\Models\Category;
use App\Models\Reaction;
use App\Models\Tag;
use App\Repository\ArticleInterface;

class ArticleController extends Controller
{
    public $articleInterface;

    public function __construct(ArticleInterface $articleInterface)
    {
        $this->articleInterface = $articleInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->articleInterface->index();
    }

    public function lists()
    {
        return $this->articleInterface->lists();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Category $category, Tag $tag)
    {
        return $this->articleInterface->create($category, $tag);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        StoreArticleRequest $request,
        Article $article,
        ArticleCategories $articleCategories,
        Attachment $attachment,
        ArticleTag $articleTag
    ) {
        return $this->articleInterface->store(
            $request,
            $article,
            $articleCategories,
            $attachment,
            $articleTag
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return $this->articleInterface->show($article);
    }

    public function upload()
    {
    }

    public function store_reaction(Article $article, Reaction $reaction)
    {
        return $this->articleInterface->store_reaction($article, $reaction);
    }

    public function destroy_reaction(Article $article, Reaction $reaction)
    {
        return $this->articleInterface->destroy_reaction($article, $reaction);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article, Category $category)
    {
        return $this->articleInterface->edit($article, $category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateArticleRequest $request,
        Article $article,
        ArticleCategories $articleCategories,
        Attachment $attachment
    ) {
        return $this->articleInterface->update(
            $request,
            $article,
            $articleCategories,
            $attachment
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        return $this->articleInterface->destroy($article);
    }
}
