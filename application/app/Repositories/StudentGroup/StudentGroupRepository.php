<?php

namespace App\Repositories\StudentGroup;

use App\StudentGroup;

class StudentGroupRepository implements StudentGroupInterface
{
	public function getOne($id)
	{
		return StudentGroup::findOrFail($id);
	}

	public function getAllActive()
	{
		return StudentGroup::where('active', '=', 1)->get();
	}

	public function store($data)
	{
		return StudentGroup::create($data);
	}

	public function updateVisibility($id)
	{
		$group = $this->getOne($id);

		if ($group->visibility == 1) {
			$visibility = 0;
		} else if ($group->visibility == 0) {
			$visibility = 1;
		}

		$group->visibility = $visibility;

		$group->save();
	}

	public function update($data, $id)
	{
		return StudentGroup::findOrFail($id)->update($data);
	}

	public function softDelete($id)
	{
		$group = $this->getOne($id);

		$group->active = 0;

		$group->save();
	}

	public function forceDelete($data)
	{
		return StudentGroup::findOrFail($id)->destroy();
	}
}
