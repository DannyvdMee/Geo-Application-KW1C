<?php

namespace App\Repositories\Exercise;

use App\Exercise;

class ExerciseRepository implements ExerciseInterface
{
	public function store($data)
	{
		return Exercise::create($data);
	}

	public function update($data, $id)
	{
		return Exercise::findOrFail($id)->update($data);
	}

	public function softDelete($id)
	{
		return Exercise::findOrFail($id)->delete();
	}

	public function forceDelete($data)
	{
		// TODO: Implement forceDelete() method.
	}
}
