<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	//Constructor
    public function studentGroup()
	{
		$this->belongsToMany(StudentGroup::class);
	}
}
