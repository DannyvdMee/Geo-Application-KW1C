<?php
/**
 * Created by PhpStorm.
 * User: Danny
 * Date: 22-Jun-18
 * Time: 20:30
 */

namespace App\User\Factories;

use App\Student;

class StudentFactory
{
	/**
	 * @param $number
	 * @param $name
	 * @param $additionalInformation
	 * @param $activeState
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