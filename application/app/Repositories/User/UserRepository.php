<?php

namespace App\Repositories\User;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserInterface
{
	public function getCurrentAuthenticated()
	{
		return Auth::user();
	}

	public function getOne($id)
	{
		return User::findOrFail($id);
	}

	public function getAllActiveByLastnameAsc()
	{
		return User::where('active', '=', 1)->orderBy('lastname', 'asc')->get();
	}

	public function store($data)
	{
		return User::create($data);
	}

	public function updateVisibility($id)
	{
		$user = $this->getOne($id);

		if ($user->visibility == 1) {
			$visibility = 0;
		} else if ($user->visibility == 0) {
			$visibility = 1;
		}

		$user->visibility = $visibility;

		$user->save();
	}

	public function update($data, $id)
	{
		return User::findOrFail($id)->update($data);
	}

	public function changePassword($data)
	{
		$user = $this->getCurrentAuthenticated();

		if (Hash::check($data->oldpassword, $user->password)) {
			if ($data->password === $data->password_confirmation) {
				$user->password = Hash::make($data->password);

				$user->save();
			}
		}
	}

	public function softDelete($id)
	{
		$user = $this->getOne($id);

		$user->active = 0;

		$user->save();
	}

	public function forceDelete($id)
	{
		return User::findOrFail($id)->destroy();
	}
}
