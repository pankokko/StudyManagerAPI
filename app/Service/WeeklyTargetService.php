<?php

namespace App\Service;

use App\Models\User;
use App\Models\WeeklyTarget;
use Carbon\Carbon;
use App\Helper\Date;

class WeeklyTargetService
{
    public function fetchWeeklyTarget()
    {
        $user = User::find(auth()->guard('user')->id());
        $query = $user->weeklyTargets()->where([
            'started_day' => Date::startToEndOfWeek()['first_day_of_week'],
            'end_day'     => Date::startToEndOfWeek()['end_day_on_week']
        ])->get();

        return $query;
    }

    public function storeTargetTime($dataTime, $userId)
    {
        $key = ['target_hour', 'target_minutes'];
        $time = array_combine($key, explode(':', $dataTime));
        $week = Date::startToEndOfWeek();
        try {
            $query = WeeklyTarget::create([
                'target_hour'    => intval($time['target_hour']),
                'target_minutes' => intval($time['target_minutes']),
                'started_day'    => $week['first_day_of_week'],
                'end_day'        => $week['end_day_on_week'],
                'user_id'        => $userId,
            ]);
        } catch (\Exception $e) {
            logger()->error($e->getMessage());
            return null;
        }
        return $query;
    }
}
