<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::query()
            ->with('problems')
            ->paginate(8);

        return view('tags.index', [
            'tags' => $tags,
        ]);
    }

    public function show(Tag $tag)
    {
        return view('tags.show', [
            'tag' => $tag,
        ]);
    }
}
