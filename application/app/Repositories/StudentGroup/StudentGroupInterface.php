<?php

namespace App\Repositories\StudentGroup;

interface StudentGroupInterface
{
	public function getOne($id);

	public function getAllActive();

	public function store($data);

	public function updateVisibility($id);

	public function update($data, $id);

	public function softDelete($id);

	public function forceDelete($id);

}