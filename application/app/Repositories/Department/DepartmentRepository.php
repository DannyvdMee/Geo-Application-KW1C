<?php

namespace App\Repositories\Department;

use App\Department;

class DepartmentRepository implements DepartmentInterface
{
	public function getOne($id)
	{
		return Department::findOrFail($id);
	}

	public function getAllActive()
	{
		return Department::where('active', '=', 1)->get();
	}

	public function store($data)
	{
		return Department::create($data);
	}

	public function updateVisibility($id)
	{
		$department = $this->getOne($id);

		if ($department->visibility == 1) {
			$visibility = 0;
		} else if ($department->visibility == 0) {
			$visibility = 1;
		}

		$department->visibility = $visibility;

		$department->save();
	}

	public function update($data, $id)
	{
		return Department::findOrFail($id)->update($data);
	}

	public function softDelete($id)
	{
		$department = $this->getOne($id);

		$department->active = 0;

		$department->save();
	}

	public function forceDelete($id)
	{
		return Department::findOrFail($id)->destroy();
	}
}
