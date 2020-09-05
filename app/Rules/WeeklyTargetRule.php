<?php

namespace App\Rules;

use App\Models\WeeklyTarget;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class WeeklyTargetRule implements Rule
{
    protected $userId;

    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    public function passes($attribute, $value)
    {
            return WeeklyTarget::where(
            [
                'user_id'     => $this->userId,
                'started_day' => Carbon::today()->startOfWeek()->toDateString()
            ])->count() === 0;
    }

    public function message()
    {
        return '既に今週の目標を設定されているようです。一度決めた目標は再登録することはできません';
    }
}
