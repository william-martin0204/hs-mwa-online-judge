<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $tags = Tag::query()
            ->search($request->query('search'))
            ->with('problems')
            ->orderBy('name')
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
