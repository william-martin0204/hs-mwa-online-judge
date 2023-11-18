<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class LeaderboardController extends Controller
{
    public function index()
    {
        // Get a sorted list of users ordered by the amount of accepted submissions on distinct problems
        $sorted_users = User::withCount(['submissions as accepted_problems_count' => function ($query) {
            $query->select(DB::raw('COUNT(DISTINCT problem_id)'))
                ->where('status', 'Accepted');
        }])
            ->orderBy('accepted_problems_count', 'desc')
            ->paginate(20);

        foreach ($sorted_users as $key => $user) {
            $user->rank = $key + 1 + ($sorted_users->currentPage() - 1) * 20;
        }

        return view('leaderboard.index', [
            'sorted_users' => $sorted_users,
        ]);
    }
}
