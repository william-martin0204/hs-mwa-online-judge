<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProblemResource;
use App\Models\Problem;
use Illuminate\Http\Request;

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
}
