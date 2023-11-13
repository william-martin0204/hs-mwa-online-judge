<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function index(Request $request)
    {

        $submissions = Submission::query()
            ->when($request->query('problem_id'), function ($query, $problem_id) {
                return $query->where('problem_id', $problem_id);
            })
            ->when($request->query('status'), function ($query, $status) {
                return $query->where('status', $status);
            })
            ->orderBy('id', 'desc')
            ->get();

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

    public function store(Request $request)
    {
        $request->validate([
            'problem_id' => 'required|exists:problems,id',
            'language' => 'required|string',
            'code' => 'required|string',
        ]);

        $statuses = ['Accepted', 'Wrong Answer', 'Time Limit Exceeded', 'Memory Limit Exceeded', 'Runtime Error', 'Compilation Error'];
        $status = $statuses[array_rand($statuses)];

        Submission::create([
            'user_id' => auth()->user()->id,
            'problem_id' => $request->problem_id,
            'language' => $request->language,
            'code' => $request->code,
            'status' => $status,
        ]);

        return redirect()->route('submissions.index');
    }
}
