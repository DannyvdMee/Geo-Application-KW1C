<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function studentGroup()
	{
		$this->belongsToMany(StudentGroup::class);
	}

	public function scopeActive($query)
	{
		return $query->whereActive(true);
	}
}
