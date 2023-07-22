<?php

namespace App\Repository;

interface CommentInterface
{
    public function store($request, $article);

    public function update($request, $comment);

    public function replies($request, $comment);

    public function store_reaction($comment, $reaction);

    public function destroy_reaction($comment, $reaction);
}
