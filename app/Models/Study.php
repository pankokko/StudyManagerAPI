<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    protected $fillable = [
        'started_time',
        'study_dt',
        'end_time',
        'study_title',
        'study_content',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
