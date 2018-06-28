<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	//Constructor
    public function studentGroups()
	{
		return $this->belongsToMany(StudentGroup::class);
	}
}
