<?php

namespace App\Repository;

use App\Service\ArticleService;
use Illuminate\Support\Facades\DB;

class ArticleRepository implements ArticleInterface
{
    public $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function index()
    {
        return $this->articleService->index();
    }

    public function lists()
    {
        return $this->articleService->lists();
    }

    public function create($category, $tag)
    {
        return $this->articleService->create($category, $tag);
    }

    public function store(
        $request,
        $article,
        $articleCategories,
        $attachment,
        $articleTag
    ) {
        $store = $this->articleService->store(
            $request,
            $article,
            $articleCategories,
            $attachment,
            $articleTag
        );
        if (!is_null($store)) {
            DB::commit();

            return redirect()
                ->route('article.index')
                ->with('message', 'Article Created Successfully.');
        } else {
            DB::rollBack();

            return redirect()
                ->route('article.index')
                ->with('error', 'Something want wrong.');
        }
    }

    public function edit($article, $category)
    {
        return $this->articleService->edit($article, $category);
    }

    public function update($request, $article, $articleCategories, $attachment)
    {
        $update = $this->articleService->update(
            $request,
            $article,
            $articleCategories,
            $attachment
        );
        if (!is_null($update)) {
            DB::commit();

            return redirect()
                ->route('article.lists')
                ->with('message', 'Article Updated Successfully.');
        } else {
            DB::rollBack();

            return redirect()
                ->route('article.lists')
                ->with('error', 'Something want wrong.');
        }
    }

    public function show($article)
    {
        return $this->articleService->show($article);
    }

    public function destroy($article)
    {
        $delete = $this->articleService->destroy($article);
        if (!is_null($delete)) {
            DB::commit();

            return redirect()
                ->route('article.lists')
                ->with('message', 'Article Delete Successfully.');
        } else {
            DB::rollBack();

            return redirect()
                ->route('article.lists')
                ->with('error', 'Something want wrong.');
        }
    }

    public function trash()
    {
        return $this->articleService->showTrash();
    }

    public function restore($article)
    {
        $result = $this->articleService->restore($article);
        if (!is_null($result)) {
            DB::commit();

            return redirect()
                ->back()
                ->with('message', 'Successfully Restored Article.');
        } else {
            DB::rollBack();

            return redirect()
                ->back()
                ->with('error', 'Something want wrong.');
        }
    }

    public function store_reaction($article, $reaction)
    {
        $store_reaction = $this->articleService->store_reaction(
            $article,
            $reaction
        );
        if (!is_null($store_reaction)) {
            DB::commit();

            return redirect()
                ->back()
                ->with('message', 'Liked.');
        } else {
            DB::rollBack();

            return redirect()
                ->back()
                ->with('error', 'Something want wrong.');
        }
    }

    public function destroy_reaction($article, $reaction)
    {
        $destroy_reaction = $this->articleService->destroy_reaction(
            $article,
            $reaction
        );
        if (!is_null($destroy_reaction)) {
            DB::commit();

            return redirect()
                ->back()
                ->with('message', 'UnLiked.');
        } else {
            DB::rollBack();

            return redirect()
                ->back()
                ->with('error', 'Something want wrong.');
        }
    }
}
