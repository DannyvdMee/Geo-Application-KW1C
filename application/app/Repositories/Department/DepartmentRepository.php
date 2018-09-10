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

	public function update($data, $id)
	{
		return Department::findOrFail($id)->update($data);
	}

	public function softDelete($id)
	{
		return Department::findOrFail($id)->delete();
	}

	public function forceDelete($id)
	{
		return Department::findOrFail($id)->destroy();
	}
}
