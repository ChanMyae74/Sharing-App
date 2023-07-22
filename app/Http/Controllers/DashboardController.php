<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategories;
use App\Models\Category;
use App\Models\User;
use App\Repository\DashboardInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public $dashboardInterface;

    public function __construct(DashboardInterface $dashboardInterface)
    {
        $this->dashboardInterface = $dashboardInterface;
    }

    public function index(Article $article, Category $category, User $user)
    {
       return $this->dashboardInterface->index($article, $category, $user);
    }
}
