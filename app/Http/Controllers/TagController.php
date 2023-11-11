<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return view('tags.index', [
            'tags' => $tags,
        ]);
    }

    public function show($id)
    {

        $tag = Tag::query()
            ->where('id', $id)
            ->firstorFail();

        return view('tags.show', [
            'tag' => $tag,
        ]);
    }
}
