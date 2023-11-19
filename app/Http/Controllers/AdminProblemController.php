<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\error;

class AdminProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $problems = Problem::query()
            ->paginate(20);

        return view('admin.problems.index', [
            'problems' => $problems,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();

        return view('admin.problems.create', [
            'tags' => $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::validate($request->all(), [
            'title' => ['required', 'string', 'unique:problems', 'min:3', 'max:100'],
            'tags' => ['array'],
            'description' => ['required', 'string'],
            'example_input' => ['required', 'string'],
            'example_output' => ['required', 'string'],
            'input_testcases' => ['required', 'file', 'mimetypes:text/plain'],
            'output_testcases' => ['required', 'file', 'mimetypes:text/plain'],
        ]);


        $problem = Problem::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'example_input' => $request->input('example_input'),
            'example_output' => $request->input('example_output'),
        ]);

        Storage::disk('cases')->put($problem->id.'.in', $request->file('input_testcases')->get());
        Storage::disk('cases')->put($problem->id.'.out', $request->file('output_testcases')->get());

        $problem->tags()->attach($request->input('tags') ?? []);

        session()->flash('success_notification', "Problem '{$problem->title}' successfully created");

        return redirect()->route('admin.problems.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Problem $problem)
    {
        return view('admin.problems.show', [
            'problem' => $problem,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Problem $problem)
    {
        $tags = Tag::all();

        return view('admin.problems.edit', [
            'problem' => $problem,
            'tags' => $tags,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Problem $problem)
    {
        $request->validate([
            'title' => ['required', 'string', 'unique:problems,title,'.$problem->id, 'min:3', 'max:100'],
            'tags' => ['array'],
            'description' => ['required', 'string'],
            'example_input' => ['required', 'string'],
            'example_output' => ['required', 'string'],
        ]);

        $problem->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'example_input' => $request->input('example_input'),
            'example_output' => $request->input('example_output'),
        ]);

        $problem->tags()->sync($request->input('tags') ?? []);

        session()->flash('success_notification', "Problem '{$problem->title}' successfully updated");

        return redirect()->route('admin.problems.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Problem $problem)
    {
        $problem->delete();

        session()->flash('success_notification', "Problem '{$problem->title}' successfully deleted");

        return redirect()->route('admin.problems.index');
    }
}
