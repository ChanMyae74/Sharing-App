<?php

namespace App\Service;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CommentService
{
    public function store($request, $article)
    {
        try {
            DB::beginTransaction();
            $comment_param = [
                'uuid' => Str::uuid()->toString(),
                'article_id' => $article->id,
                'user_id' => auth()->id(),
                'body' => $request->comment
            ];
            $article->comments()->create($comment_param);

            return 'success';
        } catch (QueryException $queryException) {
            return null;
        }
    }

    public function update($request, $comment)
    {
        try {
            DB::beginTransaction();
            $comment_param = [
                'body' => $request->comment
            ];
            $comment->update($comment_param);

            return "success";
        } catch (QueryException $queryException) {
            return null;
        }
    }

    public function replies($request, $comment)
    {
        try {
            DB::beginTransaction();
            $comment_param = [
                'uuid' => Str::uuid()->toString(),
                'article_id' => $comment->article_id,
                'user_id' => auth()->id(),
                'parent_id' => $comment->id,
                'body' => $request->replies
            ];
            $comment->create($comment_param);

            return 'success';
        } catch (QueryException $queryException) {
            dd($queryException);
        }
    }

    public function store_reaction($comment, $reaction)
    {
        try {
            DB::beginTransaction();
            $reaction->create([
                'uuid' => Str::uuid()->toString(),
                'comment_id' => $comment->id,
                'user_id' => auth()->id()
            ]);

            return 'success';
        } catch (QueryException $queryException) {
            return null;
        }
    }

    public function destroy_reaction($comment, $reaction)
    {
        try {
            DB::beginTransaction();
            request()->user()->reactions()->where('comment_id', $comment->id)->delete();

            return 'success';
        }
        catch (QueryException $queryException){
            return null;
        }
    }
}
