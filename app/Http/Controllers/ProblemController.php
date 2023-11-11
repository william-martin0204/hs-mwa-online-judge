<?php

namespace App\Http\Controllers;

use App\Models\Problem;

class ProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $problems = Problem::all();

        return view('problems.index', [
            'problems' => $problems,
        ]);
    }

    public function show($id)
    {

        $problem = Problem::query()
            ->where('id', $id)
            ->firstorFail();

        return view('problems.show', [
            'problem' => $problem,
        ]);
    }
}
