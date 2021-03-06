<?php

namespace App\Service;

use App\Models\Study;
use Illuminate\Support\Facades\DB;
use Date;
use App\Models\User;
use Carbon\Carbon;

class StudyService
{
    public function fetchTodaysRecord()
    {
        $today = new Carbon('today');
        $userId = auth()->guard('user')->id();
        return Study::where('user_id', $userId)->where('study_dt', '=', $today)->first();
    }

    public function fetchRecordById($id)
    {
        return Study::find($id);
    }

    public function fetchUsersAllStudyRecords($userId)
    {
        $user = User::find($userId);
        return $user->studies;

    }

    public function saveRecord(array $data)
    {
        try {
            $query = Study::updateOrCreate(
                ['id' => $data['id']],
                [
                    'study_hour'    => $data['time']['study_hour'],
                    'study_minutes' => $data['time']['study_minutes'],
                    'study_title'   => $data['study']['study_title'],
                    'study_content' => $data['study']['study_content'],
                    'study_dt'      => $data['study']['study_dt'],
                    'user_id'       => $data['user_id']
                ]
            );

        } catch (\Exception $e) {
            DB::rollBack();
            logger($e->getMessage());
        }
        DB::commit();
        return true;
    }

    public function fetchMonthlyRecords()
    {
        $userStudies = User::find(auth()->guard('user')->id())->studies;
        $monthly = Date::fetchEveryWeekOfLastMonthFromToday();

        $studyData = $this->calculateStudyHours($userStudies, $monthly);
        $data = [];
        $data = $this->fetchEachDayStudyHours($data,
            $userStudies->whereBetween('study_dt', [$monthly['one_week_ago'], $monthly['today']]));
        ksort($data['weekData']);
        return [$data, $studyData];
    }

    public function calculateStudyHours($studies, $monthly)
    {
        $weekStudies = $studies->whereBetween('study_dt', [$monthly['one_week_ago'], $monthly['today']]);
        $monthlyStudies = $studies->whereBetween('study_dt', [$monthly['four_weeks_ago'], $monthly['today']]);

        $monthTotalHours = $monthlyStudies->sum(function ($study) {
            return ($study->study_hour);
        });

        $totalStudyTime = $studies->sum(function ($study) {
            return ($total = $study->study_hour);
        });

        $weeklyStudyHour = $weekStudies->sum(function ($study) {
            return $study->study_hour;
        });

        $weeklyStudyMinutes = $weekStudies->sum(function ($study) {
            return $study->study_minutes;
        });

        $studyData = [
            'weekStudies'    => [
                'study_hour'    => $weeklyStudyHour,
                'study_minutes' => $weeklyStudyMinutes,
            ],
            'monthlyStudies' => $monthTotalHours,
            'recordCount'    => count($studies),
            'totalStudyTime' => $totalStudyTime,
        ];

        return $studyData;
    }

    public function deleteRecord(int $id = null)
    {
        $study = Study::find($id);

        if (!($study->delete())) {
            return false;
        }
        return true;
    }

    /**
     * @param $weekDays
     * @param array $data
     * @param $weekStudies
     * @return array
     */
    public function fetchEachDayStudyHours(array $data, $weekStudies): array
    {
        $weekDays = Date::fetchDaysOfThisWeek();

        //一週間分の勉強時間を取得し配列に結合している Chart用のデータ
        foreach ($weekDays as $weekDay) {
            $data['weekData'][$weekDay] = 0;
            foreach ($weekStudies as $weekStudy) {
                if ($weekDay === $weekStudy->study_dt) {
                    $data['weekData'][$weekDay] = $weekStudy['study_hour'];
                }
            }
        }
        return $data;
    }
}
