<?php

namespace App\Repositories\User;

use App\User;
use Illuminate\Support\Facades\Auth;

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

	public function update($data, $id)
	{
		return User::findOrFail($id)->update($data);
	}

	public function softDelete($id)
	{
		return User::findOrFail($id)->delete();
	}

	public function forceDelete($data)
	{
		// TODO: Implement forceDelete() method.
	}
}
