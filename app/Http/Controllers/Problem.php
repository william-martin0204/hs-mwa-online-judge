<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Problem extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $problems = \App\Models\Problem::all();

        return view('problems.index', [
            'problems' => $problems,
        ]);
    }
}
