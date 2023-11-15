<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Problem extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::creating(function ($problem) {
            $problem->slug = Str::slug($problem->title);
        });
    }

    protected $fillable = [
        'title',
        'description',
        'example_input',
        'example_output',
    ];

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
