<?php

namespace App\Repositories\Route;

interface RouteInterface
{
	public function getOne($id);

	public function getLatest();

	public function getAllActive();

	public function store($data);

	public function update($data, $id);

	public function softDelete($id);

	public function forceDelete($id);

}