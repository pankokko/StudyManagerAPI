<?php

namespace App\Http\Controllers\Auth\WeeklyTarget;

use App\Service\WeeklyTargetService;
use App\Http\Requests\WeeklyTargetRequest;
use App\Http\Controllers\Controller;

class WeeklyTargetController extends Controller
{
    protected $weeklyTarget;

    public function __construct(WeeklyTargetService $weeklyTarget)
    {
        $this->weeklyTarget = $weeklyTarget;
    }

    public function setTargetTime(WeeklyTargetRequest $request)
    {
        $target = $this->weeklyTarget->storeTargetTime($request->input('study_time'), auth()->guard('user')->id());

        if (is_null($target)) {
            return redirect()->back()->with('failed', 'エラーが発生しました');
        }

        return redirect()->back()->with('success', '目標を設定しました、無理せずにトライしましょう')->with('target', json_encode($target));
    }
}
