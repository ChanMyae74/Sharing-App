<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticated;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticated
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'first_name',
        'last_name',
        'nickname',
        'username',
        'last_seen_at',
        'phone',
        'bio',
        'photo',
        'profile_cover',
        'email',
        'password',
        'facebook',
        'github',
        'linkin'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];
    private mixed $last_seen_at;

    public function reactions(): HasMany
    {
        return $this->hasMany(Reaction::class);
    }

    public function getOnlineAttribute(): bool
    {
        $lastSeen = $this->last_seen_at;

        if ($lastSeen) {
            // Check if the user was active within the last 5 minutes (adjust the timeframe as needed)
            return $lastSeen->diffInMinutes(now()) <= 5;
        }

        return false;
    }
}
