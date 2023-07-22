<?php

namespace App\Repository;

interface DashboardInterface
{
    public function index($article, $category, $user);
}
