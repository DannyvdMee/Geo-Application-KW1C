<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
	protected $fillable = [
		'poi_id',
		'name',
		'content',
		'picture',
		'answer',
		'visibility',
		'active',
	];

    public function exercise()
    {
    	return $this->belongsTo(Poi::class);
    }
}
