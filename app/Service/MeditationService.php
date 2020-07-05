<?php

namespace App\Service;

use App\Models\Meditation;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;


class MeditationService
{

    public function getMeditationsById($userId)
    {
      return  Meditation::where('user_id', $userId)->get();
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
