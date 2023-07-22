<?php

namespace App\Repository;

interface CategoriesInterface
{
    public function index();
    public function create();
    public function store($request, $category);
    public function show();
    public function edit($category);
    public function update($request, $category);
    public function destroy($category);
}
