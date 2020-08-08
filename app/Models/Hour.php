<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    public function studies()
    {
        return $this->hasMany(Study::class);
    }
}
