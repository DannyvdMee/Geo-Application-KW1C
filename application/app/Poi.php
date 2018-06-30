<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poi extends Model
{
	//Constructor
    public function route()
	{
		return $this->belongsToMany(Route::class);
	}

	public function exercise()
	{
		return $this->hasOne(Exercise::class);
	}
}
