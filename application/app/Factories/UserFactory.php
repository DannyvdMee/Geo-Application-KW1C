<?php

namespace App\User\Factory;

use App\User;
use Illuminate\Support\Facades\Hash;


class UserFactory
{

	/**
	 * @param string $email
	 * @param string $userName
	 * @param $password
	 * @param $firstName
	 * @param $lastName
	 * @param $department
	 * @param $accountType
	 * @param $activeState
	 *
	 * @return User
	 */
	public static function create($email, $userName, $password, $firstName, $lastName, $department, $accountType, $activeState)
	{
		$user = new User();

		$user->email = $email;
		$user->username = $userName;
		$user->password = Hash::make($password);
		$user->firstname = $firstName;
		$user->lastname = $lastName;
		$user->department = $department;
		$user->account_type = $accountType;
		$user->active = $activeState;

		return $user;
	}
}
