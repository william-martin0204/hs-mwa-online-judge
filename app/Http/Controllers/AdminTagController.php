<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class AdminTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();

        return view('admin.tags.index', [
            'tags' => $tags,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:tags', 'min:3', 'max:25'],
            'description' => ['required', 'string'],
        ]);

        $tag = Tag::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        session()->flash('success_notification', "Tag '{$tag->name}' successfully created");

        return redirect()->route('admin.tags.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tag = Tag::query()
            ->where('id', $id)
            ->firstOrFail();

        return view('admin.tags.show', [
            'tag' => $tag,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tag = Tag::query()
            ->where('id', $id)
            ->firstOrFail();

        return view('admin.tags.edit', [
            'tag' => $tag,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:tags,name,'.$id, 'min:3', 'max:25'],
            'description' => ['required', 'string'],
        ]);

        $tag = Tag::query()
            ->where('id', $id)
            ->firstOrFail();

        $tag->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        session()->flash('success_notification', "Tag '{$tag->name}' successfully updated");

        return redirect()->route('admin.tags.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Tag::query()
            ->where('id', $id)
            ->firstOrFail();

        $tag->delete();

        session()->flash('success_notification', "Tag '{$tag->name}' successfully removed");

        return redirect()->route('admin.tags.index');
    }
}
