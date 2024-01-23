<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Problem extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::creating(function ($problem) {
            $problem->slug = Str::slug($problem->title);
        });

        static::updating(function ($problem) {
            $problem->slug = Str::slug($problem->title);
        });

        static::deleted(function ($problem) {
            Storage::disk('cases')->delete($problem->id.'.in');
            Storage::disk('cases')->delete($problem->id.'.out');
        });
    }

    protected $fillable = [
        'title',
        'description',
        'example_input',
        'example_output',
    ];

    public function scopeSearch(Builder $query, $search)
    {
        $query->when($search, function ($query, $search) {
            if (is_numeric($search)) {
                return $query->where('id', $search);
            }

            return $query->where('title', 'like', "%{$search}%");
        });
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
