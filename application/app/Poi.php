<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poi extends Model
{
    public function route()
	{
		$this->belongsToMany(Route::class);
	}

	public function scopeActive($query)
	{
		return $query->whereActive(true);
	}
}
