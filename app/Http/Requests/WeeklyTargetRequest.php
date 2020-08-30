<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\WeeklyTargetRule;
class WeeklyTargetRequest extends FormRequest
{

    public function rules()
    {
        return [
            'study_time' => ['required', new WeeklyTargetRule(auth()->guard('user')->id())],
        ];
    }
}
