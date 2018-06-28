<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentGroup extends Model
{
	//Constructor
    public function students()
	{
		return $this->belongsToMany(Student::class);
	}
}
