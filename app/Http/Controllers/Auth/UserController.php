<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
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

}
