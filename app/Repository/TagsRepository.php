<?php

namespace App\Repository;

use App\Service\TagsService;
use Illuminate\Support\Facades\DB;

class TagsRepository implements TagsInterface
{
    public $tagsService;
    public function __construct(TagsService $tagsService)
    {
        $this->tagsService = $tagsService;
    }
    public function index()
    {
        return $this->tagsService->index();
    }
    public function store($request, $tag)
    {
        $result = $this->tagsService->store($request, $tag);

        if (!is_null($result)) {
            DB::commit();

            return redirect()->route('tag.index');
        } else {
            DB::rollBack();

            return redirect()->route('tag.index');
        }
    }

    public function edit($tag)
    {
        return $this->tagsService->edit($tag);
    }
    public function update($request, $tag)
    {
        $result = $this->tagsService->update($request, $tag);
        if (!is_null($result)) {
            DB::commit();

            return redirect()->route('tag.index');
        } else {
            DB::rollBack();

            return redirect()->route('tag.index');
        }
    }
    public function destroy($tag)
    {
        $result = $this->tagsService->destroy($tag);
        if (!is_null($result)) {
            DB::commit();

            return redirect()->route('tag.index');
        } else {
            DB::rollBack();

            return redirect()->route('tag.index');
        }
    }
}
