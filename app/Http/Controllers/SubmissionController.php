<?php

namespace App\Http\Controllers;

use App\Models\Submission;

class SubmissionController extends Controller
{
    public function index()
    {

        $submissions = Submission::all();

        return view('submissions.index', [
            'submissions' => $submissions,
        ]);
    }

    public function show($id)
    {

        $submission = Submission::query()
            ->where('id', $id)
            ->firstorFail();

        return view('submissions.show', [
            'submission' => $submission,
        ]);
    }
}
