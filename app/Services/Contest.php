<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class Contest
{
    public static function getLatestsContests(int $amount = 4) {

        $response = Http::get('https://codeforces.com/api/contest.list?gym=false');
        $lasts = collect($response->json('result'))
            ->filter(function ($contest) {
                return $contest['phase'] === 'FINISHED';
            });

        return $lasts->take($amount);
    }
}
