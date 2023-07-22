<?php

namespace App\Repository;

interface TagsInterface
{
    public function index();
    public function store($request, $tag);
    public function edit($tag);
    public function update($request, $tag);
    public function destroy($tg);
}
