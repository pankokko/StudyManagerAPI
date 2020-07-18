<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meditation extends Model
{
    const WEEK_OF_MONTH = [
        'first_week'  => 1,
        'second_week' => 2,
        'third_week'  => 3,
        'fourth_week' => 4,
    ];

    protected $fillable = [
        'date',
        'week_meditate',
        'meditation_time',
        'user_id',
        'music_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
