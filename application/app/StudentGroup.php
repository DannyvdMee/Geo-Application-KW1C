<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentGroup extends Model
{
    public function student()
	{
		$this->belongsToMany(Student::class);
	}
}