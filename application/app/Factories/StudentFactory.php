<?php
/**
 * Created by PhpStorm.
 * User: Danny
 * Date: 22-Jun-18
 * Time: 20:30
 */

namespace App\User\Factory;

use App\Student;

class StudentFactory
{
	/**
	 * @param string $name
	 * @param string $additionalInformation
	 * @param boolean $activeState
	 *
	 * @return Student
	 */
	public static function create($name, $number, $additionalInformation, $activeState)
	{
		$student = new Student();

		$student->name                  = $name;
		$student->number				= $number;
		$student->information			= $additionalInformation;
		$student->active                = $activeState;

		return $student;
	}
}