<?php

namespace App\User\Factory;

use App\User;
use Illuminate\Support\Facades\Hash;


class UserFactory
{

	/**
	 * @param string  $email
	 * @param string  $userName
	 * @param string  $password
	 * @param string  $firstName
	 * @param string  $lastName
	 * @param string  $department
	 * @param string  $accountType
	 * @param boolean $active
	 *
	 * @return User
	 */
	public static function create(
		$email,
		$userName,
		$password,
		$firstName,
		$lastName,
		$department,
		$accountType,
		$active
	) {
		$user = new User();

		$user->email        = $email;
		$user->username     = $userName;
		$user->password     = Hash::make($password);
		$user->firstname    = $firstName;
		$user->lastname     = $lastName;
		$user->department   = $department;
		$user->account_type = $accountType;
		$user->active       = $active;

		return $user;
	}
}
