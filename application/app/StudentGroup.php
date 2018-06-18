<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentGroup extends Model
{
    public function student()
	{
		$this->hasMany(Student::class);
	}

	public function scopeActive($query)
	{
		return $query->whereActive(true);
	}
}
