<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meditation extends Model
{
    protected $fillable = [
        'date',
        'meditation_time',
        'user_id',
        'music_url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
