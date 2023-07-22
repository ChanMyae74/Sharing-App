<?php

namespace App\Repository;

use App\Service\DashboardService;

class DashboardRepository implements DashboardInterface
{
    public $dashboardService;
    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index($article, $category, $user)
    {
       return $this->dashboardService->index($article, $category, $user);
    }
}
