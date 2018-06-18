<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    public function poi()
	{
		$this->hasMany(Poi::class);
	}

	public function scopeActive($query)
	{
		return $query->whereActive(true);
	}
}
