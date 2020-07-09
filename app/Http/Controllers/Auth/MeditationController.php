<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\MeditationService;
use Carbon\Carbon;

class MeditationController extends Controller
{
    protected $meditationService;

    public function __construct(MeditationService $meditationService)
    {
        $this->meditationService = $meditationService;
    }

    public function saveRecord(Request $request)
    {
        $userId = auth()->guard('web')->id();
        $tmp = new Carbon('today');
        $today = $tmp->format('Y-m-d');

        $attributes = [
            'meditation_time' => $request->meditation_time,
            'user_id'         => $userId,
            'date'            => $today,
        ];

        $meditation = $this->meditationService->storeMeditationData($attributes);

        $meditation = json_encode($meditation);
        return [$meditation];
    }
}
