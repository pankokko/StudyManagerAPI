<?php

namespace App\Service;

use App\Models\Hour;

class HourService
{
    public function getAllHours()
    {
        return Hours::all();
    }
}
