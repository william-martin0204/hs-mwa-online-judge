<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TagResource;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::query()
            ->with('problems')
            ->paginate(10);

        return TagResource::collection($tags);
    }

    public function show(Tag $tag)
    {
        return new TagResource($tag);
    }
}
