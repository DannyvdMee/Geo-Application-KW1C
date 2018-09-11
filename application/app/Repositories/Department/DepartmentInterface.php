<?php

namespace App\Repositories\Department;

interface DepartmentInterface
{
	public function getOne($id);
	public function getAllActive();
	public function store($data);
	public function update($data, $id);
	public function softDelete($id);
	public function forceDelete($id);

}