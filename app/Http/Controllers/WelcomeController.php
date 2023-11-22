<?php

namespace App\Http\Controllers;

use App\Models\Problem;

class WelcomeController extends Controller
{
    public function welcome()
    {
        // Get the 4 most solved problems
        $problems = Problem::withCount(['submissions as accepted_submissions_count' => function ($query) {
            $query->where('status', 'Accepted');
            if (auth()->check()) $query->whereNot('user_id', auth()->user()->id);
        }])
            ->orderBy('accepted_submissions_count', 'desc')
            ->take(4)
            ->get();

        return view('welcome', compact('problems'));
    }
}
