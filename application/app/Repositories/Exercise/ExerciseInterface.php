<?php

namespace App\Repositories\Exercise;

interface ExerciseInterface
{
	public function store($data);
	public function update($data, $id);
	public function softDelete($data);
	public function forceDelete($data);

}