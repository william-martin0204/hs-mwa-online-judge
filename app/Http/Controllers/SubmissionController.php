<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            ->when($request->query('user_id'), function ($query, $user_id) {
                return $query->where('user_id', $user_id);
            })
            ->with(['user', 'problem'])
            ->orderBy('id', 'desc')
            ->paginate(20);

        return view('submissions.index', [
            'submissions' => $submissions,
        ]);
    }

    public function show(Submission $submission)
    {
        if (! auth()->user()->is_admin && auth()->user()->id != $submission->user->id) {
            abort(403, 'You don\'t own this submission');
        }

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

        $input_testcases = Storage::disk('cases')->get($request->problem_id.'.in');
        $output_testcases = Storage::disk('cases')->get($request->problem_id.'.out');

        // Mocking the submission result

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
