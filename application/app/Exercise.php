<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    public function exercise()
    {
        $this->belongsTo(Poi::class);
    }
}
