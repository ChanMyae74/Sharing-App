<?php

namespace App\Service;

use App\Models\Tag;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Inertia\Inertia;

class TagsService
{
    public function index()
    {
        $tags = Tag::where('user_id', auth()->id())
            ->with(['user:id,uuid,username'])
            ->filter(request(['search', 'category', 'author', 'tag']))
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('Categories/TagIndex', [
            'tags' => $tags
        ]);
    }

    public function store($request, $tag)
    {
        try {
            DB::beginTransaction();
            $tag_param =
                [
                    'uuid' => Str::uuid()->toString(),
                    'name' => $request->tag,
                    'slug' => Str::slug($request->tag),
                    'user_id' => auth()->id()
                ];
            $tag->create($tag_param);

            return "success";
        } catch (QueryException $queryException) {
            return null;
        }
    }

    public function edit($tag)
    {
        $tags = Tag::where('user_id', auth()->id())->with(['user'])
            ->with(['user:id,uuid,username'])
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('Categories/TagEdit', [
            'tags' => $tags,
            'tag' => $tag
        ]);
    }

    public function update($request, $tag)
    {
        try {
            DB::beginTransaction();
            $tag_param = [
                'name' => $request->tag,
                'slug' => Str::slug($request->tag),
            ];
            $tag->update($tag_param);

            return 'success';
        } catch (QueryException $queryException) {
            return null;
        }
    }

    public function destroy($tag)
    {
        try {
            DB::beginTransaction();
            $tag->delete();

            return 'success';
        } catch (QueryException $queryException) {
            return null;
        }
    }
}
