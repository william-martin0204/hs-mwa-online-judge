<?php

namespace App\Http\Controllers;

use App\Models\Problem;
use Illuminate\Http\Request;

class ProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $problems = Problem::query()
            ->search($request->query('search'))
            ->with('tags')
            ->paginate(20);

        return view('problems.index', [
            'problems' => $problems,
        ]);
    }

    public function show(Problem $problem)
    {
        return view('problems.show', [
            'problem' => $problem,
        ]);
    }
}
