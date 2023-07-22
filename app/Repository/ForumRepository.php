<?php

namespace App\Repository;

use App\Service\ForumService;

class ForumRepository implements ForumInterface
{
    public $forumService;

    public function __construct(ForumService $forumService)
    {
        $this->forumService = $forumService;
    }

    public function index()
    {
        return $this->forumService->index();
    }
}
