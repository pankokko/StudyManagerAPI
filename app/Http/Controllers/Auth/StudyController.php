<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Service\StudyService;
use Date;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class StudyController extends Controller
{
    private $studyService;

    public function __construct(StudyService $studyService)
    {
        $this->studyService = $studyService;
    }

    public function createRecord(Request $request)
    {
        $dateData = [
            'study_time' => $request->input('study_time'),
        ];
        $time = Date::convertToDateTimes($dateData);

        $attributes = [
            'id'      => $request->id,
            'time'    => $time,
            'study'   => [
                'study_title'   => $request->input('study_title'),
                'study_content' => $request->input('study_content'),
                'study_dt'      => Carbon::today(),
            ],
            'user_id' => auth()->guard('user')->id(),
        ];

        $study = $this->studyService->saveRecord($attributes);
        return $study;
    }

    public function showMypageStudy()
    {
        [$weeklyStudies, $monthlyStudies] = $this->studyService->fetchMonthlyRecords();

        $studiesJson = json_encode($weeklyStudies);
        return view('user.mypage_study', compact('studiesJson', 'monthlyStudies'));
    }

    public function showRegisterForm()
    {
        $today = Carbon::now();
        return view('study.register_form', compact('today'));
    }

    public function getStudyAxios()
    {
        $studies = $this->studyService->fetchStudyRecordsById();

        return $studies;

    }

}
