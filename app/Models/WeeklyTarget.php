<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeeklyTarget extends Model
{
    protected $fillable = [
        'target_hour',
        'target_minutes',
        'started_day',
        'end_day',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
