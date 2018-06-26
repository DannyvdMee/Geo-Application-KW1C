<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PoiRoute extends Model
{
	public function poi()
	{
		$this->belongsToMany(Poi::class);
	}
}
