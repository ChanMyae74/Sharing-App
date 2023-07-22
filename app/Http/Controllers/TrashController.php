<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use App\Repository\ArticleInterface;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    public $articleInterface;
    public function __construct(ArticleInterface $articleInterface)
    {
        $this->articleInterface = $articleInterface;
    }

    public function trash()
    {
        return $this->articleInterface->trash();
    }
    public function restoreArticle(User $user, Article $article)
    {
        return $this->articleInterface->restore($article);
    }
}
