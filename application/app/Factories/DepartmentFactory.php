<?php
/**
 * Created by PhpStorm.
 * User: Danny
 * Date: 23-Jun-18
 * Time: 13:45
 */

namespace App\User\Factory;

use App\Department;

class DepartmentFactory
{
	/**
	 * @param $title
	 * @param $state
	 *
	 * @return Department
	 */
	public static function create($title, $state)
	{
		$department = new Department();

		$department->title = $title;
		$department->state = $state;

		return $department;
	}
}