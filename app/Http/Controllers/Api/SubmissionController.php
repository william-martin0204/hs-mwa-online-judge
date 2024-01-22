<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubmissionResource;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

        return SubmissionResource::collection($submissions);
    }

    public function show(Submission $submission)
    {
        if (! auth()->user()->is_admin && auth()->user()->id != $submission->user->id) {
            return response()->json([
                'message' => 'You don\'t own this submission'
            ], 403);
        }

        return new SubmissionResource($submission);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'problem_id' => 'required|exists:problems,id',
            'language' => 'required|string',
            'code' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $input_testcases = Storage::disk('cases')->get($request->problem_id.'.in');
        $output_testcases = Storage::disk('cases')->get($request->problem_id.'.out');

        // Mocking the submission result

        $statuses = ['Accepted', 'Wrong Answer', 'Time Limit Exceeded', 'Memory Limit Exceeded', 'Runtime Error', 'Compilation Error'];
        $status = $statuses[array_rand($statuses)];

        $submission = Submission::create([
            'user_id' => auth()->user()->id,
            'problem_id' => $request->problem_id,
            'language' => $request->language,
            'code' => $request->code,
            'status' => $status,
        ]);

        return response()->json($submission, 201);
    }
}
