<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poi extends Model
{
	//Constructor
    public function route()
	{
		$this->belongsToMany(Route::class);
	}

	public function exercise()
	{
		$this->hasOne(Exercise::class);
	}
}
