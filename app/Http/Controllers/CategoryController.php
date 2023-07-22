<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Repository\CategoriesInterface;

class CategoryController extends Controller
{
    public $categoriesInterface;

    public function __construct(CategoriesInterface $categoriesInterface)
    {
        $this->categoriesInterface = $categoriesInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->categoriesInterface->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->categoriesInterface->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request, Category $category)
    {
        return $this->categoriesInterface->store($request, $category);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return $this->categoriesInterface->show($category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return $this->categoriesInterface->edit($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        return $this->categoriesInterface->update($request, $category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        return $this->categoriesInterface->destroy($category);
    }
}
