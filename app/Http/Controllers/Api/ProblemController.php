<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProblemResource;
use App\Models\Problem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProblemController extends Controller
{
    public function index(Request $request)
    {
        $problems = Problem::query()
            ->with('tags')
            ->paginate(10);

        return ProblemResource::collection($problems);
    }

    public function show(Problem $problem)
    {
        return new ProblemResource($problem);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'unique:problems', 'min:3', 'max:100'],
            'tags' => ['array'],
            'description' => ['required', 'string'],
            'example_input' => ['required', 'string'],
            'example_output' => ['required', 'string'],
            'input_testcases' => ['required', 'file', 'mimetypes:text/plain'],
            'output_testcases' => ['required', 'file', 'mimetypes:text/plain'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        $problem = Problem::create($request->all());

        return new ProblemResource($problem);
    }

    public function update(Request $request, Problem $problem)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'unique:problems', 'min:3', 'max:100'],
            'tags' => ['array'],
            'description' => ['required', 'string'],
            'example_input' => ['required', 'string'],
            'example_output' => ['required', 'string'],
            'input_testcases' => ['required', 'file', 'mimetypes:text/plain'],
            'output_testcases' => ['required', 'file', 'mimetypes:text/plain'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        $problem->update($request->all());

        return new ProblemResource($problem);
    }

    public function destroy(Problem $problem)
    {
        $problem->delete();

        return response()->json([
            'message' => 'Problem deleted successfully',
        ]);
    }
}
