<?php

namespace App\Service;

use App\Models\Meditation;
use Carbon\Carbon;

class MeditationService
{
    public function getMeditationsById($userId)
    {
        //今日の瞑想時間だけとってくる
        $tmp = new Carbon('today');
        $today = $tmp->format('Y-m-d');
        $meditations = Meditation::where('user_id', $userId)->where('date', $today)->get();

        //一週間の瞑想時間をとってくる
        $week =  Carbon::now()->subDays(7);
        $today =  Carbon::now();
        $weekMeditations = Meditation::where('user_id', $userId)->whereBetween('date', [$week, $today])->get();

        // 今日の瞑想時間だけ取得し配列に格納する
        $meditationTime = [];
        foreach ($meditations as $meditation) {
            $meditationTime[] = $meditation->meditation_time;
        }

        $weekMeditationTime = [];
        foreach ($weekMeditations as $weekMeditation) {
            $weekMeditationTime[] = $weekMeditation->meditation_time;
        }

        //今日の瞑想時間の合計値を算出する
        $meditationSum = array_sum($meditationTime);
        $weekMeditationSum = array_sum($weekMeditationTime);

        return [$meditations, $meditationSum, $weekMeditationSum];
    }

    public function storeMeditationData(array $data)
    {
        $meditation = Meditation::create([
            'date'            => $data['date'],
            'meditation_time' => $data['meditation_time'],
            'user_id'         => $data['user_id'],
        ]);
        return $meditation;
    }

}