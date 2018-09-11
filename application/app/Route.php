<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
	protected $fillable = [
		'url_id',
		'name',
		'user_id',
		'visibility',
		'active',
	];

    public function pois()
	{
		return $this->belongsToMany(Poi::class);
	}
}
