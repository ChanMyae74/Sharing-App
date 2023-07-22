<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Reaction;
use App\Repository\CommentInterface;

class CommentController extends Controller
{
    public $commentInterface;

    public function __construct(CommentInterface $commentInterface)
    {
        $this->commentInterface = $commentInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request, Article $article)
    {
        return $this->commentInterface->store($request, $article);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return $this->commentInterface->edit($comment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        return $this->commentInterface->update($request, $comment);
    }

    public function replies(StoreCommentRequest $request, Comment $comment)
    {
        return $this->commentInterface->replies($request, $comment);
    }

    public function store_reaction(Comment $comment, Reaction $reaction)
    {
        return $this->commentInterface->store_reaction($comment, $reaction);
    }

    public function destroy_reaction(Comment $comment, Reaction $reaction)
    {
        return $this->commentInterface->destroy_reaction($comment, $reaction);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
