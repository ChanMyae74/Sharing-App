<?php

namespace App\Repository;

use App\Service\CommentService;
use Illuminate\Support\Facades\DB;

class CommentRepository implements CommentInterface
{
    public $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function store($request, $article)
    {
        $store = $this->commentService->store($request, $article);
        if (!is_null($store)) {
            DB::commit();

            return redirect()->back()->with('message', 'Comment success.');
        } else {
            DB::rollBack();

            return redirect()->back()->with('error', 'Something want wrong.');
        }
    }

    public function update($request, $comment)
    {
        $update = $this->commentService->update($request, $comment);
        if (!is_null($update)) {
            DB::commit();

            return redirect()->back()->with('message', 'Comment updated success.');
        } else {
            DB::rollBack();

            return redirect()->back()->with('error', 'Something want wrong.');
        }
    }

    public function replies($request, $comment)
    {
        $replies = $this->commentService->replies($request, $comment);
        if (!is_null($replies)) {
            DB::commit();

            return redirect()->back()->with('message', 'Comment reply success.');
        } else {
            DB::rollBack();

            return redirect()->back()->with('error', 'Something want wrong.');
        }
    }

    public function store_reaction($comment, $reaction)
    {
        $store_reaction = $this->commentService->store_reaction($comment, $reaction);
        if (!is_null($store_reaction)) {
            DB::commit();

            return redirect()->back()->with(array(['message' => 'Liked.']));
        } else {
            DB::rollBack();

            return redirect()->back()->with('error', 'Something want wrong.');
        }
    }

    public function destroy_reaction($comment, $reaction)
    {
        $destroy_reaction = $this->commentService->destroy_reaction($comment, $reaction);
        if (!is_null($destroy_reaction)) {
            DB::commit();
            $reacted = $comment->reactionBy(request()->user());
            return redirect()->back()->with(array(['message' => 'UnLiked.', 'reacted' => $reacted]));
        } else {
            DB::rollBack();

            return redirect()->back()->with('error', 'Something want wrong.');
        }
    }
}
