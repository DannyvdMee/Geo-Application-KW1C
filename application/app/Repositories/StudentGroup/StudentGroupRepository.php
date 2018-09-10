<?php

namespace App\Repositories\StudentGroup;

use App\StudentGroup;

class StudentGroupRepository implements StudentGroupInterface
{
	public function store($data)
	{
		return StudentGroup::create($data);
	}

	public function update($data, $id)
	{
		return StudentGroup::findOrFail($id)->update($data);
	}

	public function softDelete($id)
	{
		return StudentGroup::findOrFail($id)->delete();
	}

	public function forceDelete($data)
	{
		// TODO: Implement forceDelete() method.
	}
}
