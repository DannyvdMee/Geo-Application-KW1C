<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
	//Constructor
    public function pois()
	{
		return $this->belongsToMany(Poi::class);
	}
}
