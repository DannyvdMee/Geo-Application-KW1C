<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
	//Constructor
    public function poi()
	{
		return $this->hasMany(Poi::class);
	}
}
