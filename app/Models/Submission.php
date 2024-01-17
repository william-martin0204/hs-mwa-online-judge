<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Submission extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::creating(function ($submission) {

            if ($submission->status == 'Accepted') {
                Cache::delete('welcome.recommended_problems');
            }
        });
    }

    protected $fillable = [
        'user_id',
        'problem_id',
        'language',
        'code',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function problem()
    {
        return $this->belongsTo(Problem::class);
    }
}
