<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements HasMedia, MustVerifyEmail
{
    use HasApiTokens, HasFactory, InteractsWithMedia, Notifiable;

    protected static function booted()
    {
        static::deleting(function ($user)
        {
            $user->clearMediaCollection();
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getAvatar($type = '')
    {
        $avatar = Cache::remember('avatar-'.$type.'-'.$this->id, config('app.cache_ttl'), function () use ($type) {
            return $this->media->isEmpty()
                ? 'https://ui-avatars.com/api/?name='.$this->name.'&background=42A5F5&color=fff'
                : $this->media->first()->getUrl($type);
        });

        return $avatar;
    }

    public function scopeLeaderboard(Builder $query)
    {
        $query->withCount(['submissions as accepted_problems_count' => function ($query) {
            $query->select(DB::raw('COUNT(DISTINCT problem_id)'))
                ->where('status', 'Accepted');
        }])

            ->orderByDesc('accepted_problems_count')
            ->orderBy('created_at');
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 100, 100)
            ->nonQueued();
    }
}
