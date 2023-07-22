<?php

namespace App\Repository;

interface ArticleInterface
{
    public function index();

    public function lists();

    public function create($category, $tag);

    public function store(
        $request,
        $article,
        $articleCategories,
        $attachment,
        $articleTag
    );

    public function edit($article, $category);

    public function update($request, $article, $articleCategories, $attachment);
    public function show($article);

    public function destroy($article);

    public function trash();

    public function restore($article);

    public function store_reaction($article, $reaction);

    public function destroy_reaction($article, $reaction);
}
