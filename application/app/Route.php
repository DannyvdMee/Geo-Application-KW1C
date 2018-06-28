<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
	//Constructor
    public function poi()
	{
		$this->hasMany(Poi::class);
	}
}
