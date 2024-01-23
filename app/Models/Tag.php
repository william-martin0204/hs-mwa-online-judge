<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::creating(function ($tag) {
            $tag->slug = Str::slug($tag->name);
        });

        static::updating(function ($tag) {
            $tag->slug = Str::slug($tag->name);
        });
    }

    protected $fillable = [
        'name',
        'description',
    ];

    public function scopeSearch($query, $search)
    {
        $query->when($search, function ($query, $search) {
            if (is_numeric($search)) {
                return $query->where('id', $search);
            }

            return $query->where('name', 'like', "%{$search}%");
        });
    }

    public function problems()
    {
        return $this->belongsToMany(Problem::class);
    }
}
