<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;

class AdminProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $problems = Problem::all();

        return view('admin.problems.index', [
            'problems' => $problems,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.problems.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:100',
            'description' => 'required|string',
            'example_input' => 'required|string',
            'example_output' => 'required|string',
        ]);

        $problem = Problem::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'example_input' => $request->input('example_input'),
            'example_output' => $request->input('example_output'),
        ]);

        session()->flash('success_notification', "Problem '{$problem->title}' successfully created");

        return redirect()->route('admin.problems.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $problem = Problem::query()
            ->where('id', $id)
            ->firstOrFail();

        return view('admin.problems.show', [
            'problem' => $problem,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $problem = Problem::query()
            ->where('id', $id)
            ->firstOrFail();

        return view('admin.problems.edit', [
            'problem' => $problem,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:100',
            'description' => 'required|string',
            'example_input' => 'required|string',
            'example_output' => 'required|string',
        ]);

        $problem = Problem::query()
            ->where('id', $id)
            ->firstOrFail();

        $problem->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'example_input' => $request->input('example_input'),
            'example_output' => $request->input('example_output'),
        ]);

        session()->flash('success_notification', "Problem '{$problem->title}' successfully updated");

        return redirect()->route('admin.problems.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
