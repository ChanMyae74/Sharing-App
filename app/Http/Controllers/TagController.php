<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use App\Repository\TagsInterface;

class TagController extends Controller
{
    public $tagInterface;
    public function __construct(TagsInterface $tagInterface)
    {
        return  $this->tagInterface = $tagInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->tagInterface->index();
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
    public function store(StoreTagRequest $request, Tag $tag)
    {
        return $this->tagInterface->store($request, $tag);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return $this->tagInterface->edit($tag);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        return $this->tagInterface->update($request, $tag);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        return $this->tagInterface->destroy($tag);
    }
}
