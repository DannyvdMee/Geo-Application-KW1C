<?php

namespace App\Repositories\Student;

use App\Student;

class StudentRepository implements StudentInterface
{
	public function getOne($id)
	{
		return Student::findOrFail($id);
	}

	public function getAllActive()
	{
		return Student::where('active', '=', 1)->get();
	}

	public function store($data)
	{
		return Student::create($data);
	}

	public function updateVisibility($id)
	{
		$student = $this->getOne($id);

		if ($student->visibility == 1) {
			$visibility = 0;
		} else if ($student->visibility == 0) {
			$visibility = 1;
		}

		$student->visibility = $visibility;

		$student->save();
	}

	public function update($data, $id)
	{
		return Student::findOrFail($id)->update($data);
	}

	public function softDelete($id)
	{
		$student = $this->getOne($id);

		$student->active = 0;

		$student->save();
	}

	public function forceDelete($data)
	{
		return Student::findOrFail($id)->destroy();
	}
}
