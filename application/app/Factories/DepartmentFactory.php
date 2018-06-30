<?php
/**
 * Created by PhpStorm.
 * User: Danny
 * Date: 23-Jun-18
 * Time: 13:45
 */

namespace App\User\Factories;

use App\Department;

class DepartmentFactory
{
	/**
	 * @param $name
	 * @param $state
	 *
	 * @return Department
	 */
	public static function create($name, $active)
	{
		$department = new Department();

		$department->name = $name;
		$department->active = $active;

		return $department;
	}
}