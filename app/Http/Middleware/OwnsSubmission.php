<?php

namespace App\Http\Middleware;

use App\Models\Submission;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OwnsSubmission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user_id = Auth::user()->id;

        if (User::where('id', $user_id)->where('is_admin', true)->exists()) {
            return $next($request);
        }

        $submission_id = $request->route('id');

        // Check if the user owns the submission
        if (!Submission::where('id', $submission_id)->where('user_id', $user_id)->exists()) {
            abort(403, 'You do not own this submission.');
        }

        return $next($request);
    }
}
