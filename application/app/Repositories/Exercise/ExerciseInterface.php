<?php

namespace App\Repositories\Exercise;

interface ExerciseInterface
{
	public function getOne($id);

	public function getAllActive();

	public function store($data);

	public function update($data, $id);

	public function softDelete($data);

	public function forceDelete($data);

}