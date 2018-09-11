<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
	protected $fillable = [
		'name',
		'url_prefix',
		'visibility',
		'active',
	];
}