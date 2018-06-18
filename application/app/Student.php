<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function studentGroup()
	{
		$this->belongsTo(StudentGroup::class);
	}
}
