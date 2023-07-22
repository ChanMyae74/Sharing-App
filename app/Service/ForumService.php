<?php

namespace App\Service;

use Inertia\Inertia;

class ForumService
{
    public function index()
    {

        return Inertia::render('Forum/index', [

        ]);
    }
}
