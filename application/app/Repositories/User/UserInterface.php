<?php

namespace App\Repositories\User;

interface UserInterface
{
	public function getCurrentAuthenticated();

	public function getOne($id);

	public function getAllActiveByLastnameAsc();

	public function store($data);

	public function updateVisibility($id);

	public function update($data, $id);

	public function changePassword($data);

	public function softDelete($id);

	public function forceDelete($id);

}