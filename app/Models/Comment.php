<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'user_id',
        'episode_id'
    ];

    public function episode() {
        return $this->belongsTo(Episode::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function nices() {
        return $this->hasMany(Nice::class);
    }

    public function deleteComment()
    {
        $this->delete();
    }
}
