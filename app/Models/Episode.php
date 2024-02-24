<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Flag;

class Episode extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function nices() {
        return $this->hasMany(Nice::class);
    }

    public function flag() {
        return $this->hasOne(Flag::class, 'episode_id');
    }
}
