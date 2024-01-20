<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;

class ContestService
{
    public static function getLatestsContests(int $amount = 4) {

        $response = Http::acceptJson()->get(config('services.codeforces.endpoint') . 'contest.list', [
            'gym' => false,
        ]);

        if ($response->failed()) {
            throw new Exception('Codeforces API is not available');
        }

        $lasts = collect($response->json('result'))
            ->filter(function ($contest) {
                return $contest['phase'] === 'FINISHED';
            });

        return $lasts->take($amount);
    }
}
