<?php

namespace App\Helper;

use Carbon\Carbon;

/**
 * Class ReturnLastOneMonthHelper
 * @package App\Helpers
 */
class Date
{
    const ONE_WEEK = 7;
    const TWO_WEEKS = 14;
    const THREE_WEEKS = 21;
    const FOUR_WEEKS = 28;

    /**
     * @return array
     */
    public static function fetchEveryWeekOfLastMonthFromToday()
    {
        $lastWeek = Carbon::today()->subDay(self::ONE_WEEK);
        $twoWeeksAgo = Carbon::today()->subDay(self::TWO_WEEKS);
        $threeWeeksAgo = Carbon::today()->subDay(self::THREE_WEEKS);
        $fourWeeksAgo = Carbon::today()->subDay(self::FOUR_WEEKS);
        $monthly = [
            'today'           => new Carbon(' 23:59:59'),
            'one_week_ago'    => $lastWeek,
            'two_weeks_ago'   => $twoWeeksAgo,
            'three_weeks_ago' => $threeWeeksAgo,
            'four_weeks_ago'  => $fourWeeksAgo,
        ];

        return $monthly;
    }

    /**
     * @param $instance
     * @param $monthly
     * @return array
     */
    public static function fetchMonthlyDataCount($instance, $monthly)
    {

        $oneWeekAgo = $instance->whereBetween('created_at', [$monthly['one_week_ago'], $monthly['today']]);
        $twoWeeksAgo = $instance->whereBetween('created_at', [$monthly['two_weeks_ago'], $monthly['one_week_ago']]);
        $threeWeeksAgo = $instance->whereBetween('created_at',
            [$monthly['three_weeks_ago'], $monthly['two_weeks_ago']]);
        $fourWeeksAgo = $instance->whereBetween('created_at',
            [$monthly['four_weeks_ago'], $monthly['three_weeks_ago']]);
        //今月の作成、登録されたデータの週ごとのカウント
        $dataCount = [
            count($fourWeeksAgo),
            count($threeWeeksAgo),
            count($twoWeeksAgo),
            count($oneWeekAgo),
        ];

        return $dataCount;

    }

    public static function convertToDateTimes(array $data)
    {
        $splitIntoHourAndMinutes = explode(':', $data['study_time']);

        $time = [
            'study_hour'    => $splitIntoHourAndMinutes[0],
            'study_minutes' => $splitIntoHourAndMinutes[1],
        ];
        return $time;
    }

    public static function fetchUsersWeekData($userId)
    {
        $weekDays = [];
        $day = 0;
        for ($i = 0; $i < self::ONE_WEEK; $i++) {
            $weekDays[] = Carbon::today()->subDay($day)->toDateString();
            $day++;
        }
        return $weekDays;
    }

    //各引数のそれぞれ7日前,14日前,21日前,28日前の日付が入る
    public static function compareWeekBetween($weekFirst, $weekSecond, $instance)
    {
        return $instance->whereBetween('study_dt', [$weekSecond, $weekFirst])->get();
    }

    public static function startToEndOfWeek()
    {
        $startDayOfWeek = Carbon::today()->startOfWeek()->toDateString();
        $endDayOfWeek = Carbon::today()->endOfWeek()->toDateString();
        return ['first_day_of_week' => $startDayOfWeek, 'end_day_on_week' => $endDayOfWeek];
    }

}

