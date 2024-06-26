<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\NewVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'avatar',
        'password',
        'bio',
        'level',
        'xp',
        'google_id',
        'line_id',
        'twitter_id',
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

    public function episodes() {
        return $this->hasMany(Episode::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function sendEmailVerificationNotification() {
        $this->notify(new NewVerifyEmail());
    }

    public function nices() {
        return $this->hasMany(Nice::class);
    }

    public function isGoogleUser()
    {
        return $this->google_id !== null;
    }

    public function hasVerifiedEmail()
    {
        if ($this->isGoogleUser() || $this->isLineUser() || $this->isTwitterUser()) {
            return true;
        }
        return $this->getAttribute('email_verified_at') !== null;
    }

    public function isLineUser()
    {
        return $this->line_id !== null;
    }
    
    public function isTwitterUser()
    {
        return $this->twitter_id !== null;
    }

    public function calculateLevel()
    {
        $xp = $this->xp;
        $level = 1;
        $threshold = 100;

        while ($xp >= $threshold) {
            $level++;
            $xp -= $threshold;
            $threshold = intval($threshold * 1.5);
        }

        return $level;
    }

    public function getCurrentAndNextLevelXp()
    {
        $xp = $this->xp;
        $level = 1;
        $threshold = 100;

        while ($xp >= $threshold) {
            $level++;
            $xp -= $threshold;
            $threshold = intval($threshold * 1.03);
        }

        $currentXp = $xp;
        $nextLevelXp = $threshold;

        return [$currentXp, $nextLevelXp];
    }

    public function calculateLevelProgress()
    {
        [$currentXp, $nextLevelXp] = $this->getCurrentAndNextLevelXp();
        return ($currentXp / $nextLevelXp) * 100;
    }

    public function updateXp()
    {
        $this->xp = $this->episodes->sum(function($episode) {
            return strlen($episode->episode);
        });
        $this->level = $this->calculateLevel();
        $this->save();
    }

    public function getBadgeUrlAttribute()
    {
        $level = $this->level;
        $badgeLevel = min(intval($level / 10), 50);
        return asset('img/badges/badge_' . $badgeLevel . '.png');
    }
}