<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function index() {

        $submissions = \App\Models\Submission::all();

        return view('submissions.index', [
            'submissions' => $submissions,
        ]);
    }
}
