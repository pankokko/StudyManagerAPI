<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Service\StudyService;
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
            'date'  => [
                'year'  => $request->year,
                'month' => $request->month,
                'day'   => $request->day,
            ],
            'start' => [
                'startedHour' => $request->startedHour,
                'startedMin'  => $request->startedMin,
            ],
            'end'   => [
                'endHour' => $request->endHour,
                'endMin'  => $request->endMin,
            ],
        ];

        $studyDt = $this->studyService->convertToDateTimes($dateData);

        $attributes = [
            'study'   => [
                'study_title'   => $request->studyTitle,
                'study_content' => $request->studyContent,
            ],
            'user_id' => auth()->guard('web')->id(),
            'date'    => $studyDt,
        ];

        $study = $this->studyService->saveRecord($attributes);
        return $study;
    }

    public function showMypageStudy(Request $request)
    {
        $studies = $this->studyService->fetchStudyRecordsById();

        return view('user.mypage_study', compact('studies'));
    }

    public function getStudyAxios()
    {
        $studies = $this->studyService->fetchStudyRecordsById();

        return $studies;

    }

}
