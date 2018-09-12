<?php

namespace App\Repositories\Exercise;

use App\Exercise;

class ExerciseRepository implements ExerciseInterface
{
	public function getOne($id)
	{
		return Exercise::findOrFail($id);
	}

	public function getAllActive()
	{
		return Exercise::where('active', '=', 1)->get();
	}

	public function store($data)
	{
		return Exercise::create($data);
	}

	public function updateVisibility($id)
	{
		$exercise = $this->getOne($id);

		if ($exercise->visibility == 1) {
			$visibility = 0;
		} else if ($exercise->visibility == 0) {
			$visibility = 1;
		}

		$exercise->visibility = $visibility;

		$exercise->save();
	}

	public function update($data, $id)
	{
		return Exercise::findOrFail($id)->update($data);
	}

	public function softDelete($id)
	{
		$exercise = $this->getOne($id);

		$exercise->active = 0;

		$exercise->save();
	}

	public function forceDelete($id)
	{
		return Exercise::findOrFail($id)->destroy();
	}
}
