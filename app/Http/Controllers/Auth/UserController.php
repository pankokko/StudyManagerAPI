<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\UserService;
use App\Service\MeditationService;
use App\Models\User;

class UserController extends Controller
{
    protected $userService;
    protected $meditationService;
    protected $userId;

    public function __construct(UserService $userService, MeditationService $meditationService)
    {
        $this->userId = auth()->guard('web')->id();
        $this->userService = $userService;
        $this->meditationService = $meditationService;
    }

    public function showRegisterForm()
    {
        return view('user.register_form');
    }

    public function registerData(Request $request)
    {
        $attributes = [
            'weight' => $request->weight,
            'height' => $request->height,
        ];

        $this->userService->storePersonalData($attributes);
    }

    public function showMyPage()
    {
        $userId = auth()->guard('web')->id();
        $user = $this->userService->getUserinfo($userId);
        return view('user.show_mypage', compact('user'));
    }

    public function showMeditationDetail()
    {
        $userId = Auth()->guard('web')->id();
        $user = $this->userService->getUserinfo($userId);

        $meditations =  $this->meditationService->getMeditationsById($userId);
        $meditations = json_encode($meditations);
        return view('user.mypage_meditation', compact('user','meditations'));

    }

}
