<?php

namespace App\Service;

use App\Models\Meditation;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class MeditationService
{

    public function getMeditationsById($userId)
    {
        //今日の瞑想時間だけとってくる
        $tmp = new Carbon('today');
        $today = $tmp->format('Y-m-d');
        $meditations = Meditation::where('user_id', $userId)->where('date', $today)->get();

//        $weekMeditations = Meditation::where('user_id', $userId)->whereBetween('date', [Carbon::now(), Carbon::now()->subDays(7)->toDateTimeString()] )->get();


        //今日の瞑想時間だけ取得し配列に格納する
        $meditationTime = [];
        foreach ($meditations as $meditation) {
            $meditationTime[] = $meditation->meditation_time;
        }

        //今日の瞑想時間の合計値を算出する
        $meditationSum = array_sum($meditationTime);

        return [$meditations, $meditationSum];
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

?>
