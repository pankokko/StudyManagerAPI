<?php

namespace App\Service;

use App\Models\Study;
use Illuminate\Support\Facades\DB;

class StudyService
{
    public function saveRecord(array $data)
    {
        try {
            $savedData = Study::create([
                'started_time'  => $data['date']['started_time'],
                'end_time'      => $data['date']['end_time'],
                'study_dt'      => $data['date']['study_dt'],
                'study_title'   => $data['study']['study_title'],
                'study_content' => $data['study']['study_content'],
                'user_id'       => $data['user_id'],
            ]);
        } catch (\Exception $e) {
            logger($e->getMessage());
        }
        return $savedData;
    }

    public function convertToDateTimes(array $data)
    {
        //勉強した日の配列を１つのカラムにする
        $studyDt = implode('-', $data['date']);
        //スタート時間の配列を１つのdatetimeカラムにする
        $started = implode('-', $data['start']);
        //終了時間の配列を1つのdatetimeカラムにする
        $end = implode('-', $data['end']);
        $startedTime = $studyDt . '-' . $started;
        $endTime = $studyDt . '-' . $end;

        $studyDt = [
            'study_dt'     => $studyDt,
            'started_time' => $startedTime,
            'end_time'     => $endTime
        ];
        return $studyDt;
    }

    public function fetchStudyRecordsById()
    {
        $userId = auth()->guard('web')->id();
        return Study::where('user_id', $userId)->get();
    }
}
