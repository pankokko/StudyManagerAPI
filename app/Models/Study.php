<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Study extends Model
{

    protected $fillable = [
        'study_dt',
        'study_hour',
        'study_minutes',
        'study_title',
        'study_content',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }



}
