<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalenderController extends Controller
{
    public function showCalender()
    {
        return view('schedule.show_calender');
    }
}
