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
	 * @param $number
	 * @param $name
	 * @param $additionalInformation
	 * @param $activeState
	 *
	 * @return Student
	 */
	public static function create($number, $name, $additionalInformation, $activeState)
	{
		$student = new Student();

		$student->number      = $number;
		$student->name        = $name;
		$student->information = $additionalInformation;
		$student->active      = $activeState;

		return $student;
	}
}