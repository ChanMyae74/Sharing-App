<?php

namespace App\Service;

use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Inertia\Inertia;

class CategoriesService
{
    public function index()
    {
        $categories = Category::where('user_id', auth()->id())
            ->with(['user:id,uuid,username'])
            ->filter(request(['search', 'category', 'author', 'tag']))
            ->paginate(10)
            ->withQueryString();
        return Inertia::render('Categories/Index', [
            'categories' => $categories,
        ]);
    }

    public function create()
    {
    }

    public function store($request, $category)
    {
        try {
            DB::beginTransaction();
            $category_param = [
                'uuid' => Str::uuid()->toString(),
                'name' => $request->category,
                'slug' => Str::slug($request->category),
                'user_id' => auth()->id()
            ];
            $category->create($category_param);

            return 'success';
        } catch (QueryException $queryException) {
           return $queryException->errorInfo[2];
        }
    }

    public function show()
    {
    }

    public function edit($category)
    {
        $categories = Category::where('user_id', auth()->id())
            ->with(['user:id,uuid,username'])
            ->paginate(10)
            ->withQueryString();
        return Inertia::render('Categories/edit', [
            'categories' => $categories,
            'category' => $category
        ]);
    }

    public function update($request, $category)
    {
        try {
            DB::beginTransaction();
            $category_param = [
                'name' => $request->category,
                'slug' => Str::slug($request->category),
            ];
            $category->update($category_param);

            return 'success';
        } catch (QueryException $queryException) {
            return null;
        }
    }

    public function destroy($category)
    {
        try {
            DB::beginTransaction();
            $category->delete();

            return 'success';
        } catch (QueryException $queryException) {
            return null;
        }
    }
}
