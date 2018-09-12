<?php

namespace App\Repositories\User;

interface UserInterface
{
	public function getCurrentAuthenticated();

	public function getOne($id);

	public function getAllActiveByLastnameAsc();

	public function store($data);

	public function update($data, $id);

	public function softDelete($data);

	public function forceDelete($data);

}