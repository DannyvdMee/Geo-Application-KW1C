<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poi extends Model
{
	protected $fillable = [
		'url_id',
		'type',
		'name',
		'description',
		'latitude',
		'longitude',
		'hint',
		'visibility',
		'active',
	];

    public function routes()
	{
		return $this->belongsToMany(Route::class);
	}

	public function exercise()
	{
		return $this->hasOne(Exercise::class);
	}
}
