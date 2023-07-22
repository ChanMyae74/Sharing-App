<?php

namespace App\Http\Controllers;

use App\Repository\ForumInterface;

class ForumController extends Controller
{
    public $forumInterface;

    public function __construct(ForumInterface $forumInterface)
    {
        $this->forumInterface = $forumInterface;
    }

    public function index()
    {
        return $this->forumInterface->index();
    }
}
