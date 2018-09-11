<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $fillable = [
		'number',
		'name',
		'information',
		'visibility',
		'active',
	];

    public function studentGroups()
	{
		return $this->belongsToMany(StudentGroup::class);
	}
}
