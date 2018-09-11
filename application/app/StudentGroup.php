<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentGroup extends Model
{
	protected $fillable = [
		'url_id',
		'name',
		'visibility',
		'active',
	];

    public function students()
	{
		return $this->belongsToMany(Student::class);
	}
}
