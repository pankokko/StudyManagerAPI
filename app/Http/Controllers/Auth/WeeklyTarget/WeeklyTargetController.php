<?php

namespace App\Http\Controllers\Auth\WeeklyTarget;

use App\Models\WeeklyTarget;
use App\Service\WeeklyTargetService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WeeklyTargetController extends Controller
{
    protected $weeklyTarget;

    public function __construct(WeeklyTargetService $weeklyTarget)
    {
        $this->weeklyTarget = $weeklyTarget;
    }

    public function setTargetTime(Request $request)
    {
        $userId = auth()->guard('user')->id();
        if (WeeklyTarget::where(
            [
                'user_id'     => $userId,
                'started_day' => Carbon::today()->startOfWeek()->toDateString()
            ])->exists()) {
            return redirect()->back()->with('failed', '既に今週の目標が設定されています。一度設定すると再設定することはできません');
        }

        $target = $this->weeklyTarget->storeTargetTime($request->input('study_time'), $userId);
        if (is_null($target)) {
            return redirect()->back()->with('failed', 'エラーが発生しました');
        }
        $target = json_encode($target);
        return redirect()->back()->with('success', '目標を設定しました、無理せずにトライしましょう')->with('target', $target);
    }
}
