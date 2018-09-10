<?php

namespace App\Repositories\Student;

use App\Student;

class StudentRepository implements StudentInterface
{
	public function store($data)
	{
		return Student::create($data);
	}

	public function update($data, $id)
	{
		return Student::findOrFail($id)->update($data);
	}

	public function softDelete($id)
	{
		return Student::findOrFail($id)->delete();
	}

	public function forceDelete($data)
	{
		// TODO: Implement forceDelete() method.
	}
}
