<?php

namespace App\Http\Controllers\Auth;

use App\Models\Study;
use Illuminate\Http\Request;
use App\Service\StudyService;
use App\Service\WeeklyTargetService;
use Date;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class StudyController extends Controller
{
    private $studyService;
    private $weeklyTargetService;

    public function __construct(StudyService $studyService, WeeklyTargetService $weeklyTargetService)
    {
        $this->weeklyTargetService = $weeklyTargetService;
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

        if ($study) {
            return redirect()->route('user.study.mypage_study');
        } else {
            redirect()->back()->with('failed', 'データの保存に失敗しました');
        }
    }

    public function showMypageStudy()
    {
        [$weeklyStudies, $studyData] = $this->studyService->fetchMonthlyRecords();
        $studyToday = $this->studyService->fetchTodaysRecord();
        $weeklyTargetJson = json_encode($this->weeklyTargetService->fetchWeeklyTarget());

        $studiesJson = json_encode($weeklyStudies);
        $weekTotalTimeJson = json_encode($studyData['weekStudies']);
        return view('user.mypage_study', compact('studiesJson', 'studyData', 'studyToday', 'weeklyTargetJson', 'weekTotalTimeJson'));
    }

    public function showRegisterForm()
    {
        $today = Carbon::now()->toDateString();
        return view('study.register_form', compact('today'));
    }

    public function showAllRecords()
    {
        $userId = auth()->guard()->id();
        $userRecords = $this->studyService->fetchUsersAllStudyRecords($userId);
        return view('study.index_study_records', compact('userRecords'));
    }

    public function showRecord($id)
    {
        $record = $this->studyService->fetchRecordById($id);
        return view('study.show', compact('record'));
    }

    public function editRecord(Request $request, $id)
    {
        return view('study.edit', compact('record', 'today'));
    }

    public function getStudyAxios()
    {
        $studies = $this->studyService->fetchStudyRecordsById();
        return $studies;
    }

    public function deleteRecord($id)
    {
        $study = $this->studyService->deleteRecord($id);
        if (is_null($study)) {
            return redirect()->back()->with('failed', 'データの削除に失敗しました');
        }
        return redirect()->route('user.study.all_records')->with('success', '削除しました');
    }
}
